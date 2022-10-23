<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function create()
    {
        return view('admin.category.add',[
            'title'=>"Thêm Danh Mục Mới"
        ]);
    }

    public function store(Request $request)
    {    
        $this->validate($request,
        [
            'name'=> 'required' ,
        ],
        [
            'name.required' => 'Vui lòng nhập Tên Danh Mục',
        ]);
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        try{
            Category::create([
                'name' => (string) $request->input('name'),
                'description' => (string) $request->input('description'),
                'active' => (int) $request->input('active')
            ]);
            session()->flash('success', 'Tạo Danh Mục Thành Công');
        }catch(\Exception $err){
            session()->flash('error', $err->getMessage());
        }
        return redirect('admin/category/add');
    }


    public function index()
    {
        $category = category::all();
        return view('admin.category.list',[
            'title'=>"Danh Sách Danh Mục Mới",
            'category'=>$category,
        ]);
    }

    public function destroy($id) 
    {
        try{
            Category::where('id',$id)->delete();
            session()->flash('success', 'Xóa Danh Mục Thành Công');
        }catch(\Exception $err){
            session()->flash('error', $err->getMessage());
        }
        return redirect('admin/category/list');
    }
}
