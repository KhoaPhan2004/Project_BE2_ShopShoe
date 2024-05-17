<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Brand;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('id', 'DESC')->get();

        $brands = Brand::pluck('brand_name', 'id'); 

        return view('index', compact('products', 'brands'));
    }
    public function show($id)
    {
        $product = Product::select('products.*', 'brands.brand_name as brand_name', 'origins.origin_name as origin_name')
            ->join('brands', 'brands.id', '=', 'products.brand_id')
            ->join('origins', 'origins.id', '=', 'products.origin_id')
            ->where('products.id', $id)
            ->firstOrFail();

        $brands = Brand::pluck('brand_name', 'id');

        return view('details', compact('product', 'brands'));
    }
}
