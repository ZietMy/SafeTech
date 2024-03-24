<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Categories extends Model
{
    use HasFactory;
    public function getAllCategories(){
        $categories = DB::table('SELECT * FROM categories');
        return $categories;
    }
    public function postCategories($data){
        $categories = DB::table('categories')->insert($data);
        return $categories;
    }
    public function getCategories($id) {
        $category = DB::table('categories')->where('id', $id)->first();
        return $category;
    }
    public function postEdit($data, $id) {
        DB::table('categories')
        ->where('id', $id)
        ->update([
            'name' => $data['name'],
        ]);

    return redirect()->back()->with('msg', 'Cập nhật thành công');
    }
}
