<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Upload extends Model
{
    use HasFactory;
    public function postImg($data){
        DB::table('uploads')->insert($data);
    }
     public function getImgDetails($id) {
        return DB::select('SELECT * FROM uploads WHERE id= ?', [$id]);
     }
     public function getEditUpdate($data,$id){
        DB::table('uploads')
        ->where('id',$id)
        ->update([
            'img' => $data['img']
        ]);
     }
    public function deleteImg($id){
        return  DB::delete("DELETE FROM uploads WHERE id=? ", [$id]);
    }
}
