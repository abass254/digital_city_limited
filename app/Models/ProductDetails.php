<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDetails extends Model
{
    use HasFactory;


    protected $fillable = ['name',	'code',	'image', 'category', 'description',	'buying_price',	'selling_price'	,'offer_quantity', 'offer_price', 'status'	,'wholesale_price'];
}
