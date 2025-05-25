<?php

namespace App\Http\Controllers;

use App\Models\Product; // Import the Product model
use Illuminate\Http\Request; // Standard Request, not strictly needed for index but good practice
use Illuminate\View\View; // For type hinting the return type

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $products = Product::all();
        // The view 'products.index' will be created in the next subtask
        return view('products.index', ['products' => $products]);
    }

    // Future methods like show, create, store, etc., can be added here.
}
