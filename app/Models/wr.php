<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class wr extends Model
{
    use HasFactory;
    protected $table = 'wr';
    protected $fillable = [
        'dstrc_ori',
        'creation_date',
        'authsd_date',
        'wo_desc',
        'acuan_plan_service',
        'componen_desc',
        'egi',
        'egi_eng',
        'equip_no',
        'plant_process',
        'plant_activity',
        'wr_no',
        'wr_item',
        'qty_req',
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
        'notes',
        'eta',
        'status'
    ];
}
