<?php
	
namespace App\Traits;

use App\Models\Cart;

use Illuminate\Http\Request;

use Illuminate\Contracts\Session\Session;

use Auth;

trait MenuCart
{
	public function showCart()
	{
		if (Auth::user()) {
			$user_id = Auth::user()->id;
		} else {
			$user_id = 0;																			
		}
		$cart_products = Cart::where('user_id', $user_id)->get();
		return $cart_products;
	}

	public function showCartTotal()
	{
		$cart_price = 0;
		if (Auth::user()) {
			$user_id = Auth::user()->id;
		} else {
			$user_id = 0;																			
		}
		$cart_products = Cart::where('user_id', $user_id)->get();	
		foreach ($cart_products as $cart) {
			$cart_price += $cart->product->price * $cart->quantity;
		}

		if ($cart_price > 5000) {	
			$cart_price = $cart_price - (($cart_price * 10) / 100);
		}
		return $cart_price;	
	}
}