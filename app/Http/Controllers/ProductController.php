<?php


namespace App\Http\Controllers;


use App\Models\Products;
use App\Models\ProductVariants;
use Illuminate\Http\Request;
use App\Models\Image;
use App\Models\Subcategory;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use function PHPUnit\Framework\throwException;

class ProductController extends Controller
{
    public function product(Request $request, $subcategory_id)
    {
        if(!$subcategory_id){
            throw new NotFoundHttpException('The category was\'nt found!');
        }
        $products = Products::where('subcategory_id', '=', $subcategory_id)
            ->whereBetween('price', [$request->get('min_price', 0), $request->get('max_price', 600)])
            ->paginate(9);

        return view('product.products', compact('products'));
    }

    public function productDetails($product_id)
    {
        $product = Products::find($product_id);
        dd($product->variants()->get());

        if(!$product){
            throw new NotFoundHttpException('The product was\'nt found!');
        }

        return view('product.product-details', ['product' => $product]);
    }

    public function subcategory($category_id)
    {
        $subcategories = Subcategory::where('category_id', '=', $category_id)->get();

        if(!$subcategories){
            throw new NotFoundHttpException('The subcategory was\'nt found!');
        }

        return view('product.subcategory', ['subcategories' => $subcategories]);
    }


    public function cart()
    {
        return view('cart.cart');
    }
}
