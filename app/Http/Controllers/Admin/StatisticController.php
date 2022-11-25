<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Orders;
use Illuminate\Http\Request;
use App\Models\Purchases;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class StatisticController extends Controller
{
    public function __construct()
    {
        date_default_timezone_set("Asia/Ho_Chi_Minh");
    }

    public function SumTotal($id)
    {
        return Orders::where('user_id',$id)->sum('total');
    }
    public function vip(Request $request)
    {
        $listUser = User::all();
        $now = getdate();
        if($request->ajax()){
            if(empty($request->year))
            {                
                $year = $now["year"];
                $users = Orders::select(DB::raw('sum(total) as totalPrice'),DB::raw('count(id) as totalOrder'), 'user_id')
                        ->groupBy('user_id')->orderByDesc('totalPrice')->whereYear('date', $year)->where('status_id',5)
                        ->skip(0)->take(10)->get();
            }
            else
            {
                $year = $request->year;
                $users = Orders::select(DB::raw('sum(total) as totalPrice'),DB::raw('count(id) as totalOrder'), 'user_id')
                        ->groupBy('user_id')->orderByDesc('totalPrice')->whereYear('date', $year)->where('status_id',5)
                        ->skip(0)->take(10)->get();
            }
            return response()->json(['users'=>$users,  'listUser'=>$listUser]);
        }
        $year = $now["year"];
        $users = Orders::select(DB::raw('sum(total) as totalPrice'),DB::raw('count(id) as totalOrder'), 'user_id')
                ->groupBy('user_id')->orderByDesc('totalPrice')->whereYear('date', $year)->where('status_id',5)
                ->skip(0)->take(10)->get();
        return view('admin.statistic.vip',[
            'title'=>'Danh Sách Top 10 Khách Hàng VIP Trong Năm',
            'users'=>$users,
            'listUser'=>$listUser
        ]);
    }

    public function print($year)
    {    
        $listUser = User::all();
        $users = Orders::select(DB::raw('sum(total) as totalPrice'),DB::raw('count(id) as totalOrder'), 'user_id')
                ->groupBy('user_id')->orderByDesc('totalPrice')->whereYear('date', $year)->where('status_id',5)
                ->skip(0)->take(10)->get();
        return view('admin.statistic.print',[
            'title'=>'Danh Sách Top 10 Khách Hàng VIP Trong Năm: '.$year,
            'users'=>$users,
            'listUser'=>$listUser
        ]);
    }
}