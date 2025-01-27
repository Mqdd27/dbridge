<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class stockcode extends Model
{
    use HasFactory;
    protected $table = 'stock_code';
    protected $fillable = [
        'stock_code',
        'mnemonic',
        'part_number',
        'pn_global',
        'item_name',
        'stock_type_district',
        'class',
        'home_wh',
        'uoi',
        'issuing_price',
        'price_code',
    ];
}
