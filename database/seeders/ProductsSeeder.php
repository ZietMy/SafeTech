<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            [
                'name' => 'Mũ A',
                'price' => 100.00,
                'quantity' => 20,
                'details' => 'This is a product description',
                'image' => 'https://img.lazcdn.com/g/p/47f225c73fcaca577b8fa310788bf0c9.jpg_720x720q80.jpg',
                'category_id' => 1,
                'discount' => 10,
                'discounted_price' => 0,
            ],
            [
                'name' => 'Mũ đẹp trai',
                'price' => 100.00,
                'quantity' => 20,
                'details' => 'This is a product description',
                'image' => 'https://static.hotdeal.vn/images/846/846187/500x500/199314-mu-bao-hiem-tem-bong-co-kinh-truoc-thuong-hieu-nhu-y-199295-vn-2-3.jpg',
                'category_id' => 2,
                'discount' => 0,
                'discounted_price' => 0,
            ],
            [
                'name' => 'Mũ xinh gái',
                'price' => 100.00,
                'quantity' => 40,
                'details' => 'This is a product description',
                'image' => 'https://vn-test-11.slatic.net/p/ef6167cb9e02cd8b8e77845ef99d93cd.jpg',
                'category_id' => 3,
                'discount' => 0,
                'discounted_price' => 0,
            ],
            [
                'name' => 'Mũ len đẹp',
                'price' => 100.00,
                'quantity' => 20,
                'details' => 'This is a product description',
                'image' => 'https://sg-test-11.slatic.net/p/83a33f0018c04c8b993579b61e9b3e03.jpg',
                'category_id' => 1,
                'discount' => 20,
                'discounted_price' => 0,
            ],
            [
                'name' => 'Mũ Bảo hiểm',
                'price' => 100.00,
                'quantity' => 20,
                'details' => 'Mũ Bảo hiểm đẹp',
                'image' => 'https://gro.com.vn/wp-content/uploads/gro-nua-dau-1.jpg',
                'category_id' => 1,
                'discount' => 20,
                'discounted_price' => 0,
            ],
            [
                'name' => 'Mũ lưỡi trai',
                'price' => 20.00,
                'quantity' => 10,
                'details' => 'MÃ SẢN PHẨM SKU : D-HAT05-K LOẠI SẢN PHẨM : PHỤ KIỆN NAM LOCAL BRAND',
                'image' => 'https://bizweb.dktcdn.net/100/287/440/products/mu-luoi-trai-local-brand-dep-mau-be-1.jpg?v=1644822065327',
                'category_id' => 3,
                'discount' => 20,
                'discounted_price' => 0,
            ],
            [
                'name' => 'Mũ nón lưỡi trai trẻ em size lớn & bố mẹ',
                'price' => 30.00,
                'quantity' => 30,
                'details' => 'Mũ nón trẻ em xuất khẩu hàng đẹp xịn sò, từ từng mũi thêu logo đến khoá tăng đơ, và đường may lót bên trong nón',
                'image' => 'https://bizweb.dktcdn.net/100/032/149/products/mu-non-cho-be-trai-xuat-khau-tphcm-9893243.jpg?v=1639060554107',
                'category_id' => 3,
                'discount' => 10,
                'discounted_price' => 0,
            ],
            [
                'name' => 'Mũ len dày dặn giữ ấm chống lạnh',
                'price' => 50.00,
                'quantity' => 15,
                'details' => 'Mũ len dày dặn giữ ấm chống lạnh chống gió thời trang mùa đông cho nam SizX',
                'image' => 'https://img.ws.mms.shopee.vn/579c71718241ebe4589f780db9ae02c2',
                'category_id' => 1,
                'discount' => 50,
                'discounted_price' => 0,
            ],
        ];
        DB::table('products')->insert($products);
    }
}
