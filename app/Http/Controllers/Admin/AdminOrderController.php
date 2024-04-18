<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Product;
use App\Models\OrderStatus;
use App\Models\OrderItem;

class AdminOrderController extends Controller
{
    private $orders;
    public function __construct()
    {
        $this->orders = new Order();
    }
    public function index()
    {
        $orderList = Order::with('orderStatus', 'products', 'users')->get();
        return view('admin.order', compact('orderList'));
    }
    public function viewOrder($id)
    {
        $order = Order::with('orderStatus', 'products', 'users')->find($id);
        return view('admin.orders.viewOrder', compact('order'));
    }
    public function updateOrder( Request $request)
    {
        $order = Order::find($request->id);
        $status = $request->status_id;
        if (!$order) {
            return redirect()->route('order')->with('error', 'Không tìm thấy đơn hàng');
        }

        if ($order->status_id == 1) {
            if ($status == 3) {
                return redirect()->route('order')->with('error', 'Không thể cập nhật đơn hàng thành trạng thái');
            }
            else{
                $orderId= $order->id;
                // Lấy tất cả các sản phẩm trong đơn hàng
                $orderItems = OrderItem::with('product')->where('order_id',$orderId)->get();
                // Cập nhật số lượng cho từng sản phẩm
                foreach ($orderItems as $item) {
                    $product = $item->product;
                    $product->quantity += $item->quantity;
                    $product->save();
                }   
            }
        }
        elseif ($order->status_id == 2) {
            if ($status != 3) {
                return redirect()->route('order')->with('error', 'Không thể cập nhật đơn hàng thành trạng thái');
            }
        }
        elseif ($order->status_ == 3 || $order->status_id == 4) {
            return redirect()->route('order')->with('error', 'Không thể cập nhật đơn hàng thành trạng thái');
        }

        $order->status_id = $status;
        $order->save();

         return redirect()->route('order')->with('success', 'Đã cập nhật trạng thái đơn hàng thành công.');
    }
    public function getEditOrder(Request $request)
    {
        // $users = Users::all();
        // $products = Product::all();
        // $statuses = OrderStatus::all();
        // if (!empty($id)) {
        //     $orderDetail = $this->orders->getDetailOrder($id);
        //     // dd($orderDetail);
        //     if (!empty($orderDetail)) {
        //         $request->session()->put('id', $id);
        //         return view('admin.orders.edit', compact('orderDetail', 'users', 'products', 'statuses'));
        //     } else {
        //         return redirect()->route('admin')->with('msg', 'Đơn hàng không tồn tại');
        //     }
        // } else {
        //     return redirect()->route('admin')->with('msg', 'Liên kết không hợp lệ');
        // }
    }
    public function postEditOrder(Request $request)
    {

        // $id = session('id');
        // if (empty($id)) {
        //     return back()->with('msg', 'Liên kết không tồn tại');
        // }
        // $orderDetail = Order::find($id);
        // if (!$orderDetail) {
        //     return back()->with('msg', 'Đơn hàng không tồn tại');
        // }
        // $currentStatusId = $orderDetail->status_id;
        // // if ($currentStatusId == 4) {
        // //     return back()->with('msg', 'Đơn hàng đã được hủy trước đó');
        // // }
        // if ($request->status_id == 4) {
        //     $orderItems = OrderItem::where('order_id', $id)->get();
        //     foreach ($orderItems as $item) {
        //         $product = $item->product;
        //         $product->quantity += $item->quantity;
        //         $product->save();
        //     }
        // }
        // $orderDetail->status_id = $request->status_id;
        // $orderDetail->save();
        // return redirect()->route('order')->with('msg', 'Cập nhật đơn hàng thành công');
    }
    public function deleteOrder($id = 0)
    {
        if ($id !== 0) {
            $orderDetail = $this->orders->getDetailOrder($id);
            if (!empty($orderDetail[0])) {
                $status_id = $orderDetail[0]->status_id;
                if ($status_id == 3) {
                    $deleteStatus = $this->orders->deleteOrders($id);
                    if ($deleteStatus) {
                        $msg = 'Xóa đơn hàng thành công';
                    } else {
                        $msg = 'Không thể xóa đơn hàng';
                    }
                } else {
                    $msg = 'Không thể xóa đơn hàng với trạng thái không phù hợp';
                }
            } else {
                $msg = 'Đơn hàng không tồn tại';
            }
        } else {
            $msg = 'ID không hợp lệ';
        }
        return redirect()->route('order')->with('msg', $msg);
    }
}
