<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware('auth:sanctum')->group(function(){
    Route::get('profile', [Controllers\AuthApiController::class, 'profile']);
    Route::get('logout', [Controllers\AuthApiController::class, 'logout']);
});
Route::get('price', [Controllers\ProductController::class, 'price']);
Route::post('register', [Controllers\AuthApiController::class, 'register']);
Route::post('login', [Controllers\AuthApiController::class, 'login']);

Route::resource('/users', Controllers\UserApiController::class);
Route::resource('/catalogs', Controllers\CatalogController::class);
Route::resource('/products', Controllers\ProductController::class);
Route::post('/products/{product}/add_picture', [Controllers\ProductController::class, 'postPicture']);
Route::post('/products/{product}/add_catalog', [Controllers\ProductController::class, 'addCatalog']);
Route::delete('/products/{product}/detach_catalog', [Controllers\ProductController::class, 'detachCatalog']);
Route::get('/specific-price', [Controllers\ProductController::class, 'specificPrice']);
Route::get('/picture/{product}', [Controllers\ProductController::class, 'getPicture']);
Route::get('/price_first', [Controllers\ProductController::class, 'priceFirst']);
Route::get('/price_two', [Controllers\ProductController::class, 'priceTwo']);
Route::get('/admin', [Controllers\UserApiController::class, 'admin']);
