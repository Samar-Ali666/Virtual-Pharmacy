<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Product;
use App\Traits\MainMenu;
use App\Traits\MenuCart;
use Illuminate\Http\Request;    

class ShopController extends Controller
{
    use MainMenu, MenuCart;

    public function showCategoryProducts($id)
    {
        $main_menu = $this->mainMenu();
        $full_menu = $this->fullMenu();
        $cart_products = $this->showCart();
        $cart_price = $this->showCartTotal();
        $category = Category::findOrFail($id);
        $subcategories = Subcategory::where('category_id', $category->id)->get();      
        $products = Product::where('category_id', $category->id)->where('is_publish', 1)->paginate(12);
        
        return view('shop', compact('products', 'main_menu', 'category', 'subcategories','cart_products', 'cart_price', 'full_menu'));
    }

    public function showSubcategoryProducts($id)
    {
        $main_menu = $this->mainMenu();
        $full_menu = $this->fullMenu();
        $cart_products = $this->showCart();
        $cart_price = $this->showCartTotal();
        $category = Subcategory::findOrFail($id);
        $subcategories = Subcategory::where('category_id', $category->category->id)->get();
        $products = Product::where('subcategory_id', $category->id)->where('is_publish', 1)->paginate(12);
        return view('shop', compact('products', 'main_menu', 'category', 'subcategories', 'cart_products', 'cart_price', 'full_menu'));
    }

    public function showSingleProduct($id)
    {
        $main_menu = $this->mainMenu();
        $full_menu = $this->fullMenu();
        $cart_products = $this->showCart();
        $cart_price = $this->showCartTotal();
        $product = Product::findOrFail($id);
        $products = Product::take(3)->get();

        return view('single-product', compact('main_menu', 'product', 'products', 'cart_products', 'cart_price', 'full_menu'));
    }

    public function search(Request $request)
    {
        $main_menu = $this->mainMenu();
        $full_menu = $this->fullMenu();
        $cart_products = $this->showCart();
        $cart_price = $this->showCartTotal();
        $products = Product::all();
        $query = $request->get('search');
        $product = Product::where('name', 'LIKE', '%'.$query.'%')->orWhere('company', 'LIKE', '%'.$query.'%')->get();
        if ($query != '') {
            if (count($product) > 0) {
                return view('search', compact('product', 'main_menu', 'cart_products', 'cart_price', 'full_menu'))->withDetails($product)->withQuery($query);
            } else {
                return view('search', compact('product', 'main_menu', 'cart_products', 'cart_price','full_menu'))->withMessage('No product found!');
            }
        } else {
            return view('search', compact('product', 'main_menu', 'cart_products', 'cart_price', 'full_menu'))->withMessage('No product found!');
        }
    }
}
