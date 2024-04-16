<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Role; // Import model Role
use App\Models\Status;

class AdminController extends Controller
{
    private $users;
    public function __construct()
    {
        $this->users = new Users();
    }
    public function index()
    {
        $userList = $this->users->getAllUser();
        return view('admin.user', compact('userList'));
    }

public function getEdit(Request $request, $id = 0)
{
    if (!empty($id)) {
        $userDetail = $this->users->getDetail($id);
        $users = Users::all();
        $status = Status::all(); 
        if (!empty($userDetail[0])) {
            $request->session()->put('id', $id);
            $userDetail = $userDetail[0];
        } else {
            return redirect()->route('admin')->with('msg', 'Người dùng không tồn tại');
        }
    } else {
        return redirect()->route('admin')->with('msg', 'Liên kết');
    }
    return view('admin.users.edit', compact('userDetail', 'users', 'status')); // Truyền dữ liệu $status vào view
}

    public function postEdit(Request $request)
    {
        $id = session('id');
        if (empty($id)) {
            return back()->with('msg', 'Liên kết không tồn tại');
        }
        $request->validate([
            'username' => 'required|string|max:255',
            'gender' => 'required|in:male,female,other',
            'email' => 'required|email|max:255|unique:users,email,' . $id,
        ], [
            'username.required' => 'Tên là trường bắt buộc.',
            'username.string' => 'Tên phải là chuỗi.',
            'username.max' => 'Tên không được vượt quá 255 ký tự.',
            'gender.required' => 'Giới tính là trường bắt buộc.',
            'gender.in' => 'Giới tính không hợp lệ.',
            'email.required' => 'Email là trường bắt buộc.',
            'email.email' => 'Email không hợp lệ.',
            'email.unique' => 'Email đã tồn tại trong hệ thống.',
            'email.max' => 'Email không được vượt quá 255 ký tự.',
        ]);

        $dataInsert = [
            'username' => $request->username,
            'status_id' => $request->status_id,
            'status_name' => $request->status_name,
            'gender' => $request->gender,
            'email' => $request->email,
        ];
        $this->users->updateUser($dataInsert, $id);
        return redirect()->route('user')->with('msg', 'Cập nhật người dùng thành công');
    }
    public function delete($id = 0)
    {
        if ($id !== 0) {
            $userDetail = $this->users->getDetail($id);
    
            if (!empty($userDetail)) {
                $status_id = $userDetail[0]->status_id;
                if ($status_id == 2) {
                    $deleteStatus = $this->users->deleteUser($id, 2);
                    if ($deleteStatus) {
                        $msg = 'Xóa người dùng thành công';
                    } else {
                        $msg = 'Không thể xóa người dùng';
                    }
                } else {
                    $msg = 'Không thể xóa người dùng vì người dùng này đang hoạt động';
                }
            } else {
                $msg = 'Người dùng không tồn tại';
            }
        } else {
            $msg = 'ID không hợp lệ';
        }
<<<<<<< HEAD
        return redirect()->route('admin')->with('msg', $msg);
    }
    
    
}
=======
        return redirect()->route('user')->with('msg', $msg);
    }   
}
>>>>>>> e38408b5214d4ca175a87268cafdb9f3c5de1dd1
