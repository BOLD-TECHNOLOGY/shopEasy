<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Shop;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $products = Product::whereHas('shop', function ($query) {
            $query->where('user_id', auth()->id());
        })->paginate(10);

        return view('shop-easy.products.index', compact('products'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'shop_id' => 'required|exists:shops,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'sale_price' => 'nullable|numeric|min:0',
            'on_sale' => 'nullable|boolean', // Changed from 'required' to 'nullable'

            'stock' => 'nullable|integer|min:0',
            'in_stock' => 'nullable|boolean',
            'sku' => 'nullable|string|max:255|unique:products,sku',

            'thumbnail' => 'nullable|file|mimes:jpeg,jpg,png,webp|max:1024', // Increased to 1MB

            'images' => 'nullable|array',
            'images.*' => 'nullable|file|mimes:jpeg,jpg,png,webp|max:3072', // Changed from images.0 to images.* and increased to 3MB

            'category' => 'nullable|string|max:255',
            'brand_id' => 'nullable|exists:brands,id',
            'tags' => 'nullable|string',
            'color' => 'nullable|string|max:100',
            'size' => 'nullable|string|max:100',
            'specifications' => 'nullable|json',
            'is_active' => 'nullable|boolean',
            'is_featured' => 'nullable|boolean',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
        ]);

        // Handle boolean fields that might be null
        $validated['on_sale'] = $request->boolean('on_sale');
        $validated['in_stock'] = $request->boolean('in_stock');
        $validated['is_active'] = $request->boolean('is_active', true); // Default to true
        $validated['is_featured'] = $request->boolean('is_featured');

        if ($request->hasFile('thumbnail')) {
            $path = $request->file('thumbnail')->store('thumbnails', 'public');
            $validated['thumbnail'] = $path;
        }

        if ($request->hasFile('images')) {
            $imagePaths = [];
            foreach ($request->file('images') as $image) {
                $imagePaths[] = $image->store('product-images', 'public');
            }
            $validated['images'] = json_encode($imagePaths);
        }

        $shop = Shop::findOrFail($validated['shop_id']);

        if ($shop->user_id !== auth()->id()) {
            abort(403);
        }

        $validated['slug'] = Str::slug($validated['name']);

        $shop->products()->create($validated);

        return back()->with('success', 'Product added.');
    }

    public function update(Request $request, Product $product)
    {
        $this->authorize('update', $product);

        if ($product->shop->user_id !== auth()->id()) {
            abort(403);
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'sale_price' => 'nullable|numeric|min:0',
            'stock' => 'nullable|integer|min:0',
            'in_stock' => 'nullable|boolean',
            'sku' => 'nullable|string|max:255|unique:products,sku,' . $product->id,
            'category_id' => 'nullable|exists:categories,id',
            'brand_id' => 'nullable|exists:brands,id',
            'tags' => 'nullable|string',
            'color' => 'nullable|string|max:100',
            'size' => 'nullable|string|max:100',
            'specifications' => 'nullable|json',
            'is_active' => 'nullable|boolean',
            'is_featured' => 'nullable|boolean',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'images.*' => 'nullable|file|mimes:jpeg,jpg,png,webp|max:3072', // Fixed validation rule
            'thumbnail' => 'nullable|file|mimes:jpeg,jpg,png,webp|max:1024',
            'on_sale' => 'nullable|boolean', // Changed from 'required' to 'nullable'
        ]);

        // Handle boolean fields
        $validated['on_sale'] = $request->boolean('on_sale');
        $validated['in_stock'] = $request->boolean('in_stock');
        $validated['is_active'] = $request->boolean('is_active');
        $validated['is_featured'] = $request->boolean('is_featured');

        if ($product->name !== $validated['name']) {
            $validated['slug'] = Str::slug($validated['name']);
        }

        // Handle file uploads for update
        if ($request->hasFile('thumbnail')) {
            $path = $request->file('thumbnail')->store('thumbnails', 'public');
            $validated['thumbnail'] = $path;
        }

        if ($request->hasFile('images')) {
            $imagePaths = [];
            foreach ($request->file('images') as $image) {
                $imagePaths[] = $image->store('product-images', 'public');
            }
            $validated['images'] = json_encode($imagePaths);
        }

        $product->update($validated);

        return back()->with('success', 'Product updated.');
    }

    public function destroy(Product $product)
    {
        $this->authorize('delete', $product);

        if ($product->shop->user_id !== auth()->id()) {
            abort(403);
        }

        $product->delete();

        return back()->with('success', 'Product deleted.');
    }
}