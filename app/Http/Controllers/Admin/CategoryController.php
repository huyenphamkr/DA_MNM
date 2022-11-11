<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function __construct()
    {
        date_default_timezone_set("Asia/Ho_Chi_Minh");
    }
    public function index()
    {
        $categories = Category::orderByDesc('id')->Search()->paginate(5);
        return view('admin.category.list',[
            'title'=>"Danh Sách Danh Mục Mới",
            'categories'=>$categories,
        ]);
    }

    public function store(Request $request)
    {    
        $this->validate($request,
        [
            'name'=> 'required|unique:Category,name',    
            'fileimage' => 'required|image|mimes:jpg,jpeg,png',               
        ],
        [
            'name.required' => 'Vui lòng nhập Tên Danh Mục',
            'name.unique' => 'Tên danh mục đã tồn tại',
            'fileimage.required' => 'Vui lòng chọn file ảnh cho danh mục',
            'fileimage.image' => 'Vui lòng chọn file là file ảnh',
            'fileimage.mimes' => 'Vui lòng chọn file ảnh có đuôi png, jpg, jpeg',
        ]);
        try{
            $category = new Category();
            $category->name = (string) $request->input('name');
            $category->description = (string) $request->input('description');
            $category->active = (int) $request->input('active');           
          
            if($request->hasFile('fileimage'))
            {
                $file = $request->file('fileimage');
                //ten file = time+tên file gốc
                $image = time().$file->getClientOriginalName();  
                $path = 'image/category/'; 
                $file->move('image/category/', $image);   
                $category->image = $path.$image;
            }
            else{
                $category->image = "image/empty.jpg";
            }
            $category->save();
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
            //Lấy category có id = $id
            $category = Category::find($id);
            //đếm product có id_category = $id
            $count = $category->product->count();
            ///session()->flash('success', $count);
            if($count != 0)
            {
                session()->flash('error', 'Danh Mục đang được sử dụng. Xóa không thành công');                
            }
            else{
                Category::where('id',$id)->delete();
                session()->flash('success', 'Xóa Danh Mục Thành Công');
            }      
        }catch(\Exception $err){
            session()->flash('error', $err->getMessage());
        }
        return redirect('admin/category/list');
    }
    
    public function show($id)
    {
        //xem chi tiết
    }

    public function edit($id)
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
            'fileimage' => 'image|mimes:jpg,jpeg,png',        
        ],
        [
            'name.required' => 'Vui lòng nhập tên danh mục',
            'fileimage.image' => 'Vui lòng chọn file là file ảnh',
            'fileimage.mimes' => 'Vui lòng chọn file ảnh có đuôi png, jpg, jpeg',
        ]);
        try{
            $category->name = (string) $request->input('name');
            $category->description = (string) $request->input('description');
            $category->active = (int) $request->input('active');
            if($request->hasFile('fileimage'))
            {
                $file = $request->file('fileimage');  
                $image = time().$file->getClientOriginalName(); // tên file = time+ten file gốc
                $path = 'image/category/';
                unlink($category->image); //Xóa ảnh cũ
                $file->move('image/category/', $image);
                $category->image = $path.$image;
            }
            $category->save();
            session()->flash('success', 'Cập nhật Danh Mục Thành Công');        
        }catch(\Exception $err){
            session()->flash('error', $err->getMessage());
        }
        return redirect('admin/category/list');
    }
}
