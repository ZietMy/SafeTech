<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $contact = [
        [
            'name' => 'Võ Thị Vân Thư',
            'email' => 'thu@gmail.com',
            'phone' => '0495938432',
            'message' => 'Tôi thấy trang web rất hay',
            'status_id' => '1'
        ],
        [
            'name' => 'Trần Thị Việt Mỹ',
            'email' => 'Mytran@gmail.com',
            'phone' => '0495938432',
            'message' => 'Tôi thấy oki',
            'status_id' => '1'
        ],
        [
            'name' => 'Phạm Thị Hỉ',
            'email' => 'hitran@gmail.com',
            'phone' => '0495938432',
            'message' => 'Làm sao tôi có thể liên hệ',
            'status_id' => '2' 
        ]
        ];
        DB::table('contact')->insert($contact);
    }
}
