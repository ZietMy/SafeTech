<?php

namespace App\Http\Controllers;

use App\Models\Upload;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    private $table;
    public function __construct()
    {
        $this->table = new Upload();
    }
    public function index()
    {
        $title = "Admin Upload ảnh";
        $img = Upload::all();
        return view('admin.upload.adminUpload', compact('title', 'img'));
    }
    public function getUpload()
    {
        $title = "Create Upload";
        return view('admin.upload.createUpload', compact('title'));
    }
    public function postUpload(Request $request)
    {  
        if ($request->hasFile('img')) {
            $path = $request->file('img')->store('public/images');
            $data = [
                'img' => substr($path, strlen('public/'))
            ];
            $this->table->postImg($data);
            return redirect()->route('upload')->with('msg', 'Thêm thành công');
        }
    }

    public function getEditUpload(Request $request, $id = 0)
    {
        $title = "Edit";
        $imgDetails = null;
        if (!empty($id)) {
            $img = $this->table->getImgDetails($id);
            if (!empty($img)) {
                $request->session()->put('id', $id);
                $imgDetails  = $img[0];
            } else {
                return redirect()->route('upload')->with('msg', 'Không hiển thị');
            }
        }
        return view('admin.upload.editUpload', compact('imgDetails', 'title', 'img'));
    }
    public function postEditUpload(Request $request)
    {
        $id = session('id');
        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $path = $file->store('public/images');
            $data = [
                'img' => substr($path, strlen('public/'))
            ];
            $this->table->getEditUpdate($data, $id);
        }
        return redirect()->route('upload')->with('msg', 'Cập nhật thành công');
    }
    public function deleteImg($id)
    {
        $delete = $this->table->deleteImg($id);
        if ($delete) {
            return redirect()->route('upload')->with('msg', 'Xoa thành công');
        } else {
            return redirect()->route('upload')->with('msg', 'Không xóa được');
        }
    }
}
