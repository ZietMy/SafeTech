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
                "status_id" => 1, 
                "quantity" => 3,
                "price" => 100000,
            ],
            [
                "user_id" => 2,
                "status_id" => 1, 
                "quantity" => 3,
                "price" => 100000,
            ],
            [
                "user_id" => 4,
                "status_id" => 1,
                "quantity" => 3,
                "price" => 100000,
            ]
        ];
    
        DB::table('orders')->insert($orders);
    }
}
