<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slide;
use Illuminate\Http\Request;

class SlideController extends Controller
{
    public function __construct()
    {
        date_default_timezone_set("Asia/Ho_Chi_Minh");
    }
   
    public function index()
    {
        $slides = Slide::orderByDesc('id')->paginate(5); //paginate(5);
        return view('admin.slide.list',[
            'title'=>'Danh Sách Slide',
            'slides'=>$slides,
        ]);
    }

    public function create()
    {
        return view('admin.slide.add',[
            'title'=>'Thêm Slide',
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request,
        [
            'name'=> 'required|unique:Slide,name',
            'fileimage' => 'required|image|mimes:jpg,jpeg,png',        
        ],
        [
            'name.required' => 'Vui lòng nhập tên slide',            
            'name.unique' => 'Tên slide đã tồn tại',
            'fileimage.required' => 'Vui lòng chọn file ảnh cho slide',
            'fileimage.image' => 'Vui lòng chọn file là file ảnh',
            'fileimage.mimes' => 'Vui lòng chọn file ảnh có đuôi png, jpg, jpeg',
        ]);
        try{
            $slide = new Slide;
            $slide->name = $request->name;
            $slide->description = (string) $request->input('description');
            $slide->link = (string) $request->input('link');
            $slide->active = (int) $request->input('active');
            if($request->hasFile('fileimage'))
            {
                $file = $request->file('fileimage');
                //ten file = time+tên file gốc
                $image = time().$file->getClientOriginalName();  
                $path = 'image/slide/'; 
                $file->move('image/slide/', $image);   
                $slide->image = $path.$image;
            }
            else
            {
                $slide->image = "";
            }
            $slide->save();
            session()->flash('success', 'Tạo slide Thành Công');
        }catch(\Exception $err){
            session()->flash('error', $err->getMessage());
        }
       return redirect('admin/slide/add');
    }

    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slide = Slide::find($id);
        return view('admin.slide.edit',[
            'title'=>'Chỉnh Sửa Slide: '.$slide->name,
            'slide'=>$slide,
        ]);
    }

    
    public function update(Request $request, $id)
    {
        $this->validate($request,
        [
            'name'=> 'required',
            'fileimage' => 'image|mimes:jpg,jpeg,png',        
        ],
        [
            'name.required' => 'Vui lòng nhập tên slide',   
            'fileimage.image' => 'Vui lòng chọn file là file ảnh',
            'fileimage.mimes' => 'Vui lòng chọn file ảnh có đuôi png, jpg, jpeg',
        ]);
        try{
            $slide = Slide::find($id);  
            $slide->name = $request->name;
            $slide->description = (string) $request->input('description');
            $slide->link = (string) $request->input('link');
            $slide->active = (int) $request->input('active');
            if($request->hasFile('fileimage'))
            {
                $file = $request->file('fileimage');
                //ten file = time+tên file gốc
                $image = time().$file->getClientOriginalName();  
                $path = 'image/slide/'; 
                unlink($slide->image); //Xóa ảnh cũ
                $file->move('image/slide/', $image);   
                $slide->image = $path.$image;
            }
            $slide->save();
            session()->flash('success', 'Cập nhật slide Thành Công');
        }catch(\Exception $err){
            session()->flash('error', $err->getMessage());
        }
       return redirect('admin/slide/list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $slide = Slide::find($id);
            Slide::where('id',$id)->delete();
            unlink($slide->image); //Xóa file ảnh
            session()->flash('success', 'Xóa Thành Công');
              
        }catch(\Exception $err){
            session()->flash('error', $err->getMessage());
        }
        return redirect('admin/slide/list');
    }
}
