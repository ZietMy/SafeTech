<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Role; // Import model Role

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
    public function add()
    {
        return view('admin.users.add');
    }
    public function postAdd(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required|string|max:255',
            'name'=>'required|string|max:255',
            'role' => 'required|in:1,2',
            'status_id'=>'required',
            'password' => 'required|string|min:8',
            'address' => 'required|string|max:255',
            'gender' => 'required|in:male,female,other',
            'phone' => 'required|string|max:10',
            'email' => 'required|email|unique:users|max:255',
        ], [
            'username.required' => 'Tên là trường bắt buộc.',
            'username.string' => 'Tên phải là chuỗi.',
            'username.max' => 'Tên không được vượt quá 255 ký tự.',
            'role.required' => 'Role là trường bắt buộc.',
            'password.required' => 'Mật khẩu là trường bắt buộc.',
            'password.string' => 'Mật khẩu phải là chuỗi.',
            'password.min' => 'Mật khẩu phải có ít nhất 8 ký tự.',
            'address.required' => 'Địa chỉ là trường bắt buộc.',
            'address.string' => 'Địa chỉ phải là chuỗi.',
            'address.max' => 'Địa chỉ không được vượt quá 255 ký tự.',
            'gender.required' => 'Giới tính là trường bắt buộc.',
            'gender.in' => 'Giới tính không hợp lệ.',
            'phone.required' => 'Số điện thoại là trường bắt buộc.',
            'phone.string' => 'Số điện thoại phải là chuỗi.',
            'phone.max' => 'Số điện thoại không được vượt quá 10 ký tự.',
            'email.required' => 'Email là trường bắt buộc.',
            'email.email' => 'Email không hợp lệ.',
            'email.unique' => 'Email đã tồn tại trong hệ thống.',
            'email.max' => 'Email không được vượt quá 255 ký tự.',
        ]);

        // $roleName = $request->role == 1 ? 'Admin' : 'User';
        $dataInsert = [
            'username' => $request->username,
            'role_id' => $request->role,
            'status_id'=>$request->status_id,
            'name' => $request->name,
            'password' => Hash::make($request->password),
            'address' => $request->address,
            'gender' => $request->gender,
            'phone' => $request->phone,
            'email' => $request->email,
        ];
        $this->users->addUser($dataInsert);
        return redirect()->route('user')->with('msg', 'Thêm người dùng thành công');
    }
    public function getEdit(Request $request, $id = 0)
    {
        if (!empty($id)) {

            $userDetail = $this->users->getDetail($id);
            // dd($userDetail);
            if (!empty($userDetail[0])) {
                $request->session()->put('id', $id);
                $userDetail = $userDetail[0];
            } else {
                return redirect()->route('admin')->with('msg', 'Người dùng không tồn tại');
            }
        } else {
            return redirect()->route('admin')->with('msg', 'Liên kết');
        }
        return view('admin.users.edit', );
    }
    public function postEdit(Request $request)
    {
        $id = session('id');
        if (empty($id)) {
            return back()->with('msg', 'Liên kết không tồn tại');
        }
        $request->validate([
            'username' => 'required|string|max:255',
            'role' => 'required|in:1,2', 
            'password' => 'required|string|min:8',
            'address' => 'required|string|max:255',
            'gender' => 'required|in:male,female,other',
            'phone' => 'required|string|max:10',
            'email' => 'required|email|max:255|unique:users,email,' . $id,
        ], [
            'username.required' => 'Tên là trường bắt buộc.',
            'username.string' => 'Tên phải là chuỗi.',
            'username.max' => 'Tên không được vượt quá 255 ký tự.',
            'role.required' => 'Role là trường bắt buộc.',
            'password.required' => 'Mật khẩu là trường bắt buộc.',
            'password.string' => 'Mật khẩu phải là chuỗi.',
            'password.min' => 'Mật khẩu phải có ít nhất 8 ký tự.',
            'address.required' => 'Địa chỉ là trường bắt buộc.',
            'address.string' => 'Địa chỉ phải là chuỗi.',
            'address.max' => 'Địa chỉ không được vượt quá 255 ký tự.',
            'gender.required' => 'Giới tính là trường bắt buộc.',
            'gender.in' => 'Giới tính không hợp lệ.',
            'phone.required' => 'Số điện thoại là trường bắt buộc.',
            'phone.string' => 'Số điện thoại phải là chuỗi.',
            'phone.max' => 'Số điện thoại không được vượt quá 10 ký tự.',
            'email.required' => 'Email là trường bắt buộc.',
            'email.email' => 'Email không hợp lệ.',
            'email.unique' => 'Email đã tồn tại trong hệ thống.',
            'email.max' => 'Email không được vượt quá 255 ký tự.',
        ]);
    
        // $roleName = $request->role == 1 ? 'Admin' : 'User';

        $dataInsert = [
            'username' => $request->username,
            'role_id' => $request->role,
            'status_id'=>$request->status_id,
            'name' => $request->name,
            'password' => Hash::make($request->password),
            'address' => $request->address,
            'gender' => $request->gender,
            'phone' => $request->phone,
            'email' => $request->email,
        ];
    
        // Cập nhật người dùng trong cơ sở dữ liệu
        $this->users->updateUser($dataInsert, $id);
        return redirect()->route('user')->with('msg', 'Cập nhật người dùng thành công');
    }
    public function delete($id = 0)
    {
        if ($id !== 0) {
            $userDetail = $this->users->getDetail($id);

            if (!empty($userDetail)) {
                $deleteStatus = $this->users->deleteUser($id);

                if ($deleteStatus) {
                    $msg = 'Xóa người dùng thành công';
                } else {
                    $msg = 'Không thể xóa người dùng';
                }
            } else {
                $msg = 'Người dùng không tồn tại';
            }
        } else {
            $msg = 'ID không hợp lệ';
        }
        return redirect()->route('admin')->with('msg', $msg);
    }
}
