<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Aop\Models\Admin;
use App\Models\Product;
use App\Models\Category;
use App\Models\User;
use App\Models\Staff;

class AdminController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $categories = Category::all();
        $users = User::latest()->paginate(4);
        $staffs = Staff::all();
        return view('admin.dashboard', compact('products', 'categories', 'users', 'staffs'));
    }
}
