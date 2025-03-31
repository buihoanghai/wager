<?php

namespace App;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wager extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'total_wager_value',
        'odds',
        'selling_percentage',
        'selling_price',
        'current_selling_price'
    ];
}
