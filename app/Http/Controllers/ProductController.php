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

    /**
     * Display a listing of the products for the authenticated user's shops.
     */
    public function index()
    {
        $userShopIds = auth()->user()->shops()->pluck('id');

        $products = Product::with('shop')
            ->whereIn('shop_id', $userShopIds)
            ->latest()
            ->paginate(10);

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
            'on_sale' => 'nullable|boolean',
            'stock' => 'nullable|integer|min:0',
            'in_stock' => 'nullable|boolean',
            'sku' => 'nullable|string|max:255|unique:products,sku',
            'thumbnail' => 'nullable|string|max:255',
            'images' => 'nullable|json',
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
        ]);

        $shop = Shop::findOrFail($validated['shop_id']);

        if ($shop->user_id !== auth()->id()) {
            abort(403);
        }

        // Generate slug from name
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
            'on_sale' => 'nullable|boolean',
            'stock' => 'nullable|integer|min:0',
            'in_stock' => 'nullable|boolean',
            'sku' => 'nullable|string|max:255|unique:products,sku,' . $product->id,
            'thumbnail' => 'nullable|string|max:255',
            'images' => 'nullable|json',
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
        ]);

        // Update slug if name changed
        if ($product->name !== $validated['name']) {
            $validated['slug'] = Str::slug($validated['name']);
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
