<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $orderItems = [
            [
                'order_id' => 1,
                'product_id' => 1,
                'quantity' => 2,
                'price' => 100000,
                'total' => 2 * 150000,
            ],
            [
                'order_id' => 1,
                'product_id' => 2,
                'quantity' => 1,
                'price' => 150000,
                'total' => 1 * 150000,
            ],
            [
                'order_id' => 3,
                'product_id' => 2,
                'quantity' => 1,
                'price' => 150000,
                'total' => 1 * 150000,
            ],
            [
                'order_id' => 2,
                'product_id' => 3,
                'quantity' => 3,
                'price' => 200000,
                'total' => 3 * 150000,
            ],
        ];
    
        DB::table('order_items')->insert($orderItems);
    }
}
