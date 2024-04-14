<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UploadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $img = [
        [
            'img' => "images\1tY2wyQBT0ycZBz4JvzrzWF4MIj3Gzb3PJ3sKxO1.jpg"
        ],[
            'img' => "images\jT0z06F7Tea14aVFGTgtxua8y5iIbyLBfiB04SWv.jpg"
        ],
        [
            'img' => 'images\zbo6Q66Z9M8GqFBPZI8jWeIwIahT3RHbPWYxO3ct.png'
        ]
        ];
        DB::table('uploads')->insert($img);
    }
}
