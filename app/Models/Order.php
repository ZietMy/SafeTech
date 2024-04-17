<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Order extends Model
{
    protected $table = 'orders';
    use HasFactory;
    protected $fillable = ['user_id', 'status_id', 'quantity', 'total_price'];
    public function orderStatus()
    {
        return $this->belongsTo(OrderStatus::class, 'status_id');
    }
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
    public function products(): HasManyThrough
    {
        return $this->hasManyThrough(Product::class, OrderItem::class, 'order_id', 'id', 'id', 'product_id');
    }
    public function users()
    {
        return $this->belongsTo(Users::class, 'user_id');
    }

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
    public function getDetailOrder($id)
    {
        return Order::with('orderStatus')->where('id', $id)->get();
    }

    public function updateOrder($data, $id)
    {
        DB::table('orders')
            ->where('id', $id)
            ->update([
                'status_id' => $data['status_id']
            ]);
    }
    public function deleteOrders($id)
    {
        return DB::delete("DELETE FROM $this->table WHERE id = ?", [$id]);
    }
}
