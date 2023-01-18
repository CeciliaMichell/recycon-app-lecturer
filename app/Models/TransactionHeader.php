<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class TransactionHeader extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id'
    ];

    public function detail()
    {
        return $this->hasMany(TransactionDetail::class,'transaction_header_id','id');
    }

    public function getCreatedAtAttribute($date)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d');
    }
}
