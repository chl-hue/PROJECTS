<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        // Total Sales (sum of all paid orders)
        $totalSales = Order::where('status', 'Paid')->sum('total_amount');

        // New Orders (recent 7 days)
        $newOrders = Order::where('created_at', '>=', now()->subDays(7))->count();

        // Low Stock Items (example threshold: <= 5)
        $lowStockItems = Product::where('stock', '<=', 5)->count();

        // New Customers (recent 30 days)
        $newCustomers = User::where('created_at', '>=', now()->subDays(30))->count();

        // Recent Orders (latest 5)
        $recentOrders = Order::latest()->take(5)->get();

        // Pass data to Blade
        return view('dashboard', compact(
            'totalSales',
            'newOrders',
            'lowStockItems',
            'newCustomers',
            'recentOrders'
        ));
    }
}
