<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Shop;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\DB;

class AnalyticsController extends Controller
{
    public function index()
    {
        $productsByCategory = Product::select('category', \DB::raw('count(*) as total'))
            ->groupBy('category')
            ->get();

        $productsByShop = Shop::withCount('products')->get();

        $usersByRole = User::select('role', \DB::raw('count(*) as total'))
            ->groupBy('role')
            ->get();

        return view('admin.analytics.index', compact(
            'productsByCategory',
            'productsByShop',
            'usersByRole'
        ));
    }
}
