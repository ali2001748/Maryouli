<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DesignController;
use App\Http\Controllers\ProductController; // Ensure this use statement is added

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


// Route to show the design creation page
Route::get('/design/create', [DesignController::class, 'create'])->name('design.create');

// Route to handle the design generation request (from the form)
Route::post('/design/generate', [DesignController::class, 'generate'])->name('design.generate');

// Route to display a list of all products
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
