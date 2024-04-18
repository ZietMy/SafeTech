<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Upload;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RolesSeeder::class,
            StatusSeeder::class,
            UserSeeder::class,
            CategoriesSeeder::class,
            ProductsSeeder::class,
            UploadSeeder::class,
            ContactSeeder::class,
            OrderStatusSeeder::class,
            OrderSeeder::class,
            // OrderItemSeeder::class,
        ]);
    }
}
