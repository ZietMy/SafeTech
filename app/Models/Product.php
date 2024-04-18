<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    use HasFactory;
    
    
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id'); 
    }
    public function wishlists()
{
    return $this->hasMany(Wishlist::class);
}
    public function getAllProduct()
    {
        $product = DB::table('SELECT * FROM products ');
        return $product;
    }
    public function getRandom()
    {
        $products = Product::inRandomOrder()->limit(4)->get();
        return $products;
    }
    public function getFlashSale()
    {
        $products = DB::table('products')
            ->where('discount', '>', 10)
            ->get();
        foreach ($products as $product) {
            $discountAmount = $product->discount * $product->price / 100;
            $product->discounted_price = $product->price - $discountAmount;
        }
        return $products;
    }
    public function getDetailId($id)
    {
        $products = DB::table('products')
            ->where('id', $id)
            ->get();
        return $products;
    }
    public function getProductRelated($productId)
    {
        $productCategory = DB::table('products')
            ->where('id', $productId)
            ->value('category_id');
        $relatedProducts = DB::table('products')
            ->where('category_id', $productCategory)
            ->where('id', '!=', $productId)
            ->get();

        return $relatedProducts;
    }
    protected $fillable = ['category_id', 'other_fields'];

    public function category()
    {
        return $this->belongsTo(Categories::class, 'category_id');
    }
    public function getAllProductByCategories()
    {
        $products = DB::table('products')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->select('products.*', 'categories.name as category_name')
            ->orderBy('products.category_id')
            ->get();

        return $products;
    }
    // create
    public function create($data){
        DB::table('products')->insert([
            'name' => $data['name'],
            'price' => $data['price'],
            'quantity' => $data['quantity'],
            'details' => $data['details'],
            'category_id' => $data['category'],
            'image' => "https://down-vn.img.susercontent.com/file/vn-11134207-7r98o-lplmmc87lefvc0",
        ]);
    }
    public function updateProduct($data,$id){
        DB::table('products')
        ->where('id', $id)
        ->update([
            'name' => $data['name'],
            'price' => $data['price'],
            'discount'=>$data['discount'],
            'quantity' => $data['quantity'],
            'details' => $data['details'],
            'category_id' => $data['category'],
        ]);
    }
    public function deleteProduct($id)
    {
         // Kiểm tra xem có đơn hàng nào đang sử dụng sản phẩm này với status_id là 1 hoặc 2
    $orderItems = OrderItem::where('product_id', $id)
    ->whereIn('order_id', function ($query) {
        $query->select('id')
              ->from('orders')
              ->whereIn('status_id', [1, 2]);
        })
        ->exists();

    if ($orderItems) {
    return redirect()->back()->with('error','Không thể xóa sản phẩm. Sản phẩm đang có trong đơn hàng chưa hoàn thành.');
    };
    $cart = Cart::where('product_id', $id)->get();
    $wishlist = Wishlist::where('product_id', $id)->get();
    foreach ($cart as $cartItem) {
        $cartItem->delete();
    }

    foreach ($wishlist as $wishlistItem) {
        $wishlistItem->delete();
    }
        DB::table('products')->where('id', $id)->delete();
    }
}
