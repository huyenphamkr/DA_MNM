<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Orders;
use Illuminate\Http\Request;
use App\Models\Purchases;
use Illuminate\Support\Facades\DB;

class StatisticController extends Controller
{
    public function __construct()
    {
        date_default_timezone_set("Asia/Ho_Chi_Minh");
    }
    public function index()
    {
        $orders = Orders::orderByDesc('total')->skip(0)->take(10)->get();;
        return view('admin.statistic.index',[
            'title'=>'Danh Sách Top 10 Hóa đơn nổi bật',
            'orders'=>$orders,
        ]);

    //     $sum = Orders::sum('total');
    //     $ors = Orders::orderByDesc('total')->skip(0)->take(10)->get();
    //    // $or = $ors->skip(0)->take(10)->get(); //get first 10 rows
    //     return $ors;


    // DB::table('users')->orderBy('id')->chunk(100, function ($users) {
    //         foreach ($users as $user) {
    //             if ($users->id) {
    //                 return false; // Stop chunking
    //             }
        
    //             // code
    //         }
    //     });
     }
}