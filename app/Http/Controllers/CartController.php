<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Cart;

use App\Traits\MenuCart;

use App\Traits\MainMenu;

use Auth;

class CartController extends Controller
{
    use MenuCart, MainMenu;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function addToCart(Request $request)
    {
       $user = Auth::user()->id;

       $input = [
            'product_id' => $request->input('product_id'),
            'user_id' => $user,
            'quantity' => $request->input('quantity'),
       ];

       if ($input['quantity'] < 1) {
           
           alert()->warning('Enter Quantity', 'please enter valied quantity');

           return redirect()->back();
       }

       $product_exists = Cart::where('product_id', '=', $input['product_id'])->first();

       if (!$product_exists) {
           Cart::create($input);
       }    

       toast('product added to cart successfully!', 'success');

       return redirect()->back();     
    }

    public function removeCartProduct($id)
    {
        $cart_product = Cart::findOrFail($id);

        $cart_product->delete();

        toast('product removed from cart successfully!', 'warning');

        return redirect()->back();
    }

    public function showUserCart()  
    {
        $cart_products = $this->showCart();

        $cart_price = $this->showCartTotal();

        $main_menu = $this->mainMenu();

        $full_menu = $this->fullMenu();

        return view('cart', compact('cart_products', 'cart_price', 'main_menu', 'full_menu'));
    }
}
