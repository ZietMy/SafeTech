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
    public function addUser($data)
    {
        DB::insert('INSERT INTO users (username,role_id, name, password, address, gender, phonenumber, email) VALUES (?,?, ?, ?, ?, ?, ?, ?)', array_values($data));
    }
    public function getDetail($id){
        return DB::select('select * from '.$this->table.' where id = ?', [$id]);
    }
    public function updateUser($data, $id){
        $query = 'update ' . $this->table . ' set username=?,role_id=?, name=?, password=?, address=?, gender=?, phonenumber=?, email=? where id = ?';
        return DB::update($query, array_values($data + [$id]));
    }
    public function deleteUser($id)
    {
        return DB::delete('DELETE FROM '.$this->table.' WHERE id = ?', [$id]);
    }    
    
    
}
