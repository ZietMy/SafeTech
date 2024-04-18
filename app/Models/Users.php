<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Users extends Model
{
    protected $table = 'users';
    use HasFactory;
    public function order()
    {
        return $this->hasMany(Order::class,'user_id');
    }
    public function wishlists()
{
    return $this->hasMany(Wishlist::class);
}
    public function getAllUser()
    {
        $users = DB::select('select * from users ');
        return $users;
    }
    public function getDetail($id){
        return DB::select('select * from '.$this->table.' where id = ?', [$id]);
    }
    public function updateUser($data, $id)
{
    return DB::table('users')
        ->where('id', $id)
        ->update([
            'name' => $data['name'],
            'status_id' => $data['status_id'],
            // 'status_name' => $data['status_name'],
            'gender' => $data['gender'],
            'email' => $data['email']
        ]);
}
    public function deleteUser($id)
    {
        $order = Order::where('user_id', $id)->get();
    $cart = Cart::where('user_id', $id)->get();
    $wishlist = Wishlist::where('user_id', $id)->get();

    foreach ($order as $orderItem) {
        // Kiểm tra nếu đơn hàng đang giao hoặc đơn hàng mới thì không cho hủy
        if ($orderItem->status_id == 1 || $orderItem->status_id ==2) {
            return "Không thể hủy tài khoản. Đơn hàng đang giao hoặc đơn hàng mới.";
        }
        
    }
    foreach ($order as $orderItem) {
        // Nếu không, xóa đơn hàng
        $orderItem->delete();
        
    }

    foreach ($cart as $cartItem) {
        $cartItem->delete();
    }

    foreach ($wishlist as $wishlistItem) {
        $wishlistItem->delete();
    }

        return DB::table($this->table)
                ->where('id', $id)
                ->delete();
    }
    

    
}
