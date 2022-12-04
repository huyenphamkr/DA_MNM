<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Orders;
use App\Models\Product;
use App\Models\Purchases;
use App\Models\Supplier;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    use AuthenticatesUsers;
    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        //$this->middleware('guest')->except('logout');
        date_default_timezone_set("Asia/Ho_Chi_Minh");
    }
    
    public function index()
    {
        if(Auth::user()->role_id ==4)
        {
            $suppliers = Supplier::count();
            $orders = Orders::count();
            $purchases = Purchases::count();
            $products = Product::count();
            $customers = User::where('role_id', '=', 3)->count();
            $user = User::find(Auth::user()->id);

        return view('admin.warehouse.home',[
            'title'=>'Quản Lý Kho hàng',
            'suppliers'=>$suppliers,
            'orders'=>$orders,
            'purchases'=>$purchases,
            'products'=>$products,
            'customers'=>$customers,
            'user'=>$user,
        ]);
        }
        if(Auth::user()->role_id != 3)
        {
            $suppliers = Supplier::count();
            $orders = Orders::count();
           
            $products = Product::count();
            $customers = User::where('role_id', '=', 3)->count();
            $user = User::find(Auth::user()->id);
        return view('admin.home',[
            'title'=>'Trang chủ',
            'suppliers'=>$suppliers,
            'orders'=>$orders,
            'products'=>$products,
            'customers'=>$customers,
            'user'=>$user,
        ]);
        }
        else
        {
            Auth::logout();
            return view('admin.users.login');
        }
    }
    
    
    //Đăng nhập
    public function getLogin() {
        return view('admin.users.login');
    }

    public function postLogin(Request $request) {
        // Kiểm tra dữ liệu nhập vào
        $rules = [
            'email' =>'required|email',
            'password' => 'required|min:3'
        ];

        $messages = [
            'email.required' => 'Email là trường bắt buộc',
            'email.email' => 'Email không đúng định dạng',
            'password.required' => 'Mật khẩu là trường bắt buộc',
            'password.min' => 'Mật khẩu phải chứa ít nhất 3 ký tự',
        ];
        
        $validator = Validator::make($request->all(), $rules, $messages);
        
        if ($validator->fails()) {
            // Điều kiện dữ liệu không hợp lệ sẽ chuyển về trang đăng nhập và thông báo lỗi
            return redirect('login')->withErrors($validator)->withInput();
        } else {
            // Nếu dữ liệu hợp lệ sẽ kiểm tra trong csdl
            $email = $request->input('email');
            $password = $request->input('password');
            $user = User::where('email', $request->email)->first(); 
     
            if( Auth::attempt(['email' => $email, 'password' =>$password])) {
                if($user->active == 0)
                {
                    Auth::logout();
                    return back()
                    ->with('error','Tài khoản của bạn chưa được kích hoạt, vui lòng click vào <a href="'.route('admin.getActived').'">đây để tiến hành kích hoạt</a>');
                }
                // Kiểm tra đúng email và mật khẩu sẽ chuyển trang
                return redirect('admin/home');
            } else {
                // Kiểm tra không đúng sẽ hiển thị thông báo lỗi
                session()->flash('error', 'Email hoặc mật khẩu không đúng!');
                return redirect('admin/login');
            }
        }
    }
    
    public function getActived()
    {
        return view('admin.users.getActived');
    }

    protected function validatorReset(array $data)
    {
        return Validator::make($data, [
            'email' => 'required|email|exists:users',
        ],
        [
            'email.required' => 'Vui lòng nhập email',            
            'email.email' => 'Vui lòng nhập email',
            'email.exists' => 'Email không tồn tại trong hệ thống',
            
        ]);
    }
    public function postActived(Request $request)
    {
        // Kiểm tra dữ liệu vào
        $allRequest  = $request->all();	
        $validator = $this->validatorReset($allRequest);
     
        if ($validator->fails()) {
             // Dữ liệu vào không thỏa điều kiện sẽ thông báo lỗi
            return redirect('admin/get-actived')->withErrors($validator)->withInput();
        } 
        else 
        {  
            $token = Str::random(20);
            $user = User::where('email', $request->email)->first(); 
            $user->update(['token'=> $token]);
            Mail::send('admin.users.check_email_active_account',compact('user', 'token'), function($email) use($user){
                $email->subject('Xác nhận tài khoản');
                $email->to($user->email, $user->name);       
            });
            return redirect()->back()->with('success', 'Chúng tôi đã gửi một liên kết đặt lại mật khẩu đến email của bạn!');
        }
    }


    //Đăng xuất
    public function getLogout() {
		Auth::logout();
		return redirect('admin/login');
	}

    //Quên mật khẩu
    public function getForgetPass()
    {
        return view('admin.users.forgetPass');
    }

    public function postForgetPass(Request $request)
    {
         // Kiểm tra dữ liệu vào
        $allRequest  = $request->all();	
        $validator = $this->validatorReset($allRequest);
     
        if ($validator->fails()) {
             // Dữ liệu vào không thỏa điều kiện sẽ thông báo lỗi
            return redirect('account/forget')->withErrors($validator)->withInput();
        } 
        else 
        {  
            $token = Str::random(20);
            $user = User::where('email', $request->email)->first(); 
            $user->update(['token'=> $token]);
            Mail::send('admin.users.check_email_forget',compact('user', 'token'), function($email) use($user){
                $email->subject('Đặt lại mật khẩu');
                $email->to($user->email, $user->name);       
            });
            return redirect()->back()->with('success', 'Chúng tôi đã gửi một liên kết đặt lại mật khẩu đến email của bạn!');
        }
    }

    // Đặt lại mật khẩu
    public function getPass(User $user, $token)
    {
        try{
             if ($user->token === $token) {
                return view('admin.users.getPass',[
                    'token' => $token,
                ]);
            }
        }catch(\Exception $err){
            return abort(404);
        }        
    }

    public function postPass(User $user, $token, Request $request)
    {
        $request->validate([
            'password' => 'required_with:password_confirmation|same:password_confirmation',
        ],
        [
            'password.required_with' => 'Vui lòng nhập password',     
            'password.same' => 'Mật khẩu và mật khẩu xác nhận không khớp',
            
        ]);
        try
        {
            $pass = bcrypt($request->password);
            $user->update(['password' => $pass, 'token' => null]);
            return redirect()->route('login')->with('success', 'Mật khẩu của bạn đã được thay đổi! Bạn có thể đăng nhập bằng mật khẩu mới');
        }catch(\Exception $err){
            return redirect()->back()->width('error',$err->getMessage());
            session()->flash('error', $err->getMessage());
        }     
        
    }

    public function getRegister(){
        return view('admin.users.register');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' =>['required', 'string', 'max:255'],
            'email' =>['required','string', 'email', 'max:255', 'unique:users'],
            'password' =>['password' => 'required_with:password_confirmation|same:password_confirmation','min:8'],
            'phone_number'=>['required', 'min:10'],
        ],
        [
			'name.required' => 'Họ và tên là trường bắt buộc',
			'name.max' => 'Họ và tên không quá 255 ký tự',
			'email.required' => 'Email là trường bắt buộc',
			'email.email' => 'Email không đúng định dạng',
			'email.max' => 'Email không quá 255 ký tự',
			'email.unique' => 'Email đã tồn tại',
            'password.required_with' => 'Vui lòng nhập password',     
            'password.min' => 'Mật khẩu phải chứa ít nhất 8 ký tự',
            'password.same' => 'Mật khẩu không chính xác',
            'phone_number.min' => 'Số điện thoại không đúng',
		]);
    }

    public function postRegister(Request $request)
    {
        // Kiểm tra dữ liệu vào
        $allRequest  = $request->all();	
        $validator = $this->validator($allRequest);

        if ($validator->fails()) {
            // Dữ liệu vào không thỏa điều kiện sẽ thông báo lỗi
            return redirect('admin/register')->withErrors($validator)->withInput();
        } else {   
            //Dữ liệu vào hợp lệ sẽ thực hiện tạo người dùng dưới csdl
            $token = Str::random(20);   
            $data = [
                'name' => $request->name,
                'email' => $request->email,
                'role_id' => 2,
                'password' => bcrypt($request->password),
                'address'=> $request->address,
                'phone_number'=> $request->phone_number,
                'gender'=> $request->gender,
                'active'=>0,
                'token' => $token
            ];
            if( $user = User::create($data)) {
                // Gửi mail kích hoạt
                Mail::send('admin.users.check_email_register',compact('user', 'token'), function($email) use($user){
                    $email->subject('Xác nhận tài khoản');
                    $email->to($user->email, $user->name);       
                });
                // Insert thành công sẽ hiển thị thông báo
                session()->flash('success', 'Đăng ký tài khoản thành công, vui lòng xác nhận tài khoản qua email của bạn!');
                return redirect('admin/register');
            } else {
                // Insert thất bại sẽ hiển thị thông báo lỗi
                session()->flash('error', 'Đăng ký thành viên thất bại!');
                return redirect('admin/register');
           }
        }
    }
    public function actived(User $user, $token)
    {
        if($user->token === $token)
        {
            $user->update(['active'=>1, 'token'=>null]);
            session()->flash('success', 'Xác nhận tài khoản thành công. Bạn có thể đăng nhập!');
            return redirect('admin/login');
        }
        else
        {
            session()->flash('error', 'Mã xác nhận không hợp lệ');
            return redirect('admin/login');
        }
    }

}
