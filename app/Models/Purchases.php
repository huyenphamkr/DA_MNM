<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchases extends Model
{
    use HasFactory;
    protected $table = 'purchases';
    public function purchasedetail(){
        return $this->hasMany('App\Models\Purchasedetail','purchase_id', 'id');
    }

    public function supplier(){
        return $this->belongsTo('App\Models\Supplier','supplier_id', 'id');
    }

    public function user(){
        return $this->belongsTo('App\Models\User','user_id', 'id');
    }

}
