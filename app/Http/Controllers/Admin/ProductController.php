<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Cast\Double;

class ProductController extends Controller
{
    public function __construct()
    {
        date_default_timezone_set("Asia/Ho_Chi_Minh");
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
       // $products = Product::all()->paginate(15);
       //$products = Product::orderBy('id')->paginate(15); //paginate(5);
       $products = Product::orderByDesc('id')->Search()->paginate(15); //paginate(5);
        return view('admin.product.list',[
            'title'=>'Danh Sách Sản Phẩm',
            'products'=>$products,
            'categories'=>$categories,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.product.add',[
            'title'=>'Thêm Sản Phẩm',
            'categories'=>$categories,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,
        [
            'name'=> 'required|unique:Product,name',
            'category' => 'required',
            'price' => 'required',
            'amount' => 'required',
            'fileimage' => 'required|image|mimes:jpg,jpeg,png',        
        ],
        [
            'name.required' => 'Vui lòng nhập tên sản phẩm',            
            'name.unique' => 'Tên sản phẩm đã tồn tại',
            'price.required' => 'Vui lòng nhập giá sản phẩm',
            'amount.required' => 'Vui lòng nhập số lượng sản phẩm',
            'category.required' => 'Vui lòng chọn danh mục cho sản phẩm',
            'fileimage.required' => 'Vui lòng chọn file ảnh cho sản phẩm',
            'fileimage.image' => 'Vui lòng chọn file là file ảnh',
            'fileimage.mimes' => 'Vui lòng chọn file ảnh có đuôi png, jpg, jpeg',
        ]);
        try{
            $product = new Product;

            if($request->input('price')<1 || $request->input('amount') < 1)
            {
                session()->flash('error','Thông tin Giá hoặc Số lượng không đúng');
            }            
            $product->category_id = $request->category;
            $product->name = $request->name;
            $product->description = (string) $request->input('description');
            $product->amount = (int) $request->input('amount');
            $product->price = (Double) $request->input('price');
            $product->active = (int) $request->input('active');
            if($request->hasFile('fileimage'))
            {
                $file = $request->file('fileimage');
                //ten file = time+tên file gốc
                $image = time().$file->getClientOriginalName();  
                $path = 'image/product/'; 
                $file->move('image/product/', $image);   
                $product->image = $path.$image;
            }
            else
            {
                $product->image = "";
            }
            $product->save();
            session()->flash('success', 'Tạo sản phẩm Thành Công');
        }catch(\Exception $err){
            session()->flash('error', $err->getMessage());
        }
       return redirect('admin/product/add');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //xem chi tiết
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $product = Product::find($id);
        return view('admin.product.edit',[
            'title'=>'Chỉnh Sửa Sản Phẩm: '.$product->name,
            'product'=>$product,
            'categories'=>$categories,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,
        [
            'name'=> 'required',
            'category' => 'required',
            'price' => 'required',
            'amount' => 'required',
            'fileimage' => 'image|mimes:jpg,jpeg,png',        
        ],
        [
            'name.required' => 'Vui lòng nhập tên sản phẩm',
            'price.required' => 'Vui lòng nhập giá sản phẩm',
            'amount.required' => 'Vui lòng nhập số lượng sản phẩm',
            'category.required' => 'Vui lòng chọn danh mục cho sản phẩm',
            'fileimage.image' => 'Vui lòng chọn file là file ảnh',
            'fileimage.mimes' => 'Vui lòng chọn file ảnh có đuôi png, jpg, jpeg',
        ]);
        try{
            $product = Product::find($id);       
            if($request->input('price')<1 || $request->input('amount') < 1)
            {
                session()->flash('error','Thông tin Giá hoặc Số lượng không đúng');
            }
            $product->category_id = $request->category;
            $product->name = $request->name;
            $product->description = (string) $request->input('description');
            $product->amount = (int) $request->input('amount');
            $product->price = (Double) $request->input('price');
            $product->active = (int) $request->input('active');
            if($request->hasFile('fileimage'))
            {
                $file = $request->file('fileimage');  
                $image = time().$file->getClientOriginalName(); // tên file = time+ten file gốc
                $path = 'image/product/';
                unlink($product->image); //Xóa ảnh cũ
                $file->move('image/product/', $image);
                $product->image = $path.$image;
            }
            $product->save();
            session()->flash('success', 'Cập nhật sản phẩm Thành Công');
        }catch(\Exception $err){
            session()->flash('error', $err->getMessage());
        }
       return redirect('admin/product/list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            //Lấy product có id = $id
            $product = Product::find($id);
            //đếm product có id_order || id_purchases = $id
            $countorder = $product->orderdetail->count();
            $countpurchases = $product->purchasedetail->count();
            if($countorder != 0 || $countpurchases != 0)
            {
                session()->flash('error', 'Sản phẩm đang được sử dụng. Xóa không thành công');                
            }
            else{
                Product::where('id',$id)->delete();
                unlink($product->image); //Xóa file ảnh
                session()->flash('success', 'Xóa Sản phẩm Thành Công');
            }      
        }catch(\Exception $err){
            session()->flash('error', $err->getMessage());
        }
        return redirect('admin/product/list');
    }


 
}
