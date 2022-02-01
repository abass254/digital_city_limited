<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CashSale extends Model
{
    use HasFactory;

    protected $fillable = ['trans_id', 'net_tax', 'gross_amount', 'amount_paid', 'returning_change', 'code'];


}
