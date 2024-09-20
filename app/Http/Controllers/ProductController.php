<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Resources\ProductResource;
use App\Actions\Imag;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return ProductResource::collection($products);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product = Product::create($request->all());
        return new ProductResource($product);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::find($id);
        return new ProductResource($product);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);
        Storage::disk('public')->delete('products/' . $product->picture);
        Storage::disk('public')->delete('products/s_' . $product->picture);
        $product->delete();
        return new ProductResource($product);
    }

    public function addCatalog(Product $product, Request $request){
        abort_if(!$request->catalog_id, '401','catalog_id is empty');
        $product->catalogs()->syncWithoutDetaching([$request->catalog_id]);
        return new ProductResource($product);
    }
    public function detachCatalog(Product $product, Request $request){
        abort_if(!$request->catalog_id, '401','catalog_id is empty');
        $product->catalogs()->detach([$request->catalog_id]);
        return new ProductResource($product);
    }

    public function addPicture(Request $request, Product $product)
    {
       $pic = App::make(Imag::class)->url($request->picture);

       if ($pic) {
           $product->update([
               'picture' => $pic,
           ]);
       }
       return new ProductResource($product);
    }

    public function deletePicture(Product $product) {
        Storage::disk('public')->delete('products/' . $product->picture);
        Storage::disk('public')->delete('products/s_' . $product->picture);
        $product->update([
            'picture' => null,
        ]);
        return new ProductResource($product);
    }
}
