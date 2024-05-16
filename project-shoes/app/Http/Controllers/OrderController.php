<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use App\Models\OrderDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::orderBy('created_at', 'DESC')->paginate(10);
        return view('admin.order.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.order.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate request data
        $request->validate([
            'user_id' => 'required|integer',
            'order_date' => 'required|date',
            'status' => 'required|string|max:50',
            'address' => 'required|string|max:100',
        ]);

        // Process request data and store the order
        Order::create($request->all());

        return redirect()->route('order.index')->with('success', 'Order created successfully.');
    }

    public function showOrderDetails($userId)
    {
        // Lấy thông tin chi tiết đơn hàng cho người dùng cụ thể
        $orderDetails = DB::table('order_details')
                    ->join('orders', 'order_details.order_id', '=', 'orders.id')
                    ->join('users', 'orders.user_id', '=', 'users.id')
                    ->join('products', 'order_details.product_id', '=', 'products.id')
                    ->select('orders.id as order_id', 'products.product_name', 'products.image_url', 'products.description', 'products.price',
                     'order_details.quantity', 'users.address', 'orders.status','orders.total_amount')
                    ->where('users.id', $userId)
                    ->get();
    
        // Lấy danh sách ID của các đơn hàng từ chi tiết đơn hàng
        $orderIds = $orderDetails->pluck('order_id');
    
        // Tính tổng tiền của mỗi đơn hàng
        $totalAmounts = [];
        foreach ($orderIds as $orderId) {
            $totalAmount = OrderDetails::where('order_id', $orderId)
                            ->join('products', 'order_details.product_id', '=', 'products.id')
                            ->sum(DB::raw('quantity * price'));
            $totalAmounts[$orderId] = $totalAmount;
        }
    
        // Cập nhật tổng tiền vào cột total_amount của đơn hàng tương ứng
        foreach ($totalAmounts as $orderId => $totalAmount) {
            Order::where('id', $orderId)->update(['total_amount' => $totalAmount]);
        }
    
        // Lấy danh sách ID của các sản phẩm từ chi tiết đơn hàng
        $productIds = $orderDetails->pluck('product_id');
    
        // Lấy thông tin chi tiết của các sản phẩm
        $products = Product::whereIn('id', $productIds)->get();
    
        return view('order_detail', ['orderDetails' => $orderDetails]);
    }
    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        return view('admin.order.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        return view('admin.order.edit', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        // Validate request data
        $request->validate([
            'user_id' => 'required|integer',
            'order_date' => 'required|date',
            'status' => 'required|string|max:50',
            'address' => 'required|string|max:100',
        ]);

        // Process request data and update the order
        $order->update($request->all());

        return redirect()->route('order.index')->with('success', 'Order updated successfully.');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Tìm đơn hàng bằng ID
        $order = Order::findOrFail($id);

        // Xóa các chi tiết đơn hàng liên quan
        OrderDetails::where('order_id', $id)->delete();

        // Xóa đơn hàng
        $order->delete();

        return redirect()->route('order.index')->with('success', 'Order deleted successfully.');
    }
}