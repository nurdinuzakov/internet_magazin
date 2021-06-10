<?php


namespace App\Http\Controllers;


class ProductController extends Controller
{
    public function shop($category_id)
    {
       return view('product.shop', ['category_id' => $category_id]);
    }

    public function productDetails()
    {
        return view('product.product-details');
    }
}
