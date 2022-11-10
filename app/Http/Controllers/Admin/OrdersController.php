<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Orders;
use App\Models\Status;
use Illuminate\Support\Facades\DB;

class OrdersController extends Controller
{
    public function index()
    {
        $statuslist = Status::all();
        $orderslist = Orders::orderBy('id')->paginate(5);
        return view('admin.orders.list',[
            'title'=>'Danh Sách Hóa Đơn',
            'orderslist'=>$orderslist,
            'statuslist'=>$statuslist,
        ]);
    }

    public function update($orderID, $statusID)
    {
        $result = DB::table('orders')
              ->where('id', $orderID)
              ->update(['active' => $statusID]);
              //return $result;
              return response()->json(['success'=>'Data is successfully added',]);
       // $orders = Orders::find($orderID);

        // return view('admin.category.edit',[
        //     'title'=>'Chỉnh Sửa Danh Mục: '.$category->name,
        //     'category'=>$category,
        // ]);
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
}