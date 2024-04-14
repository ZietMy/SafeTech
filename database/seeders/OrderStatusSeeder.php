<?php

namespace Database\Seeders;

use App\Models\OrderStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('order_statuses')->delete();
        $orderStatuses = [
            ['status_name' => 'Đơn hàng mới'],
            ['status_name' => 'Đơn hàng đang giao'],
            ['status_name' => 'Đơn hàng đã giao '],
            ['status_name' => 'Đơn hàng đã hủy '],
        ];

        DB::table('order_statuses')->insert($orderStatuses);
    }
}
