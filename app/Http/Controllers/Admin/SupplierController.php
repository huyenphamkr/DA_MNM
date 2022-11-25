<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Supplier;

class SupplierController extends Controller
{
    public function __construct()
    {
        date_default_timezone_set("Asia/Ho_Chi_Minh");
    }
    public function index()
    {
        $suppliers = Supplier::orderByDesc('id')->Search()->paginate(5);
        return view('admin.supplier.list',[
            'title'=>"Danh Sách Nhà Cung Cấp",
            'suppliers'=>$suppliers,
        ]);
    }

    public function store(Request $request)
    {    
        $this->validate($request,
        [
            'name'=> 'required|unique:Supplier,name', 
            'address'=> 'required',
            'phone_number'=> 'required',

        ],
        [
            'name.required' => 'Vui lòng nhập tên Nhà Cung Cấp',
            'name.unique' => 'Tên Nhà Cung Cấp đã tồn tại',
            'address.required' => 'Vui lòng nhập địa chỉ',
            'phone_number.required' => 'Vui lòng nhập sđt',
        ]);
        try{
            $supplier = new Supplier();
            $supplier->name = $request->name;
            $supplier->address = (string) $request->input('address');
            $supplier->phone_number =  (string) $request->input('phone_number');
            $supplier->active = (int) $request->input('active');
            $supplier->save();
            // Supplier::create([
            //     'name' => (string) $request->input('name'),
            //     'address' => (string) $request->input('address'),
            //     'phone_number' => (string) $request->input('phone_number'),
            //     'active' => (int) $request->input('active')
            // ]);
            session()->flash('success', 'Tạo Nhà Cung Cấp Thành Công');
        }catch(\Exception $err){
            session()->flash('error', $err->getMessage());
        }
        return redirect('admin/supplier/add');
    }

    public function create()
    {
        return view('admin.supplier.add',[
            'title'=>'Thêm Nhà Cung Cấp Mới'
        ]);
    }

    public function destroy($id)
    {
        try{
            //Lấy supplier có id = $id
            $supplier = Supplier::find($id);
            // print_r($supplier);
            //đếm product có id_supplier = $id
            $count = $supplier->purchase->count();
            if($count != 0)
            {
                session()->flash('error', 'Nhà Cung Cấp đang được sử dụng. Xóa không thành công');                
            }
            else{
                Supplier::where('id',$id)->delete();
                session()->flash('success', 'Xóa Nhà Cung Cấp Thành Công');
            }      
        }catch(\Exception $err){
            session()->flash('error', $err->getMessage());
        }
        return redirect('admin/supplier/list');//
    }
    
    public function show($id)
    {
        //xem chi tiết
    }

    public function edit($id)
    {
        $supplier = Supplier::find($id);
        return view('admin.supplier.edit',[
            'title'=>'Chỉnh Sửa Nhà Cung Cấp: '.$supplier->name,
            'supplier'=>$supplier,
        ]);
    }
    
    public function update(Request $request, $id)
    {
        $supplier = Supplier::find($id);
        $this->validate($request,
        [
            'name'=> 'required',
            'address' => 'required',
            'phone_number'=> 'required',

        ],
        [
            'name.required' => 'Vui lòng nhập tên nhà cung cấp',
            'address.required' => 'Vui lòng nhập địa chỉ',
            'phone_number.required' => 'Vui lòng nhập sđt',
        ]);
        try{
            $supplier->name = (string) $request->input('name');
            $supplier->address = (string) $request->input('address');
            $supplier->phone_number = (string) $request->input('phone_number');
            $supplier->active = (int) $request->input('active');
            $supplier->save();
            session()->flash('success', 'Cập nhật Nhà Cung Cấp Thành Công');        
        }catch(\Exception $err){
            session()->flash('error', $err->getMessage());
        }
        return redirect('admin/supplier/list');

    }
}
