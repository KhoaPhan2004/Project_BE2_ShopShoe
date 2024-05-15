<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Statistic;
use Carbon\Carbon;

class StatisticController extends Controller
{
    public function filter(Request $request)
    {
        $option = $request->input('option');

        // Tính toán ngày bắt đầu và ngày kết thúc tùy thuộc vào giá trị của option
        $startDate = null;
        $endDate = Carbon::now();

        switch ($option) {
            case '7 ngay':
                $startDate = Carbon::now()->subDays(7);
                break;
            case 'thang truot':
                $startDate = Carbon::now()->subMonth()->startOfMonth();
                break;
            case 'thang nay':
                $startDate = Carbon::now()->startOfMonth();
                break;
            case '1 nam':
                $startDate = Carbon::now()->subYear();
                break;
            default:
                // Xử lý khi không có option nào được chọn
                break;
        }

        $filteredStatistics = Statistic::whereBetween('order_date', [$startDate, $endDate])->get();

        // Trả về dữ liệu thống kê đã lọc dưới dạng JSON
        return response()->json($filteredStatistics);
    }
}
