<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
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
                if($cart->quantity_purchase<$cart->product->quantity){
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
                }else{
                    return redirect()->back()->with('error','Checkout failed');
                }
            }
            foreach($cartShopping as $item){
                $total += $item['total'];    
            }
            session()->put('total', $total);
        }elseif($request->has('product_detail_id')&&$request->has('quantity')){
            $productId = $request->product_detail_id; 
            $product = Product::where('id', $request->product_detail_id)->first();
            if( $request->quantity >= $product->quantity){
                return redirect()->back()->with('error','Checkout failed');
            }
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
        // dd(session('total'));
    //    dd(session('cartShopping'));
        return view('clients.checkout',compact('title','cartShopping','total'));
    }
    public function checkout (Request $request){
        $userId= Auth::id();

        $order = new Order();
        $product = new Product();

        $sessionTotal=session('total');
        $sessionCartShopping = session('cartShopping');
        $order = new Order();
        $order->user_id = $userId;
        $order->total_amount = $sessionTotal;
        $order->status_id = 1; 
        $order->save();

        foreach ($sessionCartShopping as $item) {
            $orderItem = new OrderItem();
            $orderItem->order_id = $order->id; // Gán order_id cho từng sản phẩm
            $orderItem->product_id = $item['product_id'];
            if (!empty($item['product_id'])){
                $product= Product::find($item['product_id']);
                $product->quantity =  $product->quantity - $item['quantity'];
                $product->save();
            }
            $orderItem->price = $item['discounted_price'];
            $orderItem->quantity = $item['quantity'];
            $orderItem->total = $item['total'];
            $orderItem->save();
            if (!empty($item['cart_id'])){
                $cart= Cart::find($item['cart_id']);
                $cart->delete();
            }
        }

        session()->forget('total');
        session()->forget('cartShopping');

        return redirect()->route('checkout.successfully')->with([
            'success' => 'Your order has been placed successfully!',
            'orderId' => $order->id, 
        ]);
    }
}
