<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WagerTransaction extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'wager_id',
        'buying_price',
        'bought_at'
    ];
}
