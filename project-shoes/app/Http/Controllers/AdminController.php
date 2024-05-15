<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\Models\User;
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

    public function statistics()
    {
        // Lấy dữ liệu từ bảng statistics
        $statistics = Statistic::all();
        // dd($statistics);

        // Chuyển đổi dữ liệu sang định dạng phù hợp cho biểu đồ
        $data = [];
        foreach ($statistics as $statistic) {
            // Chuyển đổi ngày đặt hàng thành đối tượng Carbon
            $orderDate = Carbon::parse($statistic->order_date);

            // Kiểm tra nếu chuyển đổi thành công
            if ($orderDate) {
                $data[] = [
                    'year' => $orderDate->format('d/M'), // Lấy tháng từ ngày đặt hàng
                    'profit' => $statistic->profit, // Lợi nhuận từ thống kê
                    'total_order' => $statistic->total_order, // Số lượng đơn hàng từ thống kê
                ];
            }
        }
        $product_count = Product::count();
        $order_count = Order::count();
        $brand_count = Brand::count();
        $origin_count = Origin::count();

        return view('admin.statistics', compact('data', 'product_count', 'order_count', 'brand_count', 'origin_count'));

        // Truyền dữ liệu sang view
    }
}
