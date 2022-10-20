<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'product';

    public function category(){
        return $this->belongsTo('App\Models\Category','category_id', 'id');
    }

    public function purchasedetail(){
        return $this->hasMany('App\Models\Purchasedetail','product_id', 'id');
    }

    public function orderdetail(){
        return $this->hasMany('App\Models\Orderdetail','product_id', 'id');
    }
}

