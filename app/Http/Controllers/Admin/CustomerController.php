<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function __construct()
    {
        date_default_timezone_set("Asia/Ho_Chi_Minh");
    }
    public function index()
    {
        
        $users = User::where('role_id',3)->get();
        return view('admin.customer.list',[
            'title'=>"Danh Sách Khách Hàng",
            'users'=>$users,
        ]);
    }

    public function store(Request $request)
    {    
        $this->validate($request,
        [
            'name'=> 'required',
            'email' => 'required|unique:Users,email',
            'role' => 'required', 
            'password' => 'required_with:password_confirmation|same:password_confirmation','min:8',
            'address' => 'required',
            'phone_number' => 'required','min:10',
            'gender' => 'required',           
        ],
        [
            'name.required' => 'Vui lòng nhập tên Người Dùng',
            'email.required' => 'Vui lòng nhập email',
            'role.required' => 'Vui lòng chọn quyền',
            'address.required' => 'Vui lòng nhập địa chỉ',
            'phone_number.required' => 'Vui lòng nhập sđt',
            'gender.required' => 'Vui lòng nhập giới tính',			
            'password.required_with' => 'Vui lòng nhập password',     
            'password.min' => 'Mật khẩu phải chứa ít nhất 8 ký tự',
            'password.same' => 'Mật khẩu không chính xác',
            'phone_number.min' => 'Số điện thoại không đúng'
        ]);
        try{
            User::create([
                'name' => (string) $request->input('name'),
                'email' => (string) $request->input('email'),
                'role_id' => 3,
                'password' => (string) $request->input('password'),
                'address' => (string) $request->input('address'),
                'phone_number' => (string) $request->input('phone_number'),
                'gender' => (string) $request->input('gender'),
                'active' => (int) $request->input('active')
            ]);
            session()->flash('success', 'Tạo Người Dùng mới thành công');
        }catch(\Exception $err){
            session()->flash('error', $err->getMessage());
        }
        return redirect('admin/customer/add');
    }

    public function create()
    {
        $roles = Role::where('id', 3)->get();
        return view('admin.customer.add',[
            'title'=>'Thêm Người Dùng Mới',
            'roles'=>$roles,            
        ]);
    }

    // public function destroy($id)
    // {
    //     try{
    //         //Lấy user có id = $id
    //         $user = user::find($id);
    //         //đếm product có id_user = $id
    //         $count = $user->product->count();
    //         ///session()->flash('success', $count);
    //         if($count != 0)
    //         {
    //             session()->flash('error', 'Người dùng đang được sử dụng. Xóa không thành công');                
    //         }
    //         else{
    //             user::where('id',$id)->delete();
    //             session()->flash('success', 'Xóa Người dùng Thành Công');
    //         }      
    //     }catch(\Exception $err){
    //         session()->flash('error', $err->getMessage());
    //     }
    //     return redirect('admin/account/list');
    // }
    
    public function show($id)
    {
        //xem chi tiết
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.customer.edit',[
            'title'=>'Chỉnh Sửa Người Dùng: '.$user->name,
            'user'=>$user,
        ]);
    }
    
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $this->validate($request,
        [
            'name'=> 'required',
            'email' => 'required',
            'role' => 'required', 
            'address' => 'required',
            'phone_number' => 'required',
            'gender' => 'required',   
        ],
        [
            'name.required' => 'Vui lòng nhập tên người dùng',
            'email.required' => 'Vui lòng nhập email',
            'role_id.required' => 'Vui lòng nhập quyền',
            'address.required' => 'Vui lòng nhập địa chỉ',
            'phone_number.required' => 'Vui lòng nhập sđt',
            'gender.required' => 'Vui lòng nhập giới tính',
        ]);
        try{
            $user->name = (string) $request->input('name');
            $user->email = (string) $request->input('email');
            $user->role_id = (int) $request->input('role');
            $user->password = (string) $request->input('password');
            $user->address = (string) $request->input('address');
            $user->phone_number = (string) $request->input('phone_number');
            $user->gender = (string) $request->input('gender');
            $user->active = (int) $request->input('active');
            $user->save();
            session()->flash('success', 'Cập nhật Người Dùng Thành Công');        
        }catch(\Exception $err){
            session()->flash('error', $err->getMessage());
        }
        return redirect('admin/customer/list');
    }
}
