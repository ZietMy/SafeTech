<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Users extends Model
{
    protected $table = 'users';
    use HasFactory;
    
    public function getAllUser()
    {
        $users = DB::select('select * from users ');
        return $users;
    }
    public function getDetail($id){
        return DB::select('select * from '.$this->table.' where id = ?', [$id]);
    }
    public function updateUser($data, $id)
{
    return DB::table('users')
        ->where('id', $id)
        ->update([
            'username' => $data['username'],
            'status_id' => $data['status_id'],
            'status_name' => $data['status_name'],
            'gender' => $data['gender'],
            'email' => $data['email']
        ]);
}
    public function deleteUser($id)
    {
        DB::table('orders')->where('user_id', $id)->delete();
        DB::table('wishlist')->where('user_id', $id)->delete();
        return DB::table($this->table)
                ->where('id', $id)
                ->delete();
    }
    

    
}
