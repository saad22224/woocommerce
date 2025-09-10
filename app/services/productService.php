<?php
namespace App\services;

use App\repository\productRepository;
// use Illuminate\Http\Request;
class productService
{
    protected $productRepository;

    public function __construct(productRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function index($request)
    {
        return $this->productRepository->index($request);
    }
}