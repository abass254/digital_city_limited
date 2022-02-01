<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CashSaleDetail extends Model
{
    use HasFactory;

    protected $fillable = ['cash_id', 'prod_id', 'qty', 'tax', 'total_amount', 'price'];
}
