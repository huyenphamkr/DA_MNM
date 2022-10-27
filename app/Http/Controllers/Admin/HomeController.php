<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Orders;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    
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
            return view('auth.login');
        }
    }
}
