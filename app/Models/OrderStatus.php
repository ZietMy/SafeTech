<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class OrderStatus extends Model
{
    use HasFactory;
    protected $table = 'order_statuses';
    use HasFactory;
    public function getAllOrderStatus()
    {
        $orderStatus = DB::select('select * from order_statuses ');
        return $orderStatus;
    }
}
