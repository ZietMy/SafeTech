<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WishListController extends Controller
{
    // private $wishlist;
    // public function __construct()
    // {
    //     $this->wishlist = new Wishlist();
    // }
    public function getAllWishList()
    {
        $userId = auth()->id();
        $title = "Wish list";
        $wishlists = Wishlist::where('user_id', $userId)->get();
        return view('clients.wishlist', compact('title','wishlists'));
    }
    public function addWishList(Request $request)
    {
        $userId = auth()->id();
        $productId = $request->product_id;

        $wishlist = Wishlist::where('user_id', $userId)
                        ->where('product_id', $productId)
                        ->first();

        if (!$wishlist) {
            Wishlist::create([
                'user_id' => $userId,
                'product_id' => $productId
            ]);
        } else {
            $wishlist->delete();
        }
        return redirect()->back();
    }
    public function deleteWishList($idWishList)
    {
        $wishlist = Wishlist::find($idWishList);

        if ($wishlist) {
            $wishlist->delete();
            return redirect()->back();
        }

        return redirect()->back()->with('error','Wishlist not found');
    }
    public function isProductInWishlist($productId)
    {
        $userId = auth()->id();
        $wishlist = Wishlist::where('user_id', $userId)
                            ->where('product_id', $productId)
                            ->first();

        return $wishlist ? true : false;
    }
}
