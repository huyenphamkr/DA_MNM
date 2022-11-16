<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Orders;
use App\Models\Category;
use App\Models\Product;
use App\Models\Status;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrdersController extends Controller
{
    public function __construct()
    {
        date_default_timezone_set("Asia/Ho_Chi_Minh");
    }

    public function index()
    {
        $statuslist = Status::all();
        $orderslist = Orders::orderByDesc('id')->paginate(5);
        return view('admin.orders.list',[
            'title'=>'Danh Sách Hóa Đơn',
            'orderslist'=>$orderslist,
            'statuslist'=>$statuslist,
        ]);
    }

    public function update($orderID, $statusID)
    {
        if($statusID == 1)
        {
            $result = DB::table('orders')
            ->where('id', $orderID)
            ->update([
              'status_id' => $statusID,
              'employee_id'=>Auth::user()->role_id,
          ]);
        }
        else
        {
            $result = DB::table('orders')
              ->where('id', $orderID)
              ->update(['status_id' => $statusID,]);
        }       
         
        return response()->json([
            'success' => 'Cập nhật trạng thái thành công',
            'error' => 'Cập nhật trạng thái thất bại'
        ]);
    }

    public function show($id)
    {    
        $customers =  Orders::where('id','=',$id)->with('customer')->get();
        $employees = Orders::where('id','=',$id)->with('employee')->get();
        $orders = Orders::where('id','=',$id)->with('products')->get();
        return view('admin.orders.show',[
            'title'=>'Chi Tiết Hóa Đơn: #'.$id,
            'orders'=>$orders,
            'customers'=>$customers,
            'employees'=>$employees,
        ]);
    }
    public function print($id)
    {    
        $customers =  Orders::where('id','=',$id)->with('customer')->get();
        $employees = Orders::where('id','=',$id)->with('employee')->get();
        $orders = Orders::where('id','=',$id)->with('products')->get();
        
        return view('admin.orders.print',[
            'title'=>'Orders #'.$id,
            'orders'=>$orders,
            'customers'=>$customers,
            'employees'=>$employees,
        ]);
    }
    
    public function create()
    {
        $categories = Category::all();
        $products = Product::where('active','=','1')->get();
        return view('admin.orders.add',[
            'title'=>'Lập đơn đặt hàng',
            'categories'=>$categories,
            'products'=>$products,
            response()->json([
                'listproduct'=>$products,
            ]), 
        ]);
    }

    public function adddetail($id)
    {
        $product_add = Product::where('id','=',$id)->get();
        return response()->json([
            'product_add'=>$product_add,
        ]); 
    }

    public function store()
    {
        try
        {
            $ship = 30000;
            $dataProduct = $_POST['data'];
            $employee_id = $_POST['employee_id'];
            $customer_id = $_POST['customer_id'];
            $sum = 0;
            foreach ($dataProduct as $value) {
                $sum += $value['price'] * $value['amount'];
    
            }
            $total = $sum + $ship;
            $date = date("Y-m-d");
            $order = new Orders();
            $order->user_id =  $customer_id;
            $order->employee_id = $employee_id;
            $order->total = $total;
            $order->note = "note";
            $order->payment = "Thanh toán khi nhận hàng";
            $order->date = $date;
            $order->status_id = 1;
            if($order->save())
            {
                foreach ($dataProduct as $value) {
                    $quantity = $value['amount'];
                    $price = $value['price'];
                    $product_id = $value['id'];
                    $order->products()->attach($product_id, [
                        'quantity'=>$quantity,
                        'price'=>$price,
                    ]);
                }
            }
            session()->flash('success', 'Thêm hóa đơn thành Công');
        }catch(\Exception $err){
             $check = false;
           // session()->flash('error', "Thêm hóa đơn thất bại ! ");
        }
    return redirect('admin/orders/add');
    }

    public function getInfoID($id)
    {
        $customer = User::where('id','=',$id)->get();
        return response()->json([
            'customer'=>$customer,
        ]); 
    }

    public function getProducts()
    {
        $categories = json_encode(Category::all());
        $products = json_encode(Product::where('active','=','1')->SearchIdName()->get());
        return response()->json([
                'listproduct'=>$products,
                'categories' => $categories,
        ]);
    }
}