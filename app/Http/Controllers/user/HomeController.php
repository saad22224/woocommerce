<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Section;

class HomeController extends Controller
{
    public function index()
    {
        $latestproducts = Product::latest()->take(10)->get();
        $bestseller = Product::where('is_best_seller', 1)->get();
        return view('index2' , [
            'latestproducts' => $latestproducts,
            'bestseller' => $bestseller
        ]);
    }
}
