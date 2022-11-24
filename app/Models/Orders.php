<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = [
        'user_id',
        'date',
        'total',
        'note',
        'payment',
        'status_id',
    ];
    public function status(){
        return $this->belongsTo('App\Models\Status','status_id', 'id');
    }
    public function orderdetails(){
        return $this->hasMany('App\Models\Orderdetail','order_id', 'id');
    }

    public function customer(){
        return $this->belongsTo('App\Models\User','user_id', 'id');
    }

    public function employee(){
        return $this->belongsTo('App\Models\User','employee_id', 'id');
    }

    public function products()
    {
        return $this->belongsToMany('App\Models\Product', 'orderdetail', 'order_id', 'product_id')
        ->withPivot('quantity','price');
    }

    public function users(){
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
