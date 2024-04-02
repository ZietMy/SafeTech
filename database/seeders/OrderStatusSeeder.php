<?php

namespace Database\Seeders;
use App\Models\OrderStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        OrderStatus::create(['status_name' => 'Pending']);
        OrderStatus::create(['status_name' => 'Processing']);
        OrderStatus::create(['status_name' => 'Shipped']);
    }
}
