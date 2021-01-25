<?php

namespace App\ProductsModel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    public $timestamps = false;
    protected $fillable = array('id','sellerId','itemId','supplierId','name','long_description','short_description','weight','measurement','SRP','price','primary','primary_cat','image','status');
}
