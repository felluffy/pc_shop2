<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Interfaces\ProductInterface;
use App\Interfaces\AttributeInterface;

class ProductController extends Controller
{
    protected $productRepository;
    protected $attributeRepository;
    public function __construct(ProductInterface $productRepository, AttributeInterface $attributeRepository)
    {
        $this->productRepository = $productRepository;
        $this->attributeRepository = $attributeRepository;
    }

    public function show($name)
    {
        error_log('ERROR AT ProductController\n');
        $product = $this->productRepository->findProductByName($name);
        $attributes = $this->attributeRepository->listAttributes();
        //dd($product, $attributes);
        return view('site.pages.products', compact('product', 'attributes'));
    }

    public function addToCart(Request $request)
    {
        dd($request->all());
    }
}
