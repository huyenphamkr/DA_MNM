<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;
    protected $table = 'supplier';
    public function purchase(){
        return $this->hasMany('App\Models\Purchases','supplier_id', 'id');
    }
    public function scopeSearch($query)
    {
        if($key = request()->key)
        {
            $query = $query->where('name', 'like', '%'.$key.'%')->orwhere('id', 'like', '%'.$key.'%');
        }
        return $query;
    }
}
