<?php


namespace App\Http\Controllers;


use App\Models\Products;
use App\Models\Image;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use function PHPUnit\Framework\throwException;

class ProductController extends Controller
{
    public function category($category_id)
    {
        if(!$category_id){
            throw new NotFoundHttpException('The category was\'nt found!');
        }

        $products = Products::where('category_id', '=', $category_id)->get();

        return view('product.category', ['products' => $products]);
    }

    public function productDetails($product_id)
    {
        $product = Products::find($product_id);
//        $category_id = $product->category_id;
//        $images = Image::find($category_id);
//
////        dd($images);

        if(!$product){
            throw new NotFoundHttpException('The product was\'nt found!');
        }

        return view('product.product-details', ['product' => $product]);
    }

    public function cart()
    {
        return view('cart.cart');
    }
}
