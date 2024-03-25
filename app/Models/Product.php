<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    use HasFactory;
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
}
