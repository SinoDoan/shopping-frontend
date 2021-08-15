<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(Request $request)
    {
        $carts = session()->get('cart');
        return view('products.cart.cart', compact('carts'));
    }
    public function addToCart($id)
    {
        //session()->flush('cart');
        $product = Product::find($id);
        $cart = session()->get('cart');
        if(isset($cart[$id])){
            $cart[$id]['quantity'] = $cart[$id]['quantity'] + 1;
        }
        else{
            $cart[$id] = [
                'id' => $product->id,
                'name'=>$product->name,
              'price'=>$product->price,
                'quantity' => 1,
                'image'=>$product->feature_image_path,
            ];
        }
        session()->put('cart', $cart);
        return response()->json([
            'code' => 200,
            'message'=>'success'
        ], 200);
    }
    public function updateCart(Request $request)
    {
        if($request->id && $request->quantity){
            $carts = session()->get('cart');
            $carts[$request->id]['quantity'] = $request->quantity;
            session()->put('cart', $carts);
            $carts = session()->get('cart');
            $cartComponent = view('products.cart.component.cart-info', compact('carts'))->render();
            return response()->json([
                'cart_component' => $cartComponent,
                'code'=> 200
            ], 200);
        }
    }
    public function deleteCart(Request $request)
    {
        if($request->id){
            $carts = session()->get('cart');
            unset($carts[$request->id]);
            session()->put('cart', $carts);
            $carts = session()->get('cart');
            $cartComponent = view('products.cart.component.cart-info', compact('carts'))->render();
            return response()->json([
                'cart_component' => $cartComponent,
                'code'=> 200
            ], 200);
        }
    }
}
