<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\Order\OrderServiceInterface;
use App\Services\OrderDetail\OrderDetailServiceInterface;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

use Illuminate\Http\Request;

class CheckOutController extends Controller
{
    private $orderService;
    private $orderDetailService;

    public function __construct(OrderServiceInterface $orderService,
                                OrderDetailServiceInterface $orderDetailService)
    {
        $this->orderService = $orderService;
        $this->orderDetailService = $orderDetailService;
        date_default_timezone_set("Asia/Ho_Chi_Minh");

    }

    public function index()
    {
        $carts = Cart::content();
        $total = Cart::subtotal();    
        $subtotal = Cart::subtotal();    
        if($total == 0 || Cart::count() == 0)
        {
           // return view('front.shop.cart');
            return redirect('cart/');
        }
        return view('front.checkout.index', compact('carts', 'total', 'subtotal'));
    }

    public function addOrder(Request $request)
    {
        if((Auth::check()))
        {   
            $carts = Cart::content();
            $total = Cart::subtotal();    
            $subtotal = Cart::subtotal();
            $user_id =  Auth::user()->id;
            $balance = str_replace(',', '', $total);
            $stemp = number_format($balance);
            $resultTotal = str_replace(',', '', $stemp);

            // 1. Thêm đơn hàng (gọi hàm OrderService
            $data = [
                'user_id' => $user_id,
                'employee_id' =>"0",
                'total' => $resultTotal,
                'date' => date("Y-m-d h:i:s"),
                'payment' => $request->payment,
                'note' => 'note',
                'status_id' => 1,
            ];
            $order = $this->orderService->create($data);

            //cập nhật thông tin khách hàng
            $user = User::where('id', $user_id)->first(); 
            $user->update([
                'name'=> $request->name,
                'address'=>$request->address,
                'phone_number'=>$request->phone_number,
            ]);

            // 2. Thêm chi tiết đơn hàng
            foreach($carts as $cart){
                $order->products()->attach($cart->id, [
                            'quantity'=> $cart->qty,
                            'price'=> $cart->price,
                        ]);
            }
            
            // Gửi mail
            $this->sendEmail($user, $total, $subtotal, $order); //Gọi hàm gửi mail

            // 3. Xóa giỏ hàng
            Cart::destroy();

            // 4. Trả về kết quả thông báo
            return redirect('checkout/result')
                ->with('notification', 'Đặt hàng thành công! Bạn sẽ thanh toán khi nhận hàng. Vui lòng kiểm tra email của bạn.');
        }
        else
        {
            session()->flash('error', 'Bạn chưa đăng nhập. Vui lòng đăng nhập để có thể đặt hàng');
            return redirect('account/login');
        }
    }

    // hàm trả kết quả đặt hàng
    public function result()
    {   
        $total = Cart::subtotal();    
        
        $notification = session('notification');

        return view('front.checkout.result',compact('notification'));
    }

    // Hàm gửi mail xác nhận
    public function sendEmail($user, $total, $subtotal, $order)
    {
        $email_to = $user->email;
        $orders = $order->where('id','=',$order->id)->with('products')->get();        
        Mail::send('front.checkout.email',
            compact('user','total','subtotal', 'orders','order'), 
            function($message) use ($email_to) {
                $message->from('it.k19.company@gmail.com', 'Furniture Store');
                $message->to($email_to, $email_to);
                $message->subject('Thông báo đặt hàng');
        });
            
    }

}
