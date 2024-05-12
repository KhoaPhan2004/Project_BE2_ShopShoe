<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash; // Import Hash facade
use App\Models\Order; 
use Carbon\Carbon;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }
    public function statistics()
{
    // Lấy dữ liệu từ bảng orders
    $orders = Order::all();

    // Chuyển đổi dữ liệu sang định dạng mà Morris có thể hiểu được
    $data = [];
    foreach ($orders as $order) {
        // Chuyển đổi chuỗi ngày tháng thành đối tượng Carbon
        $orderDate = Carbon::createFromFormat('Y-m-d H:i:s', $order->order_date);
        
        // Kiểm tra nếu chuyển đổi thành công
        if ($orderDate) {
            $data[] = [
                'year' => $orderDate->format('M'), // Lấy năm từ ngày đặt hàng
                'value' => $order->total_amount, // Số tiền đặt hàng
            ];
        }
    }

    // Truyền dữ liệu sang view
    return view('admin.statistics', compact('data'));
}
}
