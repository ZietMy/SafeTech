<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Contact extends Model
{
    use HasFactory;
    protected $table = 'contact';
    public function postForm($data)
    {
        $contact = DB::table('contact')->insert($data);
        return  $contact;
    }

    public function getContactId($id) {
        $category = DB::table('contact')->where('id', $id)->first();
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
    public function postUpdate($data,$id)
    {
      $contact = DB::table('contact')
        ->where('id', $id)
        ->update([
            'status_id' => $data['status_id'],
        ]);
        dd($contact);
        return redirect()->back();
    }
}
