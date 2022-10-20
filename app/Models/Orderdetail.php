<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orderdetail extends Model
{
    use HasFactory;
    protected $table = 'orderdetail';

    public function product(){
        return $this->belongsTo('App\Models\Product','product_id', 'id');
    }

    public function orders(){
        return $this->belongsTo('App\Models\Orders','order_id', 'id');
    }

    public function status(){
        return $this->belongsTo('App\Models\Status','status_id', 'id');
    }

}

