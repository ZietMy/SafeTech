<?php

namespace Database\Seeders;
use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Product;
use App\Models\OrderStatus;
class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_id = User::pluck('id')->random();
        $product_id = Product::pluck('id')->random();
        $status_id = OrderStatus::pluck('id')->random();

        Order::create([
            'user_id' => $user_id,
            'product_id' => $product_id,
            'status_id' => $status_id,
            'quantity' => 2 
        ],
        [
            'user_id' => $user_id,
            'product_id' => $product_id,
            'status_id' => $status_id,
            'quantity' => 1
        ]
    );
    }
}
