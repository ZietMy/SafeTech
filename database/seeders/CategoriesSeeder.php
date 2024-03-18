<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'name' => 'Mũ len',
            ],
            [
                'name' => 'Mũ bảo hiểm',
            ],
            [
                'name' => 'Mũ lưỡi trai',
            ],
        ];

        DB::table('categories')->insert($categories);
    }
}
