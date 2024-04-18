<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    // protected $cartItems, $subTotal=0, $total=0;
    public function index(){
        $userId= Auth::user()->id;
        $cartItems = Cart::with('product')->where('user_id', $userId)->get();
        $total=0;
        foreach($cartItems as $item){
            $total += $item->product->discounted_price * $item->quantity_purchase;
            
        }
        return view('clients.cart', compact('cartItems','total'));
    }
    public function addToCart(Request $request){
        $userId= Auth::user()->id;
        $product= Product::where('id', $request->product_id)->first();
        $cart = Cart::where('product_id', $request->product_id)
                ->where('user_id', $userId)
                ->first();
        // $userId=$request->user_id;
        // $quantity =$cart->quantity_purchase+$request->quantity_purchase;  
        // if ($quantity>$product->quantity){
        //     $quantity=$product->quantity;
        // }
        $data = [
            'product_id' => $request->product_id,
            'quantity_purchase' => $request->quantity_purchase,
            'user_id' => $userId,
            // 'total'=>0,
        ];
        if($cart){
            $quantity =$cart->quantity_purchase + $request->quantity_purchase;
            if ($quantity>$product->quantity){
            $quantity=$product->quantity;
            }  
            $cart->quantity_purchase = $quantity;
            $cart->save();
            return redirect()->back()->with('success', 'Update Added to cart successfully.');
            // return response()->json(['message' => 'Update Added to cart successfully'], 200);
        } else {
            Cart::create($data);
            return redirect()->back()->with('success', 'Added to cart successfully.');
            // return response()->json(['message' => 'Added to cart successfully'], 200);
        }
    }
    public function increment($cartId)
    {
        $cart = Cart::find($cartId);
        $product= Product::where('id', $cart->product_id)->first();
        if (!$cart) {
            return redirect()->route('cart')->with('error', 'Cart not found');
        }
        $quantity =$cart->quantity_purchase++;
        if ($quantity>=$product->quantity){
            return redirect()->route('cart')->with('error', 'Cart update failed.');
        } 
        $cart->quantity_purchase;
        $cart->save();
        return redirect()->route('cart')->with('success', 'Cart updated successfully.');
        
    }

    public function decrement($cartId)
    {
        $cart = Cart::find($cartId);
        if (!$cart) {
            return redirect()->route('cart')->with('error', 'Cart not found');
        }

        if ($cart->quantity_purchase > 1) {
            $cart->quantity_purchase--;
            $cart->save();
        }else{
            return redirect()->route('cart')->with('error', 'Cart update failed');
        }

        return redirect()->route('cart')->with('success', 'Cart updated successfully.');
    }
    public function deleteCart($cartId)
    {
        $cart = Cart::find($cartId);
        if ($cart) {
            $cart->delete();
            return redirect()->back()->with('success', 'Cart deleted successfully.');
        }
        return redirect()->back()->with('error', 'Cart not found.');
    }
    public function deleteAllCart()
    {
        $userId= Auth::user()->id;
        Cart::where('user_id', $userId)->truncate();
        return redirect()->back()->with('success', 'All carts deleted successfully.');
    }

}
