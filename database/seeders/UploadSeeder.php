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
            'img' => "images\MrIiGWQrWTH5SzgaI3f0gXX19oD0vRodZ1rt1AuS.jpg"
        ],[
            'img' => "images\HkxgiT48Scxw9zsJ6HDPkA7LGL49t3uDk4RsuLus.webp"
        ],
        [
            'img' => 'images\FqnOdtcY46ikQI9i1SoyABxtKhMtFVpbeHLRoUnj.jpg'
        ]
        ];
        DB::table('uploads')->insert($img);
    }
}
