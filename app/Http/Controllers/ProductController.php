<?php


namespace App\Http\Controllers;


use App\Models\Products;

class ProductController extends Controller
{
    public function category($category_id)
    {
        $products = Products::where('category_id', '=', $category_id)->get();

        return view('product.category', ['products' => $products]);
    }

    public function productDetails()
    {
        return view('product.product-details');
    }
}
