<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseDetail extends Model
{
    use HasFactory;

    //			unit_price

    protected $fillable = ['purchase_id','item_id','quantity','unit_price'];
}
