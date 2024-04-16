<?php

namespace App\Http\Controllers;

use App\Models\Cart;
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
        // $userId=$request->user_id;
        if ($request->quantity_purchase){
            $quantity =$request->quantity_purchase;
        }else{
            $quantity =1;
        }
        $cart = Cart::where('product_id', $request->product_id)
                ->where('user_id', $userId)
                ->first();
        $data = [
            'product_id' => $request->product_id,
            'quantity_purchase' => $quantity,
            'user_id' => $userId,
            // 'total'=>0,
        ];
        if($cart){
            $cart->quantity_purchase+= $request->quantity_purchase;
            $cart->save();
            return redirect()->route('cart');
            // return response()->json(['message' => 'Update Added to cart successfully'], 200);
        } else {
            Cart::create($data);
            return redirect()->route('cart');
            // return response()->json(['message' => 'Added to cart successfully'], 200);
        }
    }
    public function increment($cartId)
    {
        $cart = Cart::find($cartId);
        if (!$cart) {
            return redirect()->route('cart')->with('error', 'Cart not found');
        }

        $cart->quantity_purchase++;
        $cart->save();

        return redirect()->route('cart');
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
        }

        return redirect()->route('cart');
    }
}
