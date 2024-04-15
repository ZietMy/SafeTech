<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index(){
        $userId= Auth::user()->id;
        $cartItems = Cart::with('product')->where('user_id', $userId)->get();
        return view('clients.cart', compact('cartItems'));
    }
    public function addToCart(Request $request){
        $userId= Auth::user()->id;
        $cart = Cart::where('product_id', $request->product_id)
                ->where('user_id', $userId)
                ->first();
        $data = [
            'product_id' => $request->product_id,
            'quantity_purchase' => $request->quantity_purchase,
            'user_id' => $userId,
        ];
        if($cart){
            $cart->quantity_purchase+= $request->quantity_purchase;
            $cart->save();
            return response()->json(['message' => 'Update Added to cart successfully'], 200);
        } else {
            Cart::create($data);
            return response()->json(['message' => 'Added to cart successfully'], 200);
        }
    }
}
