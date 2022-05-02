<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Staff;
use App\Models\Product;
use App\Models\Category;
use Auth;

class StaffController extends Controller
{
    public function index()
     {
        $latest_product = Product::where('staff_id', Auth::user()->id)->latest()->take(1)->get();
        $products = Product::where('staff_id', Auth::user()->id)->paginate(4);
        $approved_products = Product::where('staff_id', Auth::user()->id)->where('is_publish', 1)->get();
        $unapproved_products = Product::where('staff_id', Auth::user()->id)->where('is_publish', 0)->get();
        $categories = Category::all();
        return view('staff.dashboard', compact('products', 'approved_products', 'categories', 'unapproved_products', 'latest_product'));
     } 
}
