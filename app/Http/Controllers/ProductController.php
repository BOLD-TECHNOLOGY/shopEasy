<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Shop;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


use Illuminate\Http\Request;

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
        ]);

        $shop = Shop::findOrFail($validated['shop_id']);

        if ($shop->user_id !== auth()->id()) {
            abort(403);
        }

        $shop->products()->create($validated);

        return back()->with('success', 'Product added.');
    }

    public function update(Request $request, Product $product)
    {
        $this->authorize('update', $product);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
        ]);

        if ($product->shop->user_id !== auth()->id()) {
            abort(403);
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