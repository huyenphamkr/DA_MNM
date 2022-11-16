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

    public function orders()
    {
        return $this->belongsToMany('App\Models\Orders','orderdetail', 'order_id', 'product_id')
        ->withPivot('quantity','price');
    }


    public function scopeSearch($query)
    {
        if($key = request()->key)
        {
            $query = $query->where('name', 'like', '%'.$key.'%')
            ->orwhere('id', 'like', '%'.$key.'%')
            ->orwhere('description', 'like', '%'.$key.'%')            
            ->orwhere('updated_at', 'like', '%'.$key.'%')            
            ->orwhere('active', 'like', '%'.$key.'%')
            ->orwhere('price', 'like', '%'.$key.'%')
            ->orwhere('amount', 'like', '%'.$key.'%')
            ->orwhere('category_id', 'like', '%'.$key.'%');
        }
        return $query;
    }
    public function scopeSearchIdName($query)
    {
        if($key = request()->key)
        {
            $query = $query->where('name', 'like', '%'.$key.'%')
            ->orwhere('id', 'like', '%'.$key.'%');
        }
        return $query;
    }
}

