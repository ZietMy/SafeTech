<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Product;
use App\Models\OrderStatus;

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
        // dd($statuses);
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
        $orderDetail = $this->orders->getDetailOrder($id);
        $currentStatusId = $orderDetail[0]->status_id;
        if (!in_array($currentStatusId, [1, 2])) {
            return back()->with('msg', 'Không thể chỉnh sửa đơn hàng ở trạng thái này');
        }
        $request->validate([
            'status_id' => 'required|integer',
        ], [
            'status_id.required' => 'Status name là trường bắt buộc.',
            'status_id.integer' => 'Status ID phải là số nguyên.',
        ]);

        if ($currentStatusId == 2 && $request->status_id == 1) {
            return back()->with('msg', 'Không thể chuyển đơn hàng đã giao hàng thành đơn hàng mới');
        }
        $status = OrderStatus::find($request->status_id);
        $status_name = $status ? $status->status_name : '';
        $dataUpdate = [
            'status_id' => $request->status_id,
            'status_name' => $status_name,
        ];
        $this->orders->updateOrder($dataUpdate, $id);
        return redirect()->route('order')->with('msg', 'Cập nhật đơn hàng thành công');
    }
}
