<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    use HasFactory;
    public function getAllOrder()
    {
        $orders = DB::select('select * from orders ');
        return $orders;
    }
    public function addOrder($data)
    {
        DB::insert('INSERT INTO orders (user_id,product_id,status_id,quantity) VALUES (?,?, ?, ?)', array_values($data));
    }
    public function getDetailOrder($id){
        return DB::select('select * from '.$this->table.' where id = ?', [$id]);
    }
    public function updateOrder($data, $id){
        $query = 'update ' . $this->table . ' set user_id=?, product_id=?, status_id=?, quantity=? where id=?';
        return DB::update($query, [...array_values($data), $id]);
    }    
    public function deleteOrders($id)
    {
        return DB::delete("DELETE FROM $this->table WHERE id = ?", [$id]);
    }    

}
