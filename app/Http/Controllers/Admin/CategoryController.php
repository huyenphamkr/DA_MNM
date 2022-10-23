<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::all();
        return view('admin.category.list',[
            'title'=>"Danh Sách Danh Mục Mới",
            'category'=>$category,
        ]);
    }

    public function store(Request $request)
    {    
        $this->validate($request,
        [
            'name'=> 'required|unique:Category,name',
            
        ],
        [
            'name.required' => 'Vui lòng nhập Tên Danh Mục',
            'name.unique' => 'Tên danh mục đã tồn tại',
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

    public function create()
    {
        return view('admin.category.add',[
            'title'=>'Thêm Danh Mục Mới'
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
    
    public function show($id)
    {
        $category = Category::find($id);
        return view('admin.category.edit',[
            'title'=>'Chỉnh Sửa Danh Mục: '.$category->name,
            'category'=>$category,
        ]);
    }

    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        $this->validate($request,
        [
            'name'=> 'required',
        ],
        [
            'name.required' => 'Vui lòng nhập tên danh mục',
        ]);
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        try{
            if($request->input('name') != $category->name 
            || $request->input('description') != $category->description
            || $request->input('active') != $category->active)
            {
                $category->name = (string) $request->input('name');
                $category->description = (string) $request->input('description');
                $category->active = (int) $request->input('active');
                $category->save();
                session()->flash('success', 'Cập nhật Danh Mục Thành Công');
            }
            else
            {
                session()->flash('error', 'Cập nhật Danh Mục Không Thành Công');
                return redirect('admin/category/edit/'.$id);
            }           
        }catch(\Exception $err){
            session()->flash('error', $err->getMessage());
        }
        return redirect('admin/category/list');

    }
}
