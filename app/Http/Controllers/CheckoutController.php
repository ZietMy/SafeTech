<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    public function index(Request $request)
    {
        $title = "Check out";
        $userId= Auth::id();
        session()->forget('cartShopping');
        session()->forget('total');
        $cartShopping = Session()->get('cartShopping', []);
        $total = Session::get('total', 0);
        if($request->has('product_cart_id')){

            $productCartIds = $request->product_cart_id;
           
            
            foreach ($productCartIds as $cartId) {
                $cart = Cart::with('product')
                            ->where('id', $cartId)
                            ->first();
                $data = [
                    'cart_id'=>$cart->id,
                    'product_id' =>$cart->product->id,
                    'image' =>$cart->product->image,
                    'name'=>$cart->product->name,
                    'quantity' => $cart->quantity_purchase,
                    'price'=> $cart->product->price,
                    'discounted_price' =>$cart->product->discounted_price,
                    'total'=>$cart->product->discounted_price*$cart->quantity_purchase,
                ];
                if ($cart) {
                    $cartShopping[] = $data;
                    session()->put('cartShopping', $cartShopping);
                }
            }
            foreach($cartShopping as $item){
                $total += $item['total'];    
            }
            session()->put('total', $total);
        }elseif($request->has('product_detail_id')&&$request->has('quantity')){
            $productId = $request->product_detail_id; 
            $product = Product::where('id', $request->product_detail_id)->first();
            // dd($product);
            $data = [
                'product_id' =>$product->id,
                'name'=>$product->name,
                'image' =>$product->image,
                'quantity' => $request->quantity,
                'price'=> $product->price,
                'discounted_price' =>$product->discounted_price,
                'total'=>$product->discounted_price *$request->quantity,
            ];
            if ($product) {
                $cartShopping[] = $data;
                $total = $data['total'];
                session()->put('cartShopping', $cartShopping);
                session()->put('total', $total);
            }
        }
       
        return view('clients.checkout',compact('title','cartShopping','total'));
    }
    public function checkout (Request $request){
        //lấy lại session
        // lưu user_id, nơi giao hàng tổng, set trạng thái đơn hàng mới
        // lưu các product vào order_item
        
    }
}
