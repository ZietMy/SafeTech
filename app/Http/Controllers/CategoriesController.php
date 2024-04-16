<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    private $categories;
    public function __construct()
    {
        $this->categories = new Categories();
    }
    public function index()
    {
        $listCategories = Categories::all();
        return view('admin.categories',['listCategories' => $listCategories]);
    }
    public function getCategories()
    {
        $title = "Create Categories";
        return view('admin.categories.create');
    }
    public function postCategories(Request $request)
    {
        $request->validate([
            'name' => 'required|min:5',
        ],[
            'name.required' => 'Bạn phải nhập thông tin vào ô',
            'name.min' => 'Bạn phải nhập trên :min'
        ]);
        $data = [
            'name' => $request->name,
        ];
        $this->categories->postCategories($data);
        return redirect()->route('categories')->with('msg','Thêm dữ liệu thành công');
    }
    public function editCategories(Request $request, $id = 0)
    {
        if(!empty($id)){
            $categoryDetails = $this->categories->getCategories($id);
            if(!empty( $categoryDetails)){
                $request->session()->put('id',$id);
                $categoryDetail =  $categoryDetails;
            }
            else {
                return redirect()->route('categories')->with('msg','Người dùng không tồn tại');
            }
        }
        return view('admin.categories.edit',compact('categoryDetail'));
    }
    public function postEditCategories(Request $request){
        $id = session('id');
        if(empty($id)){
            return back()->with('msg','ID không tồn tại');
        }
        $request->validate([
            'name' => 'required|min:5'
        ],[
            'name.required' => 'Bạn phải nhập thông tin vào ô',
            'name.min' => 'Bạn phải nhập trên :min ký tự'
        ]);
        $data = [
            'name' => $request->name,
        ];
    
        $this->categories->postEdit($data, $id);
    
        return redirect()->route('categories')->with('msg', 'Cập nhật thành công');
    }
    public function deleteCategories($id ){
       $this->categories->deleteCategories($id);
        return redirect()->route('categories')->with('msg', 'Xóa thành công');
    }
}
