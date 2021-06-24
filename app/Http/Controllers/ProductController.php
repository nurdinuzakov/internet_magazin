<?php


namespace App\Http\Controllers;


use App\Models\Category;
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
        $categories = Category::all();
        if(!$subcategory_id){
            throw new NotFoundHttpException('The category was\'nt found!');
        }
        $products = Products::where('subcategory_id', '=', $subcategory_id)
            ->whereBetween('price', [$request->get('min_price', 0), $request->get('max_price', 600)])
            ->paginate(9);

        return view('product.products', compact('products', 'categories'));
    }

    public function productDetails($product_id)
    {
        $product = Products::find($product_id);
        $categories = Category::all();
        $images = Image::find($product_id);

        if(!$product){
            throw new NotFoundHttpException('The product was\'nt found!');
        }

        return view('product.product-details', ['product' => $product, 'categories' => $categories, 'images' => $images]);
    }

    public function subcategory($category_id)
    {
        $subcategories = Subcategory::where('category_id', '=', $category_id)->get();

        if(!$subcategories){
            throw new NotFoundHttpException('The subcategory was\'nt found!');
        }

//        return response()->json([], 500);

        return view('product.subcategory', ['subcategories' => $subcategories]);
    }
}
