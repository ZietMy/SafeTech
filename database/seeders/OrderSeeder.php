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
                 "total_amount" => 300000, // Calculate total amount
                 "status_id" => 1,
             ],
             [
                 "user_id" => 2,
                 "total_amount" => 100000,
                 "status_id" => 1,
             ],
             [
                 "user_id" => 4,
                 "total_amount" => 300000,
                 "status_id" => 1,
             ]
         ];
     
         DB::table('orders')->insert($orders);
     } 
}
