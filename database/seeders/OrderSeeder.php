<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\User;
use App\Models\Product;
use App\Models\OrderStatus;
use Illuminate\Support\Facades\DB;


class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $orders = [
            [
                "user_id" => 3,
                "user_name" => "Phạm Hỉ",
                "product_id" => 4,
                "product_name" => "Mũ len đẹp",
                "status_id" => 1,
                "status_name" => "Đơn hàng mới",
                "quantity" => 3
            ],
            [
                "user_id" => 4,
                "user_name" => "Vân Thư",
                "product_id" => 4,
                "product_name" => "Mũ len đẹp",
                "status_id" => 1,
                "status_name" => "Đơn hàng mới",
                "quantity" => 3
            ],
            [

                "user_id" => 2,
                "user_name" => "Việt Mỹ",
                "product_id" => 5,
                "product_name" => "Mũ len đẹp",
                "status_id" => 1,
                "status_name" => "Đơn hàng mới",
                "quantity" => 3
            ]

        ];
        DB::table('orders')->insert($orders);
    }
}
