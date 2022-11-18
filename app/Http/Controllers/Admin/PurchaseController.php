<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Purchases;
use App\Models\Supplier;
use Illuminate\Support\Facades\DB;

class PurchaseController extends Controller
{
    public function __construct()
    {
        date_default_timezone_set("Asia/Ho_Chi_Minh");
    }

    public function index()
    {        
        $purchases = Purchases::all();
        return view('admin.purchase.list',[
            'title'=>'Danh Sách Phiếu Nhập',
            'purchases'=>$purchases,
        ]);
    }
    
    public function show($id)
    {
        $suppliers =  Purchases::where('id','=',$id)->with('supplier')->get();
        $employees = Purchases::where('id','=',$id)->with('user')->get();
        $purchases = Purchases::where('id','=',$id)->with('products')->get();
        return view('admin.purchase.show',[
            'title'=>'Chi Tiết Phiếu Nhập: #'.$id,
            'purchases'=>$purchases,
            'suppliers'=>$suppliers,
            'employees'=>$employees,
        ]);
    }
    
    public function print($id)
    {    
        $suppliers =  Purchases::where('id','=',$id)->with('supplier')->get();
        $employees = Purchases::where('id','=',$id)->with('user')->get();
        $purchases = Purchases::where('id','=',$id)->with('products')->get();
        return view('admin.purchase.print',[
            'title'=>'Purchase #'.$id,
            'purchases'=>$purchases,
            'suppliers'=>$suppliers,
            'employees'=>$employees,
        ]);
    }

    public function create()
    { 
        $suppliers = Supplier::where('active',1)->get();
        return view('admin.purchase.add',[
            'title'=>'Lập phiếu nhập',
            'suppliers'=>$suppliers,
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

    public function add($id)
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
            $dataProduct = $_POST['data'];
            $employee_id = $_POST['employee_id'];
            $supplier_id = $_POST['supplier_id'];
            $total = 0;
            foreach ($dataProduct as $value) {
                $total += $value['price'] * $value['amount'];
    
            }
            $date = date("Y-m-d h:i:s");
            $purchase = new Purchases();
            $purchase->user_id =  $employee_id;
            $purchase->supplier_id	 = $supplier_id;
            $purchase->total = $total;
            $purchase->note = "note";
            $purchase->payment = "Thanh toán khi nhận hàng";
            $purchase->date = $date;
            if($purchase->save())
            {
                foreach ($dataProduct as $value) {                    
                    $quantity = $value['amount'];
                    $price = $value['price'];
                    $product_id = $value['id'];
                    $purchase->products()->attach($product_id, [
                        'quantity'=>$quantity,
                        'price'=>$price,
                    ]);
                    $amountOld = Product::where('id',$product_id)->value('amount');
                    $amountNew = $amountOld + $quantity;
                    $updateProduct = DB::table('product')
                        ->where('id', $product_id)
                        ->update([
                        'amount' => $amountNew,
                    ]);
                }
            }
            session()->flash('success', 'Thêm phiếu nhập thành Công');
        }catch(\Exception $err){
             $check = false;
           // session()->flash('error', "Thêm hóa đơn thất bại ! ");
        }
        return redirect('admin/purchase/add');
    }
}