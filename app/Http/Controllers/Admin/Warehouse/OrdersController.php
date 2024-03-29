<?php

namespace App\Http\Controllers\Admin\Warehouse;

use App\Http\Controllers\Controller;
use App\Models\Orders;
use App\Models\Category;
use App\Models\Product;
use App\Models\Status;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrdersController extends Controller
{    
    public function __construct()
    {
        date_default_timezone_set("Asia/Ho_Chi_Minh");
    }

    public function index(Request $request)
    {
        $statuslist = Status::all();  
        $users = User::all();      
        $query = Orders::query();
        if($request->ajax()){
            if(empty($request->show))
            {
                $orderslist = $query->Search()->paginate(10);
            }
            else{
                $orderslist = $query->Search()->paginate($request->show);
            }

            if(!empty($request->sort))
            {
                if($request->sort == 0)
                {
                    if(empty($request->id))
                    {
                        $orderslist = $query->Search()->get();
                    }
                    else{
                        $orderslist = $query->where(['status_id'=>$request->id])->Search()->get();
                    }          
                }
                else
                {
                    if(empty($request->id))
                    {
                        $orderslist = $query->orderByDesc('id')->Search()->get();
                    }
                    else{
                        $orderslist = $query->orderByDesc('id')->where(['status_id'=>$request->id])->Search()->get();
                    }          
                }
            }
            else
            {
                if(empty($request->id))
                {
                    $orderslist = $query->Search()->get();
                }
                else{
                    $orderslist = $query->where(['status_id'=>$request->id])->Search()->get();
                }          
            }
            // if(empty($request->id))
            // {
            //     $orderslist = $query->Search()->get();
            // }
            // else{
            //     $orderslist = $query->where(['status_id'=>$request->id])->Search()->get();
            // }          
            return response()->json(['orderslist'=>$orderslist, 'statuslist'=>$statuslist,'users'=>$users]);
        }
        $orderslist = $query->orderByDesc('id')->Search()->paginate(10);
        return view('admin.warehouse.orders.list',[
            'title'=>'Danh Sách Phiếu Xuất',
            'orderslist'=>$orderslist,
            'statuslist'=>$statuslist,
            'users'=>$users,
        ]);
    }


    public function update($orderID, $statusID)
    {
        $status_id_old = Orders::where('id',$orderID)->value('status_id');
        if($statusID < $status_id_old )
        {
            return response()->json([
                'error' => 'Cập nhật trạng thái thất bại'
            ]);
        }
        if($status_id_old == 5)
        {
            if($statusID == 6)
            {
                return response()->json([
                    'error' => 'Cập nhật trạng thái thất bại. Do đơn hàng đã được giao thành công'
                ]);
            }
        }

        if($statusID == 6)
        {
            if($status_id_old > 1) // 2 3 4 5 6
            {
                return response()->json([
                    'error' => 'Cập nhật trạng thái thất bại. Do đơn hàng đã được xác nhận'
                ]);
            }   
            $result = DB::table('orders')
                ->where('id', $orderID)
                ->update([
                'status_id' => $statusID,
                'employee_id'=>Auth::user()->id,
            ]);
            
            $orders = Orders::find($orderID);
            foreach ($orders->products as $product){ 
                $id = $product->id;           
                $quantity = $product->pivot->quantity;
                $amountOld = Product::where('id',$id)->value('amount');
                $amountNew = $amountOld + $quantity;
                $updateProduct = DB::table('product')
                    ->where('id', $id)
                    ->update([
                    'amount' => $amountNew,
                ]);
            }    
        }
        if($statusID == 2)
        {
            $result = DB::table('orders')
                ->where('id', $orderID)
                ->update([
                'status_id' => $statusID,
                'employee_id'=>Auth::user()->id,
            ]);
            
            $orders = Orders::find($orderID);
            foreach ($orders->products as $product){ 
                $id = $product->id;           
                $quantity = $product->pivot->quantity;
                $amountOld = Product::where('id',$id)->value('amount');
                $amountNew = $amountOld - $quantity;
                $updateProduct = DB::table('product')
                    ->where('id', $id)
                    ->update([
                    'amount' => $amountNew,
                ]);
            }    
        }
        else
        {
            $result = DB::table('orders')
              ->where('id', $orderID)
              ->update(['status_id' => $statusID,]);
        }         
        return response()->json([
            'success' => 'Cập nhật trạng thái thành công'
        ]);
    }

    public function show($id)
    {    
        $customers =  Orders::where('id','=',$id)->with('customer')->get();
        $employees = Orders::where('id','=',$id)->with('employee')->get();
        $orders = Orders::where('id','=',$id)->with('products')->get();
        $statuslist = Status::all();
        return view('admin.warehouse.orders.show',[
            'title'=>'Chi Tiết Phiếu Xuất: #'.$id,
            'orders'=>$orders,
            'customers'=>$customers,
            'employees'=>$employees,
            'statuslist' => $statuslist,
        ]);
    }
    public function print($id)
    {    
        $customers =  Orders::where('id','=',$id)->with('customer')->get();
        $employees = Orders::where('id','=',$id)->with('employee')->get();
        $orders = Orders::where('id','=',$id)->with('products')->get();
        
        return view('admin.warehouse.orders.print',[
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
        return view('admin.warehouse.orders.add',[
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
            $ship = 0;
            $dataProduct = $_POST['data'];
            $employee_id = $_POST['employee_id'];
            $customer_id = $_POST['customer_id'];
            $name =  $_POST['name'];
            $phone =  $_POST['phone'];
            $address =  $_POST['address'];
            $sum = 0;
            foreach ($dataProduct as $value) {
                $sum += $value['price'] * $value['amount'];    
            }
            $total = $sum + $ship;
            $date = date("Y-m-d h:i:s");
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
                //cap nhật thông tin khách hàng
                $user = User::where('id', $customer_id)->first(); 
                $user->update([
                    'name'=> $name,
                    'address'=>$address,
                    'phone_number'=>$phone,
                ]);
            }
            session()->flash('success', 'Thành Công');
        }catch(\Exception $err){
             $check = false;
           // session()->flash('error', "Thêm hóa đơn thất bại ! ");
        }
        return redirect('admin/warehouse/orders/add');
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