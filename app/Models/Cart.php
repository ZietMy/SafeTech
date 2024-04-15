<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable =['quantity_purchase', 'user_id', 'product_id'];
    public function user(){
        return $this->belongsTo(Users::class);
    }
    public function product(){
        return $this->belongsTo(Product::class);
    }
}