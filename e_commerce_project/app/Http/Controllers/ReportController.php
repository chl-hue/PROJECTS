<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;

class ReportController extends Controller
{
    public function index()
    {
        $salesReport = Order::selectRaw('DATE(created_at) as date, SUM(total_amount) as total')
            ->groupBy('date')
            ->orderBy('date', 'DESC')
            ->take(7)
            ->get();

        $lowStock = Product::where('stock', '<', 10)->get();

        return view('reports.index', compact('salesReport', 'lowStock'));
    }
}