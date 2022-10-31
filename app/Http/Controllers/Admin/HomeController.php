<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Orders;
use App\Models\Product;
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
     
            if( Auth::attempt(['email' => $email, 'password' =>$password])) {
                
                // Kiểm tra đúng email và mật khẩu sẽ chuyển trang
                return redirect('admin/home');
            } else {
                // Kiểm tra không đúng sẽ hiển thị thông báo lỗi
                session()->flash('error', 'Email hoặc mật khẩu không đúng!');
                return redirect('admin/login');
            }
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
        $request->validate([
            'email' => 'required|email|exists:users',
        ],
        [
            'email.required' => 'Vui lòng nhập email',            
            'email.email' => 'Vui lòng nhập email',
            'email.exists' => 'Email không tồn tại trong hệ thống',
            
        ]);
        $token = Str::random(40);
        $user = User::where('email', $request->email)->first();
        // $user -> update(['token' => $token])
        // DB::table('password_resets')->insert([
        //     'email'=>$request->email,
        //     'token'=>$token,
        //     'created_at'=>Carbon::now(),
        // ]);

        if(DB::table('password_resets')->where(['email'=>$user->email])->first())
        {
            DB::table('password_resets')->update([
                'email'=>$request->email,
                'token'=>$token,
                'created_at'=>Carbon::now(),
            ]);
        }
        else
        {
            DB::table('password_resets')->insert([
                'email'=>$request->email,
                'token'=>$token,
                'created_at'=>Carbon::now(),
            ]);
        }
       
        //Gửi mail
        Mail::send('admin.users.check_email_forget',compact('user', 'token'), function($email) use($user){
            $email->subject('Reset Password');
            $email->to($user->email, $user->name);       
        });
        return redirect()->back()->with('success', 'We have e-mailed your password reset link');
    }

    // Đặt lại mật khẩu
    public function getPass(User $user, $token)
    {
        try{
            $check = DB::table('password_resets')->where(['email'=>$user->email,])->first();
            if ($check->token === $token) {
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
            $user->update(['password' => $pass]);
    
            DB::table('password_resets')->where(['email'=>$user->email, 'token' => $request->token])->delete();
            // DB::table('password_resets')->delete() update([
            //     'token'=>null,
            //     'created_at'=>Carbon::now(),
            // ]);
            return redirect()->route('login')->with('success', 'Your password has been changed! You can login with new password');
        }catch(\Exception $err){
            return redirect()->back()->width('error',$err->getMessage());
            session()->flash('error', $err->getMessage());
        }     
        
    }
}
