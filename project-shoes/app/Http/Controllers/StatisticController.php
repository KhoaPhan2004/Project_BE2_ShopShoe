<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Statistic;
use Carbon\Carbon;

class StatisticController extends Controller
{
    public function filter(Request $request)
    {
        // Nhận ngày bắt đầu và ngày kết thúc từ yêu cầu của người dùng
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
    
        // Nhận tùy chọn từ yêu cầu của người dùng
        $option = $request->input('option');
    
        // Khởi tạo ngày bắt đầu và ngày kết thúc mặc định
        $defaultStartDate = null;
        $defaultEndDate = Carbon::now();
    
        // Xử lý tùy chọn từ yêu cầu của người dùng
        switch ($option) {
            case '7 ngay':
                $defaultStartDate = Carbon::now()->subDays(7);
                break;
            case 'thang truot':
                $defaultStartDate = Carbon::now()->subMonth()->startOfMonth();
                break;
            case 'thang nay':
                $defaultStartDate = Carbon::now()->startOfMonth();
                break;
            case '1 nam':
                $defaultStartDate = Carbon::now()->subYear();
                break;
            default:
                // Xử lý khi không có option nào được chọn
                break;
        }
    
        // Sử dụng ngày bắt đầu và ngày kết thúc mặc định nếu không có giá trị từ yêu cầu của người dùng
        if (!$startDate) {
            $startDate = $defaultStartDate;
        }
        if (!$endDate) {
            $endDate = $defaultEndDate;
        }
    
        // Lọc dữ liệu thống kê theo khoảng thời gian và sắp xếp theo ngày
        $filteredStatistics = Statistic::whereBetween('order_date', [$startDate, $endDate])
            ->orderBy('order_date', 'asc')
            ->get()
            ->map(function ($statistic) {
                // Định dạng lại ngày đơn hàng
                $statistic->order_date = Carbon::parse($statistic->order_date)->format('d/m');
                return $statistic;
            });
    
        // Trả về dữ liệu thống kê đã lọc dưới dạng JSON
        return response()->json($filteredStatistics);
    }
    
    
}
