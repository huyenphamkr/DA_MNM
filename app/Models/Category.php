<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'category';
    protected $fillable = [
        'name',
        'description',
        'image',	
        'active',
    ];
    public function product(){
        return $this->hasMany('App\Models\Product','category_id', 'id');
    }

    public function scopeSearch($query)
    {
        if($key = request()->key)
        {
            $query = $query->where('name', 'like', '%'.$key.'%');
        }
        return $query;
    }
}
