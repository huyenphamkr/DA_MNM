<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchasedetail extends Model
{
    use HasFactory;
    protected $table = 'purchasedetail';
    public function product(){
        return $this->belongsTo('App\Models\Product','product_id', 'id');
    }

    public function purchase(){
        return $this->belongsTo('App\Models\Purchases','purchase_id', 'id');
    }
}
