<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchases extends Model
{
    use HasFactory;
    protected $table = 'purchases';
    public function products()
    {
        return $this->belongsToMany('App\Models\Product', 'purchasedetail', 'purchase_id', 'product_id')
        ->withPivot('quantity','price');
    }

    public function supplier(){
        return $this->belongsTo('App\Models\Supplier','supplier_id', 'id');
    }

    public function user(){
        return $this->belongsTo('App\Models\User','user_id', 'id');
    }

    public function scopeSearch($query)
    {
        if($key = request()->key)
        {
            $query = $query->where('id', 'like', '%'.$key.'%');
        }
        return $query;
    }

}
