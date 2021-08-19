<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Basic example of a route function - logic will normally be handled by a controller

// Route::get('/products', function () {
//     return Product::all();
// });

// This is an example of hardcoding data - to not do this you need a controller

// Route::post('/products', function () {
//     return Product::create([
//         'name' => 'Product One',
//         'slug' => 'product-one',
//         'description' => 'This is product one',
//         'price' => '99.99'

//     ]);
// });

// Get all using the index controller on ProductController

// If you just have basic crud api without the need for authentication you can use the following which will
// create all the routes for you.

Route::resource('products', ProductController::class);

// Route::get('/products', [ProductController::class, 'index']);

// Add a product to the database

// Route::post('/products', [ProductController::class, 'store']);

// Get a single product

// Search for a product
Route::get('/products/search/{name}', [ProductController::class, 'search']);
