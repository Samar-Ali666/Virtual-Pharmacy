<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\MainMenu;
use App\Traits\MenuCart;
use App\Models\Order;
use App\Jobs\PlaceOrder;
use Auth;

class CheckoutController extends Controller
{
    use MainMenu, MenuCart;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $main_menu = $this->mainMenu();
        $full_menu = $this->fullMenu();
        $cart_products = $this->showCart();
        $cart_price = $this->showCartTotal();
        return view('checkout', compact('main_menu', 'cart_products', 'cart_price', 'full_menu'));
    }

    public function checkout(Request $request)
    {
        $request->validate([
            'country' => 'required',
            'city' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);

        $cart_price = $this->showCartTotal();
        $cart_products = $this->showCart();
        $user_id = Auth::user()->id;
        $input = [
            'user_id' => $user_id,
            'country' => $request->country,
            'city' => $request->city,
            'phone' => $request->phone,
            'address' => $request->address,
            'total' => $cart_price,
        ];

        $order = Order::create($input);         
        foreach($cart_products as $cart){ 
                $order->products()->syncWithoutDetaching([
                $cart->product->id => [
                    'quantity' => $cart->quantity,
                ]
            ]); 
        }
        foreach($cart_products as $cart)
        {
            $cart->delete();
        }
        PlaceOrder::dispatch($order->user->email, $order)->onQueue('place_order');
        alert()->success('Order Placed!', 'your order has been placed successfully');
        return redirect()->route('home');     
    }
}
    