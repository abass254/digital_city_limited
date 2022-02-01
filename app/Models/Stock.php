<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Store;

class Stock extends Model
{
    use HasFactory;


    protected $fillable = ['prod_id', 'store_id', 'qty', 'trans_id'];


    public function branch()
    {

        return $this->belongsTo(Store::class, 'store_id');
    }
}
