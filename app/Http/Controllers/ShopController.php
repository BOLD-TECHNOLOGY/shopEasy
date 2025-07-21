<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Str;

class ShopController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $user = auth()->user();

        $shops = $user->shops()->latest()->get();

        $sortField = request('sort', 'created_at');
        $validSorts = ['name', 'created_at', 'category'];

        if (!in_array($sortField, $validSorts)) {
            $sortField = 'created_at';
        }

        $products = \App\Models\Product::whereIn('shop_id', $shops->pluck('id'))
            ->with('shop')
            ->orderBy($sortField, 'desc')
            ->paginate(10);

        return view('shop-easy.shops.index', compact('shops', 'products'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

        $validated['slug'] = Str::slug($validated['name']);

        auth()->user()->shops()->create($validated);

        return redirect()->back()->with('success', 'Shop created!');
    }

    public function update(Request $request, Shop $shop)
    {
        $this->authorize('update', $shop);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

        if ($shop->name !== $validated['name']) {
            $validated['slug'] = Str::slug($validated['name']);
        }

        $shop->update($validated);

        return redirect()->back()->with('success', 'Shop updated!');
    }

    public function show(Shop $shop)
    {
        if ($shop->user_id !== auth()->id()) {
            abort(403, 'Unauthorized access to this shop.');
        }

        $products = $shop->products()->latest()->get();

        return view('shop-easy.shops.show', compact('shop', 'products'));
    }

    public function destroy(Shop $shop)
    {
        $this->authorize('delete', $shop);

        $shop->delete();

        return redirect()->back()->with('success', 'Shop deleted!');
    }
}
