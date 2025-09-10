<?php

namespace App\repository;

use App\Models\Product;
use App\Models\Section;
// use Illuminate\Http\Request;

class productRepository
{
    public function __construct() {}

    public function index($request)
    {
        $activesection = Section::where('status', '1')->get();
        $products = Product::orderBy('id', 'DESC')
            ->skip($request->get('offset', 0))->take(20)
            ->get();


        if ($request->ajax()) {
            return response()->json($products);
        }


        return [
            'products' => $products,
            'activesection' => $activesection
        ];
    }
}
