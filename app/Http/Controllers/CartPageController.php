<?php

namespace App\Http\Controllers;

use App\Events\ProductAddedToCart;
use App\Events\ProductRemovedFromCart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartPageController extends Controller
{
    public function index()
    {
        $cartItems = Session::get('cart', []);
        return view('cart', compact('cartItems'));
    }

    public function add($id)
    {
        $product = Product::findOrFail($id);
        $cart = Session::get('cart', []);
        $cart[$id] = $product;
        Session::put('cart', $cart);

        event(new ProductAddedToCart($product));

        return redirect()->route('cart.index');
    }

    public function remove($id)
    {
        $cart = Session::get('cart', []);
        if (isset($cart[$id])) {
            $product = $cart[$id];
            unset($cart[$id]);
            Session::put('cart', $cart);

            event(new ProductRemovedFromCart($product));
        }
        return redirect()->route('cart.index');
    }
}
