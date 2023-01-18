<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'transaction_header_id',
        'product_id',
        'quantity'
    ];

    public $timestamps = false;

    public function product()
    {
        return $this->hasOne(Product::class,'product_id','product_id');
    }
}
