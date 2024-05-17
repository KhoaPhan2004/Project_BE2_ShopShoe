<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Brand;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('id', 'DESC')->get();
		$brands = Brand::all();
        //$brands = Brand::pluck('brand_name', 'id'); 
        
        return view('index', compact('products', 'brands'));
    }
    public function show($id)
    {
        $product = Product::select('products.*', 'brands.brand_name as brand_name', 'origins.origin_name as origin_name')
            ->join('brands', 'brands.id', '=', 'products.brand_id')
            ->join('origins', 'origins.id', '=', 'products.origin_id')
            ->where('products.id', $id)
            ->firstOrFail();
    
        // Kiểm tra nếu $product là null
        if ($product === null) {
            // Xử lý khi không tìm thấy sản phẩm
            // Ví dụ: trả về một view thông báo lỗi
            return view('product_not_found');
        }
    
        // dd($product);
    
        $productBrands = Brand::pluck('brand_name', 'id');
        $brands = Brand::all();
    
        return view('details', compact('product', 'productBrands', 'brands')); // Pass $brands to the view
    }
    


    public function singOutUser()
    {
        Auth::logout();
        return redirect()->route('login');
    }
    public function productsByBrand($id)
    {
        $brand = Brand::findOrFail($id);
        $products = $brand->products()->get();
        $brands = Brand::all();

        return view('products_by_brand', compact('brand', 'products', 'brands'));
    }
}
