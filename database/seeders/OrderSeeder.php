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
        $user = User::inRandomOrder()->first();
        $product = Product::inRandomOrder()->first();
        $status = OrderStatus::inRandomOrder()->first();

        if ($user && $product && $status) {
            for ($i = 0; $i < 4; $i++) {
                Order::create([
                    'user_id' => $user->id,
                    'user_name' => $user->name,
                    'product_id' => $product->id,
                    'product_name' => $product->name,
                    'status_id' => $status->id,
                    'status_name' => $status->status_name,
                    'quantity' => rand(1, 10), 
                ]);
            }
        } else {
        }
    }
}
