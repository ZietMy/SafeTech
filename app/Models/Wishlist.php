<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Wishlist extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'product_id'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    // protected $table = 'wishlist';
    // public function wishList($data)
    // {
    //     DB::table('wishlist')->insert($data);
    //     $wishlistItems = DB::table('wishlist')->latest()->get();
    //     return $wishlistItems;
    // }
    // public function getWishList($id)
    // {
    //     $wishlist = DB::table('wishlist')
    //         ->join('products', 'wishlist.product_id', '=', 'products.id')
    //         ->where('wishlist.user_id', $id)
    //         ->select('wishlist.id', 'products.name', 'products.price', 'products.image')
    //         ->get();

    //     return $wishlist;
    // }
    // public function getWishListDetails($id) 
    // {
    //     $wishlist = DB::table('wishlist')->where('id', $id)->first();
    //     return $wishlist;
    // }
    // public function deleteWishList($id) {
    //     return DB::delete('DELETE FROM '.$this->table.' WHERE id = ?', [$id]);
    // }
}
