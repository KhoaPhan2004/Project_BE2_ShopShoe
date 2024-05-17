<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\Models\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash; // Import Hash facade

use App\Models\Statistic; // Import Statistic model
use Carbon\Carbon;
use App\Models\Product;
use App\Models\Order;
use App\Models\Origin;


class AdminController extends Controller
{
    public function index()
    {
        
        return view('admin.index');
    }

    public function error(){
        $code = request()->code;
        $errors =[
            'code'=>403,
            'title'=>'Unauthorized',
            'message'=>'Unauthorized...!'
        ];
        return view('admin.error',$errors);
    }
    public function login()
    {
        return view('admin.loginAdmin');
    }
    public function check_login(Request $request)
    {
        // if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'role' => 1])) {
        //     return redirect()->route('admin.index');
        // }
        // return redirect()->back()->with('err', 'Sai thông tin ');
        if (Auth::attempt($request->only('email','password'))) {
            return redirect()->route('admin.admin.index');
        }else{
            return redirect()->route('admin.login');
        }
        
    }
    public function singOut()
    {
       Auth::logout();
       return redirect()->route('admin.login');
    }
    public function statistics()
    {
        
        $statistics = Statistic::all();
        $data = [];
        foreach ($statistics as $statistic) {
            $orderDate = Carbon::parse($statistic->order_date);
            if ($orderDate) {
                $data[] = [
                    'order_date' => $orderDate->format('d/M'), // Định dạng ngày/tháng
                    'profit' => $statistic->profit,
                    'total_order' => $statistic->total_order,
                ];
            }
        }
        $product_count = Product::count();
        $order_count = Order::count();
        $brand_count = Brand::count();
        $origin_count = Origin::count();

        return view('admin.statistics', compact('data', 'product_count', 'order_count', 'brand_count', 'origin_count'));

    }
}
