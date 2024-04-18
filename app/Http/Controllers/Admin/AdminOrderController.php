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
        $order = Order::find($id);
        return view('admin.orders.viewOrder', compact('order'));
    }
    public function getEditOrder(Request $request, $id = 0)
    {
        $users = Users::all();
        $products = Product::all();
        $statuses = OrderStatus::all();
        if (!empty($id)) {
            $orderDetail = $this->orders->getDetailOrder($id);
            // dd($orderDetail);
            if (!empty($orderDetail)) {
                $request->session()->put('id', $id);
                return view('admin.orders.edit', compact('orderDetail', 'users', 'products', 'statuses'));
            } else {
                return redirect()->route('admin')->with('msg', 'Đơn hàng không tồn tại');
            }
        } else {
            return redirect()->route('admin')->with('msg', 'Liên kết không hợp lệ');
        }
    }
    public function postEditOrder(Request $request)
    {
        $id = session('id');
        if (empty($id)) {
            return back()->with('msg', 'Liên kết không tồn tại');
        }
        $orderDetail = Order::find($id);
        if (!$orderDetail) {
            return back()->with('msg', 'Đơn hàng không tồn tại');
        }
        $currentStatusId = $orderDetail->status_id;
        if ($currentStatusId == 4) {
            return back()->with('msg', 'Đơn hàng đã được hủy trước đó');
        }
        if ($request->status_id == 4) {
            $orderItems = OrderItem::where('order_id', $id)->get();
            foreach ($orderItems as $item) {
                $product = $item->product;
                $product->quantity += $item->quantity;
                $product->save();
            }
        }
        $orderDetail->status_id = $request->status_id;
        $orderDetail->save();
        return redirect()->route('order')->with('msg', 'Cập nhật đơn hàng thành công');
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
