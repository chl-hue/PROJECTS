<?php

namespace App\Http\Controllers;

use App\Models\User;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = User::withCount('orders')->get();
        return view('customers.index', compact('customers'));
    }
}