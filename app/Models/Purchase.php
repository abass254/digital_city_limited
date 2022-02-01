<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    // 				status				

    protected $fillable = ['p_code','supplier','expected_arrival_date','sub_total','tax','total_amount'];
}
