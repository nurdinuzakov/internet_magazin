<?php


namespace App\Http\Controllers;


use App\Models\Products;
use Illuminate\Http\Request;

class Cart extends Controller
{

    public function cart()
    {
        $products = session()->get('cart', []);
        return view('cart.cart', compact('products'));
    }

    public function addToCart($productId)
    {
        $product = Products::find($productId);
        if(!$product) {
            abort(404);
        }
        $cart = session()->get('cart');
        // if cart is empty then this the first product
        if(!$cart) {
            $cart = [
                $productId => [
                    "name" => $product->name,
                    "quantity" => 1,
                    "price" => $product->price,
                    "image" => $product->images
                ]
            ];
            session()->put('cart', $cart);
            return response()->json(['success' => true, 'message' => 'Product added to cart successfully!',
                'productCount' => count($cart)]);
        }
        // if cart not empty then check if this product exist then increment quantity
        if(isset($cart[$productId])) {
            $cart[$productId]['quantity']++;
            session()->put('cart', $cart);
            return response()->json(['success' => true, 'message' => 'Product added to cart successfully!',
                'productCount' => count($cart)]);
        }
        // if item not exist in cart then add to cart with quantity = 1
        $cart[$productId] = [
            "name" => $product->name,
            "quantity" => 1,
            "price" => $product->price,
            "image" => $product->images
        ];
        session()->put('cart', $cart);
        return response()->json(['success' => true, 'message' => 'Product added to cart successfully!',
            'productCount' => count($cart)]);
    }
}
