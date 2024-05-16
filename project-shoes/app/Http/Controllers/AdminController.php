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
