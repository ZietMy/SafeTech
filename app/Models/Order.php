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
        $orders = DB::table('orders')->insert($data);
        return  $orders;
    }  
    public function getDetailOrder($id){
        return DB::select('select * from '.$this->table.' where id = ?', [$id]);
    }
    public function updateOrder($data, $id) {
        DB::table('orders')
            ->where('id', $id)
            ->update([
                'status_id' => $data['status_id'],
                'status_name' => $data['status_name'], 
            ]);
    }    
    public function deleteOrders($id)
    {
        return DB::delete("DELETE FROM $this->table WHERE id = ?", [$id]);
    }    

}
