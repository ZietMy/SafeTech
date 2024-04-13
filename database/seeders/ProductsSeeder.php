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
                'name' => 'Mũ Đạt Đỉnh Nữ',
                'price' => 50.00,
                'quantity' => 15,
                'details' => 'Siêu phẩm mũ 2 tai cực hót chất bao đẹp chất lượng hình ảnh mũ cực hót',
                'image' => 'https://down-vn.img.susercontent.com/file/sg-11134201-22110-qax5wakdrzjv3a',
                'category_id' => 1,
                'discount' => 50,
                'discounted_price' => 0,
            ],
            [
                'name' => 'Siêu phẩm mũ 2 tai ',
                'price' => 50.00,
                'quantity' => 15,
                'details' => 'Phù hợp để đi dạo phố, đi #Đà Lạt, #Sapa và các thành phố mát mẻ khác. Sản phẩm đảm bảo chất lượng cao, được kiểm tra kỹ trước khi giao hàng đến bạn. Kiểu dáng đơn giản, nhẹ nhàng lại ôm lấy đầu, màu sắc tươi tắn đa dạng với mức giá phù hợp rẻ nhất thị trường.',
                'image' => 'https://down-vn.img.susercontent.com/file/3525e0ffa134075b2da92f548cc2c43f',
                'category_id' => 1,
                'discount' => 50,
                'discounted_price' => 0,
            ],
            [
                'name' => 'Mũ len beanie ',
                'price' => 50.00,
                'quantity' => 15,
                'details' => 'Mũ len dày dặn giữ ấm chống lạnh chống gió thời trang mùa đông cho nam SizX',
                'image' => 'https://down-vn.img.susercontent.com/file/sg-11134201-22110-164t3ly24ojv9f',
                'category_id' => 1,
                'discount' => 50,
                'discounted_price' => 0,
            ],
            [
                'name' => 'Mũ Lưỡi Trai',
                'price' => 500.00,
                'quantity' => 15,
                'details' => 'Mũ Lưỡi Trai Phối Lưới Phong Cách Thể Thao Thời Trang Mùa Hè Cho Nam Mới',
                'image' => 'https://vietnamleather.com/wp-content/uploads/2020/04/mu-luoi-trai-DAI-DIEN.jpg',
                'category_id' => 3,
                'discount' => 50,
                'discounted_price' => 0,
            ],
            [
                'name' => 'Mũ Bóng Chày',
                'price' => 150.00,
                'quantity' => 15,
                'details' => 'Unisex Nhanh Khô Lưới Có Thể Điều Chỉnh Mũ Bóng Chày Thoáng Khí Mùa Xuân Hè Du Lịch Ngoài Trời Cho Nam Nữ',
                'image' => 'https://gocphukien.com/wp-content/uploads/2020/04/mu-luoi-trai-nam-bui-bam-1.jpg',
                'category_id' => 3,
                'discount' => 20,
                'discounted_price' => 0,
            ],
            [
                'name' => 'Mũ Bóng Chày Trucker',
                'price' => 150.00,
                'quantity' => 15,
                'details' => 'Unisex Graffiti Có Thể Điều Chỉnh Hip Hop Mũ Bóng Chày Trucker Cap 4 Mùa Du Lịch Ngoài Trời Cho Nữ',
                'image' => 'https://www.chapi.vn/img/product/2020/2/6/mu-luoi-trai-nam-design-6-new.jpg',
                'category_id' => 3,
                'discount' => 20,
                'discounted_price' => 10,
            ],
            [
                'name' => 'Mũ Len Dệt ',
                'price' => 50.00,
                'quantity' => 15,
                'details' => 'Mũ Len Dệt Kim Hình Hoa Cúc Phong Cách Hàn Quốc Xinh Xắn Cho Nữ',
                'image' => 'https://down-vn.img.susercontent.com/file/sg-11134201-7rbk2-lmfzvei1frkq6b',
                'category_id' => 1,
                'discount' => 10,
                'discounted_price' => 0,
            ],
            [
                'name' => 'Mũ Bảo Hiểm',
                'price' => 100.00,
                'quantity' => 15,
                'details' => '[HÀNG LOẠI 1] Mũ Bảo Hiểm Nửa Đầu Thú ABS - Dâu tây - Dưa Hấu - Mũ bảo hiểm trái cây - Bảo hành 12 tháng',
                'image' => 'https://down-vn.img.susercontent.com/file/c538a9e6ce92eff1ab8dcd8674e20e07',
                'category_id' => 2,
                'discount' => 20,
                'discounted_price' => 0,
            ],
            [
                'name' => 'Mũ bảo hiểm',
                'price' => 70.00,
                'quantity' => 15,
                'details' => 'Mũ bảo hiểm nửa đầu kính phi công kèm phụ kiện tai mèo 2 màu bông hoa , nón bảo hiểm kính phi công HTP chính hãng',
                'image' => 'https://down-vn.img.susercontent.com/file/vn-11134207-7r98o-lnig4f4qh2wdcd',
                'category_id' => 2,
                'discount' => 10,
                'discounted_price' => 0,
            ],
            [
                'name' => 'Mũ bảo hiểm',
                'price' => 100.00,
                'quantity' => 15,
                'details' => 'Mũ bảo hiểm nửa đầu 1/2 kính phi công kèm tai, bông hoa trứng cute - Hàng chính hãng, cao cấp - Combo 4 sản phẩm',
                'image' => 'https://down-vn.img.susercontent.com/file/vn-11134207-7r98o-ltgyd3igs1zec0',
                'category_id' => 2,
                'discount' => 50,
                'discounted_price' => 0,
            ],
            [
                'name' => 'Mũ bảo hiểm',
                'price' => 100.00,
                'quantity' => 15,
                'details' => 'Mũ bảo hiểm người nhện 3d trẻ em nhẹ có thông hơi thoáng mát',
                'image' => 'https://down-vn.img.susercontent.com/file/vn-11134207-7r98o-lplmmc87lefvc0',
                'category_id' => 2,
                'discount' => 50,
                'discounted_price' => 0,
            ],

        ];
        DB::table('products')->insert($products);
    }
}
