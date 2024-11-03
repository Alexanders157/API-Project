<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use Illuminate\Http\Request;

class CatalogPageController extends Controller
{
    public function index()
    {
        $catalogs = Catalog::all();
        return view('catalog', compact('catalogs'));
    }

    public function show($id)
    {
        $catalog = Catalog::with('products')->findOrFail($id);
        return view('catalog_show', compact('catalog'));
    }
}
