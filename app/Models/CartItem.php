<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;
     // Tên bảng (nếu bạn không muốn sử dụng quy tắc mặc định)
     protected $table = 'cart_items';
    protected $fillable = [
        'cart_id',
        'product_id',
        'quantity',
        'price',
    ];
    // Thiết lập mối quan hệ với bảng carts
    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    // Thiết lập mối quan hệ với bảng products
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
