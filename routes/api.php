<?php

use App\Http\Controllers\AuthController;
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

// If you just have basic crud api without the need for authentication you can use the following which will
// create all the routes for you.

// Route::resource('products', ProductController::class);

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Protected routes

Route::group(['middleware' => ['auth:sanctum']], function () {

    // Add a product to the database

    Route::post('/products', [ProductController::class, 'store']);

    // Update a product

    Route::put('/products/{id}', [ProductController::class, 'update']);

    // Delete a product

    Route::delete('/products/{id}', [ProductController::class, 'destroy']);

    // Log a user out

    Route::post('/logout', [AuthController::class, 'logout']);
});

// Public routes

// Get all products

Route::get('/products', [ProductController::class, 'index']);

// Search all products

Route::get('/products/search/{name}', [ProductController::class, 'search']);

// Return a single product by id

Route::get('/products{id}', [ProductController::class, 'show']);

// Register a user

Route::post('/register', [AuthController::class, 'register']);

// Login a user

Route::post('/login', [AuthController::class, 'login']);
