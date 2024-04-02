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
        $orderList = $this->orders->getAllOrder();
        return view('admin.order', compact('orderList'));
    }
    public function addOrder()
    {
        $users = Users::all();
        $products = Product::all();
        $statuses = OrderStatus::all();
        return view('admin.orders.add', compact('users', 'products', 'statuses'));
    }
    public function postAddOrder(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|integer',
            'product_id' => 'required|integer',
            'status_id' => 'required|integer',
            'quantity' => 'required|integer',
        ], [
            'user_id.required' => 'User ID là trường bắt buộc.',
            'user_id.integer' => 'User ID phải là số nguyên.',
            'product_id.required' => 'Product ID là trường bắt buộc.',
            'product_id.integer' => 'Product ID phải là số nguyên.',
            'status_id.required' => 'Status ID là trường bắt buộc.',
            'status_id.integer' => 'Status ID phải là số nguyên.',
            'quantity.required' => 'Số lượng là trường bắt buộc.',
            'quantity.integer' => 'Số lượng phải là số nguyên.',
        ]);

        $dataInsert = [
            'user_id' => $request->user_id,
            'product_id' => $request->product_id,
            'status_id' => $request->status_id,
            'quantity' => $request->quantity,
        ];

        $this->orders->addOrder($dataInsert);

        return redirect()->route('order')->with('msg', 'Thêm đơn hàng thành công');
    }
    public function getEditOrder(Request $request, $id = 0)
    {
        $users = Users::all();
        $products = Product::all();
        $statuses = OrderStatus::all();
        if (!empty($id)) {
            $orderDetail = $this->orders->getDetailOrder($id);
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
        $request->validate([
            'user_id' => 'required|integer',
            'product_id' => 'required|integer',
            'status_id' => 'required|integer',
            'quantity' => 'required|integer',
        ], [
            'user_id.required' => 'User ID là trường bắt buộc.',
            'user_id.integer' => 'User ID phải là số nguyên.',
            'product_id.required' => 'Product ID là trường bắt buộc.',
            'product_id.integer' => 'Product ID phải là số nguyên.',
            'status_id.required' => 'Status ID là trường bắt buộc.',
            'status_id.integer' => 'Status ID phải là số nguyên.',
            'quantity.required' => 'Số lượng là trường bắt buộc.',
            'quantity.integer' => 'Số lượng phải là số nguyên.',
        ]);

        $dataUpdate = [
            'user_id' => $request->user_id,
            'product_id' => $request->product_id,
            'status_id' => $request->status_id,
            'quantity' => $request->quantity,
        ];

        $this->orders->updateOrder($dataUpdate, $id);
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
