<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    protected $table = "product_list";
    //Eloquent會假設model的名稱就是資料表的名稱
    //舉例 : Eloquent 將預設Flight模型將記錄存儲在flights表中，
    //不想要預設可以用上面的方式自己指定model要對應的資料表
    protected $fillable = [
        'book_no',
        'book_name',
        'price',
    ];
    protected $guarded = [];
    protected $hidden = [];
    protected $nullable = [];
    protected $default = [];
    public function cartItems()
    {
        return $this->hasMany(CartItems::class);
    }
}
