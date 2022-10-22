<?php

namespace App\Http\Services\Category;

use App\Models\Category;

class CategoryService
{
    public function create($request)
    {
        try{
            Category::create([
                'name' => (string) $request->input('name'),
                'description' => (string) $request->input('description'),
                'active' => (int) $request->input('active'),
            ]);
            session()->flash('success', 'Tạo Danh Mục Thành Công');
        }catch(\Exception $err){
            session()->flash('error', $err->getMessage());
            return false;
        }
        return true;
    
    }
}