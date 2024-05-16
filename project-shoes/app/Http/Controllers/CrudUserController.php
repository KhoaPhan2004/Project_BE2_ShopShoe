<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash; // Import Hash facade
use Illuminate\Validation\Rule; // Import lớp Rule

use Illuminate\Http\Request;

class CrudUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::paginate(3);
        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        // Validate dữ liệu từ request
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8',
            'address' => 'required|string|max:255',
            'image_url' => 'required|image',
        ]);
    
        // Kiểm tra tên tồn tại hay không
        $existingUser = User::where('name', $request->name)->first();
        if ($existingUser) {
            return redirect()->back()->withInput()->withErrors(['name' => 'Tên đã được sử dụng. Vui lòng chọn tên khác.']);
        }
    
        // Xử lý lưu ảnh
        $imagePath = null;
        if ($request->hasFile('image_url')) {
            $file = $request->file('image_url');
            $fileName = time() . '-' . $file->getClientOriginalName();
            $file->move(public_path('images'), $fileName);
    
            $imagePath = 'images/' . $fileName;
        }
    
        // Tạo người dùng mới
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'address' => $request->address,
            'image_url' => $imagePath,
        ]);
    
        if ($user) {
            return redirect()->route('user.index')->with('success', 'Người dùng đã được tạo thành công.');
        } else {
            return redirect()->back()->withInput()->withErrors(['error' => 'Không thể tạo người dùng. Vui lòng thử lại.']);
        }
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::findOrFail($id);
        return view('admin.user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('admin.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate dữ liệu từ request
        $request->validate([
            'name' => ['required', 'string', 'max:255', Rule::unique('users')->ignore($id)],
            'email' => ['required', 'email', Rule::unique('users')->ignore($id)],
            'password' => 'nullable|string|min:8',
            'address' => 'required|string|max:255',
            'phone_number' => 'nullable|string|max:20',
            'image_url' => 'nullable|image',
        ]);

        $user = User::findOrFail($id);

        // Cập nhật các trường dữ liệu
        $user->name = $request->name;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->phone_number = $request->phone_number;

        // Nếu có password mới, thì mã hóa và cập nhật
        if ($request->has('password')) {
            $user->password = Hash::make($request->password);
        }

        // Nếu có ảnh mới, thì cập nhật
        if ($request->hasFile('image_url')) {
            $imageContent = file_get_contents($request->file('image_url')->path());
            $user->image_url = $imageContent;
        }

        $user->save();

        return redirect()->route('user.index')->with('success', 'Thông tin người dùng đã được cập nhật thành công.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('user.index')->with('success', 'Người dùng đã được xóa thành công.');
    }
}
