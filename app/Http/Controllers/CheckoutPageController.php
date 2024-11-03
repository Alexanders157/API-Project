<?php

namespace App\Http\Controllers;

use App\Events\OrderCompleted;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CheckoutPageController extends Controller
{
    public function index()
    {
        $cartItems = Session::get('cart', []);
        return view('checkout', compact('cartItems'));
    }

    public function store(Request $request)
    {
        $cartItems = Session::get('cart', []);
        Session::forget('cart');

        event(new OrderCompleted($cartItems));

        return redirect()->route('checkout.success');
    }

    public function success()
    {
        return view('checkout_success');
    }
}
