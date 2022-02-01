<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Stock;

class Store extends Model
{
    use HasFactory;

    protected $fillable = ['store_name'];


    public function stock()
    {
        return $this->hasMany(Stock::class);
    }



}
