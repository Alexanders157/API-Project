<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductPageController extends Controller
{
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('product', compact('product'));
    }
}