<?php


namespace App\Http\Controllers;


class ProductController extends Controller
{
    public function productDetails()
    {
        return view('product.product-details');
    }
}
