<?php

namespace App\Http\Controllers;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


class ShopController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $user = auth()->user();

        // Get all shops belonging to the user
        $shops = $user->shops()->latest()->get();

        // Define sortable fields
        $sortField = request('sort', 'created_at');
        $validSorts = ['name', 'created_at', 'category'];

        // Sanitize sort field
        if (!in_array($sortField, $validSorts)) {
            $sortField = 'created_at';
        }

        // Fetch paginated products from all user's shops, with shop relation
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

        auth()->user()->shops()->create($validated);

        return redirect()->back()->with('success', 'Shop created!');
    }

    public function update(Request $request, Shop $shop)
    {
        $this->authorize('update', $shop); // optional

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

        $shop->update($validated);

        return redirect()->back()->with('success', 'Shop updated!');
    }

    public function show(Shop $shop)
    {
        // Make sure the shop belongs to the authenticated user
        if ($shop->user_id !== auth()->id()) {
            abort(403, 'Unauthorized access to this shop.');
        }

        $products = $shop->products()->latest()->get();

        return view('shop-easy.shops.show', compact('shop', 'products'));
    }


    public function destroy(Shop $shop)
    {
        $this->authorize('delete', $shop); // optional

        $shop->delete();

        return redirect()->back()->with('success', 'Shop deleted!');
    }
}
