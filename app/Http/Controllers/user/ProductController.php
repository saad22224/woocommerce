<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Section;
class ProductController extends Controller
{
    public function index()
    {
        $activesection = Section::where('status', '1')->get();
        $products = Product::all();
        return view('products', compact('products' , 'activesection'));
    }
}
