<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class OrderStatus extends Model
{
    use HasFactory;
    protected $table = 'order_statuses';
    protected $fillable=['status_name'];
    public function order()
    {
        return $this->hasOne(Order::class,'status_id');
    }
    // public function getAllOrderStatus()
    // {
    //     $orderStatus = DB::select('select * from order_statuses ');
    //     return $orderStatus;
    // }
}

