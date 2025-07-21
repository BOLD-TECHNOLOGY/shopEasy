<?php

namespace App\Policies;

use App\Models\Product;
use App\Models\User;
use App\Models\Shop;
use Illuminate\Auth\Access\Response;

class ProductPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true; // Changed from false - users should be able to view their products
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Product $product): bool
    {
        return $user->id === $product->shop->user_id;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user, Shop $shop = null): bool
    {
        // Fixed: $shop was undefined in original code
        if (!$shop) return true; // Allow if no specific shop provided
        return $user->id === $shop->user_id;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Product $product): bool
    {
        return $user->id === $product->shop->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Product $product): bool
    {
        return $user->id === $product->shop->user_id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Product $product): bool
    {
        return $user->id === $product->shop->user_id;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Product $product): bool
    {
        return $user->id === $product->shop->user_id;
    }
}