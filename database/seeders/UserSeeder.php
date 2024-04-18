<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users=[
            [
                'role_id' => 2,
                'role_name' => 'Admin',
                'status_id' => 1,
                'status_name' => "Enable", // Thêm giá trị cho status_name
                'name' => 'Admin',
                'avatar' => 'https://i.pinimg.com/474x/3d/b7/9e/3db79e59b9052890ea1ffbef0f3970cc.jpg',
                'email' => 'admin123@gmail.com',
                'gender' => null,
                'address'=>null,
                'phone_number' => null,
                'password' => Hash::make('admin123'),
            ],
            [
                'role_id' => 1,
                'role_name'=>'User',
                'status_id'=>1,
                'status_name'=> "Enable",
                'name'=> 'Việt Mỹ',
                'avatar'=>'https://i.pinimg.com/474x/3d/b7/9e/3db79e59b9052890ea1ffbef0f3970cc.jpg',
                'email'=>'vietmy123@gmail.com',
                'address'=>'Đà Nẵng',
                'gender'=>'femail',
                'phone_number'=>'0999111111',
                'password'=>Hash::make('vietmy123'),
            ],
            [
                'role_id' => 1,
                'role_name'=>'User',
                'status_id'=>1,
                'status_name'=>" Enable",
                'name'=> 'Phạm Thị Hỉ',
                'avatar'=>'https://i.pinimg.com/474x/3d/b7/9e/3db79e59b9052890ea1ffbef0f3970cc.jpg',
                'email'=>'phamhi123@gmail.com',
                'address'=>'Đà Nẵng',
                'gender'=>'femail',
                'phone_number'=>'0999222222',
                'password'=>Hash::make('phamhi123'),
            ],
            [
                'role_id' => 1,
                'role_name'=>'User',
                'status_id'=>1,
                'status_name'=>" Enable",
                'name'=> 'Vân Thư',
                'avatar'=>'https://i.pinimg.com/474x/3d/b7/9e/3db79e59b9052890ea1ffbef0f3970cc.jpg',
                'email'=>'vanthu123@gmail.com',
                'address'=>'Bình Định',
                'gender'=>'femail',
                'phone_number'=>'0999111112',
                'password'=>Hash::make('vanthu123'),
            ]
        ];
        DB::table('users')->insert($users);
    }
}
