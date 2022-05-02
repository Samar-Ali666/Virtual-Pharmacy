<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;
use App\Traits\MainMenu;
use App\Traits\MenuCart;
use App\Models\Product;

class WelcomeController extends Controller
{
    use MainMenu, MenuCart;   

    public function index()
    {

        $cart_products = $this->showCart();
        $cart_price = $this->showCartTotal();
        $main_menu = $this->mainMenu();
        $full_menu = $this->fullMenu();
        $medicines_category = Category::where('name', 'Medicines')->get();
        $mens_category = Category::where('name', 'Men\'s care')->get();
        $womens_category = Category::where('name', 'Women\'s Care')->get();
        $gym_category = Category::where('name', 'Gym & Fitness')->get();
        return view('welcome', compact('main_menu', 'cart_products', 'cart_price', 'full_menu', 'medicines_category', 'mens_category', 'womens_category', 'gym_category'));
    }   
}
