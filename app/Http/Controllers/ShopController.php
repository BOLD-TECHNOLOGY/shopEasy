<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ShopController extends Controller
{
    public function index()
    {
        $shops = Shop::where('user_id', auth()->id())
            ->orderBy('created_at', 'desc')
            ->paginate(12); 
        
        return view('admin.dashboard', compact('shops'));
    }

    /**
     * Show the form for creating a new shop.
     */
    public function create()
    {
        return view('shops.create');
    }

    /**
     * Store a newly created shop in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'shop_name' => 'required|string|max:255',
            'category' => 'required|string|in:electronics,clothing,food,books,home,beauty,sports,automotive',
            'description' => 'nullable|string|max:1000',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:500',
        ]);

        $validatedData['user_id'] = auth()->id();

        $shop = Shop::create($validatedData);

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Shop created successfully!',
                'shop' => $shop
            ]);
        }

        return redirect()->route('shops.index')->with('success', 'Shop created successfully!');
    }

    /**
     * Display the specified shop.
     */
    public function show(Shop $shop)
    {
        // Make sure the user owns this shop
        if ($shop->user_id !== auth()->id()) {
            abort(403);
        }

        return view('shops.show', compact('shop'));
    }

    /**
     * Show the form for editing the specified shop.
     */
    public function edit(Shop $shop)
    {
        // Make sure the user owns this shop
        if ($shop->user_id !== auth()->id()) {
            abort(403);
        }

        return view('shops.edit', compact('shop'));
    }

    /**
     * Update the specified shop in storage.
     */
    public function update(Request $request, Shop $shop)
    {
        // Make sure the user owns this shop
        if ($shop->user_id !== auth()->id()) {
            abort(403);
        }

        $validatedData = $request->validate([
            'shop_name' => 'required|string|max:255',
            'category' => 'required|string|in:electronics,clothing,food,books,home,beauty,sports,automotive',
            'description' => 'nullable|string|max:1000',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:500',
        ]);

        $shop->update($validatedData);

        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Shop updated successfully!',
                'shop' => $shop
            ]);
        }

        return redirect()->route('shops.index')->with('success', 'Shop updated successfully!');
    }

    /**
     * Remove the specified shop from storage.
     */
    public function destroy(Shop $shop)
    {
        // Make sure the user owns this shop
        if ($shop->user_id !== auth()->id()) {
            abort(403);
        }

        $shop->delete();

        return response()->json([
            'success' => true,
            'message' => 'Shop deleted successfully!'
        ]);
    }

    /**
     * AJAX method for deleting shops
     */
    public function deleteAjax($id)
    {
        $shop = Shop::findOrFail($id);
        
        // Make sure the user owns this shop
        if ($shop->user_id !== auth()->id()) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized action.'
            ], 403);
        }

        $shop->delete();

        return response()->json([
            'success' => true,
            'message' => 'Shop deleted successfully!'
        ]);
    }
}