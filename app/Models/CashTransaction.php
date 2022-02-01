<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CashTransaction extends Model
{
    use HasFactory;

    //id							created_at	updated_at
    
    protected $fillable = ['t_no','t_date','t_description','t_debit','t_credit','t_balance'];

}
