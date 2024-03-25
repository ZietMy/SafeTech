<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WishListController extends Controller
{
    private $wishlist;
    public function __construct()
    {
        $this->wishlist = new Wishlist();
    }
    public function wishList()
    {
        $userId = auth()->id();
        $wishlist =  $this->wishlist->getWishList($userId);
        $wishlistItems = $this->wishlist::all();
        $title = "Wish list";
        return view('clients.wishlist', compact('title', 'wishlistItems', 'wishlist'));
    }
    public function addWishList(Request $request)
    {
        $userId = auth()->id();
        $productId = $request->input('product_id');
        $existingWishlistItem = Wishlist::where('user_id', $userId)
            ->where('product_id', $productId)
            ->first();
        if (!$existingWishlistItem && !empty($productId)) {
            $wishlist = new Wishlist();
            $wishlist->user_id = $userId;
            $wishlist->product_id = $productId;
            $wishlist->save();
        }
        return redirect()->route('wishlist');
    }
    public function deleteWishList($id = 0)
    {
        if (!empty($id)) {
            $this->wishlist->getWishListDetails($id);
            $this->wishlist->deleteWishList($id);
            return redirect()->route('wishlist');
        }
    }
}
