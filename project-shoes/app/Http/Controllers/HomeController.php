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
}
