<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Section;
use App\services\productService;

class ProductController extends Controller
{

    private $productService;

    public function __construct(productService $productService)
    {
        $this->productService = $productService;
    }
    public function index(Request $request)
    {

        $data =   $this->productService->index($request);

        if ($request->ajax()) {
            return $data;
        }

        return view('products', $data);
    }

    public function showproduct($slug)
    {
        $product = $this->productService->show($slug);
        return view('product-detail', compact('product'));
    }
}
