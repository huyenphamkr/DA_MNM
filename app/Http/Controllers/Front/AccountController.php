<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\User\UserServiceInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AccountController extends Controller
{
    // khai báo service
    private $userService;

    public function __construct(UserServiceInterface $userService)
    {
        $this->userService = $userService;
    }

    public function login()
    {
        return view('front.account.login');
    }

    // check login
    public function checkLogin(Request $request)
    {
        $credentials = [
            'email'=> $request->email,
            'password'=> $request->password,
            'role_id'=> 3, // 3 là tài khoản customer
        ];
       
        $user = User::where('email', $request->email)->first(); 

        $remember = $request->remember;

        if(Auth::attempt($credentials, $remember))
        {
            if($user->active == 0)
            {
                Auth::logout();
                return back()
                ->with('error','Tài khoản của bạn chưa được kích hoạt, vui lòng click vào <a href="'.route('account.getActived').'">đây để tiến hành kích hoạt</a>');
            }
            // chuyển hướng đến trang chủ sau khi đăng nhập thành công
            return redirect()->route('index');
        }else {
            // quay lại thông báo lỗi khi đăng nhập thất bại            
            return back()
                ->with('error','Lỗi: Email hoặc mật khẩu sai');
        }
    }

    public function getActived()
    {
        return view('front.account.getActived');
    }

    public function postActived(Request $request)
    {
        // Kiểm tra dữ liệu vào
        $allRequest  = $request->all();	
        $validator = $this->validatorReset($allRequest);
     
        if ($validator->fails()) {
             // Dữ liệu vào không thỏa điều kiện sẽ thông báo lỗi
            return redirect('account/get-actived')->withErrors($validator)->withInput();
        } 
        else 
        {  
            $token = Str::random(20);
            $user = User::where('email', $request->email)->first(); 
            $user->update(['token'=> $token]);
            Mail::send('front.account.check_email_active_account',compact('user', 'token'), function($email) use($user){
                $email->subject('Xác nhận tài khoản');
                $email->to($user->email, $user->name);       
            });
            return redirect()->back()->with('success', 'Chúng tôi đã gửi một liên kết đặt lại mật khẩu đến email của bạn!');
        }
    }

    // logout

    public function logout()
    {
        Auth::logout();

        return back();
    }

    // Đăng ký tài khoản

    public function register()
    {
        return view('front.account.register');
    }
 
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['password' => 'required_with:password_confirmation|same:password_confirmation','min:8'],
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
            'phone_number.required'=> 'Số điện thoại là trường bắt buộc',
            'phone_number.min' => 'Số điện thoại không đúng',
		]);
    }

    public function checkRegister(Request $request)
    {
        // Kiểm tra dữ liệu vào
        $allRequest  = $request->all();	
        $validator = $this->validator($allRequest);
     
        if ($validator->fails()) {
             // Dữ liệu vào không thỏa điều kiện sẽ thông báo lỗi
            return redirect('account/register')->withErrors($validator)->withInput();
        } else {   
            // Dữ liệu vào hợp lệ sẽ thực hiện tạo người dùng dưới csdl
            $token = Str::random(20);     
            $data = [
                        'name' => $request->name,
                        'email' => $request->email,
                        'password' => bcrypt($request->password),
                        'role_id' => 3, //đăng ký tài khoản cấp: khách hàng bình thường
                        'address' => $request->address,
                        'phone_number' => $request->phone_number,
                        'gender' => $request->gender,
                        'token'=> $token,
                        'active' => 0,                                  
                    ];
                   
            if( $user = $this->userService->create($data)) {
                Mail::send('front.account.check_email_register',compact('user', 'token'), function($email) use($user){
                    $email->subject('Xác nhận tài khoản');
                    $email->to($user->email, $user->name);       
                });
                // Insert thành công sẽ hiển thị thông báo
                session()->flash('success', 'Đăng ký tài khoản thành công, vui lòng xác nhận tài khoản qua email của bạn!');
                return redirect('account/register');
            } else {
                //Insert thất bại sẽ hiển thị thông báo lỗi
                session()->flash('error', 'Đăng ký thành viên thất bại!');
                return redirect('account/register');
            }
        }
    }

    public function actived(User $user, $token)
    {
        if($user->token === $token)
        {
            $user->update(['active'=>1, 'token'=>null]);
            session()->flash('success', 'Xác nhận tài khoản thành công. Bạn có thể đăng nhập!');
            return redirect('account/login');
        }
        else
        {
            session()->flash('error', 'Mã xác nhận không hợp lệ');
            return redirect('account/login');
        }
    }

    public function forget()
    {
       return view('front.account.forgetPassword');
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
    public function postForget(Request $request)
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
            Mail::send('front.account.check_email_forget',compact('user', 'token'), function($email) use($user){
                $email->subject('Đặt lại mật khẩu');
                $email->to($user->email, $user->name);       
            });
            return redirect()->back()->with('success', 'Chúng tôi đã gửi một liên kết đặt lại mật khẩu đến email của bạn!');
        }
    }

    // Đặt lại mật khẩu
    public function reset(User $user, $token)
    {
        try{
            if ($user->token === $token) {
                return view('front.account.resetPassword',[
                    'token' => $token,
                ]);
            }
        }catch(\Exception $err){
            return abort(404);
        }        
    }

    public function postReset(User $user, $token, Request $request)
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
            return redirect('account/login')->with('success', 'Mật khẩu của bạn đã được thay đổi! Bạn có thể đăng nhập bằng mật khẩu mới');
        }catch(\Exception $err){
            return redirect()->back()->width('error',$err->getMessage());
            session()->flash('error', $err->getMessage());
        }     
        
    }

}
