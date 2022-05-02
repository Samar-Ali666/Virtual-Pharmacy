<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Traits\MainMenu;
use App\Traits\MenuCart;
use App\Models\Category;
use App\Models\Order;

use Auth;

class HomeController extends Controller
{
    use MainMenu, MenuCart;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $main_menu = $this->mainMenu();
        $full_menu = $this->fullMenu();
        $cart_price = $this->showCartTotal();
        $cart_products = $this->showCart();
        $orders = Order::latest()->where('user_id', Auth::user()->id)->where('status', 0)->get();
        return view('home', compact('main_menu', 'cart_products', 'cart_price', 'orders', 'full_menu'));
    }

    public function shippedOrder()
    {
        $main_menu = $this->mainMenu();
        $full_menu = $this->fullMenu();
        $cart_price = $this->showCartTotal();
        $cart_products = $this->showCart();
        $orders = Order::latest()->where('user_id', Auth::user()->id)->where('status', 1)->get();
        return view('user-shipped-orders', compact('main_menu', 'cart_products', 'cart_price', 'orders', 'full_menu'));
    }

    public function recievedOrder()
    {
        $main_menu = $this->mainMenu();
        $full_menu = $this->fullMenu();
        $cart_price = $this->showCartTotal();
        $cart_products = $this->showCart();
        $orders = Order::latest()->where('user_id', Auth::user()->id)->where('status', 2)->get();
        return view('user-recieved-orders', compact('main_menu', 'cart_products', 'cart_price', 'orders', 'full_menu'));
    }

    public function removeOrder($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();
        alert()->error('Order Canceled!', 'order has been cancel successfully');
        return redirect()->back();  
    }
}
