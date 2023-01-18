<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public $timestamps = false;


    protected $fillable = [
        'product_id',
        'name',
        'price',
        'description',
        'image',
        'category_id'
    ];

    public function category()
    {
        return $this->hasOne(Category::class,'id','category_id');
    }
}
