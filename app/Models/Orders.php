<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;
    protected $table = 'order';
    public function orderdetails(){
        return $this->hasMany('App\Models\Orderdetail','order_id', 'id');
    }

    public function users(){
        return $this->belongsTo('App\Models\User','user_id', 'id');
    }
}
