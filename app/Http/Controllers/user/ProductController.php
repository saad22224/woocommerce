<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Section;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $activesection = Section::where('status', '1')->get();
        $products = Product::orderBy('id', 'DESC')
        ->skip($request->get('offset' , 0))->take(20)
        ->get();

        if ($request->ajax()) {
            return response()->json($products);
        }
        return view('products', compact('products', 'activesection'));
    }
}
