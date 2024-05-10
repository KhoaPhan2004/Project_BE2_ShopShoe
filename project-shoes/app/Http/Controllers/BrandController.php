<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::orderBy('id', 'DESC')->paginate(3);

        // Kiểm tra số lượng thương hiệu
        $brandCount = Brand::count();

        if ($brandCount > 0) {
            $perpage = 3;
            $brands = Brand::paginate($perpage);
            return view('admin.brand.index', ['brands' => $brands]);
        }

        return view('admin.brand.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate input
        $request->validate([
            'brand_name' => 'required|unique:brands',
            'created_at' => 'required', 
        ]);
    
        // Lấy dữ liệu từ request
        $data = $request->only('brand_name', 'created_at');
    
        // Tạo mới đối tượng Brand và lưu vào cơ sở dữ liệu
        Brand::create($data);
    
        // Chuyển hướng đến trang danh sách thương hiệu sau khi tạo mới thành công
        return redirect()->route('brand.index');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand)
    {
        //sua lại edit để sửa đc ngày tạo
        $brand->formatted_created_at = $brand->created_at->format('d/m/Y H:i:s');

        return view('admin.brand.edit',compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Brand $brand)
    {
        $request->validate([
            'brand_name' => 'required|unique:brands,brand_name,'.$brand->id,
            'created_at' => 'required',
        ]);
    
        $data = $request->only('brand_name','created_at');
    
        $brand->update($data);
    
        return redirect()->route('brand.index');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        $brand->delete();
        return redirect()->route('brand.index');


    }
}
