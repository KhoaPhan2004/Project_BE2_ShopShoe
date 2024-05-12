<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
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

    public function showOrderDetails($orderId)
{
    // Lấy thông tin chi tiết đơn hàng
    $orderDetails = DB::table('order_details')
                    ->join('products', 'order_details.product_id', '=', 'products.id')
                    ->select('products.product_name', 'products.image_url', 'products.price', 'order_details.quantity')
                    ->where('order_details.order_id', $orderId)
                    ->get();

    // Lấy dữ liệu sản phẩm từ order details
    $productIds = $orderDetails->pluck('product_id');
    $products = Product::whereIn('id', $productIds)->get();

    return view('order_detail', ['orderDetails' => $orderDetails, 'products' => $products]);
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
    public function destroy(Order $order)
    {
        // Delete the order
        $order->delete();

        return redirect()->route('order.index')->with('success', 'Order deleted successfully.');
    }
}