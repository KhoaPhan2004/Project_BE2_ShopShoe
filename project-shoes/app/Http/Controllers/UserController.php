<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash; // Import Hash facade

class UserController extends Controller
{
    public function login()
    {
        return view('login');
    }
    public function check_login()
    {
        request()->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required',

        ]);
        $data = request()->all('email', 'password');
        if (auth()->attempt($data)) {
            return redirect()->route('home.index');
        }
    }

    public function register()
    {
        return view('register');
    }
    public function check_register(Request $request)
    {
        request()->validate([
            'name' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
            'address' => 'required',
            'image_url' => 'required|nullable|image',
        ]);
        //kiểm tra tên tồn tại hay ko
        $existingUser = User::where('name', $request->name)->first();
        if ($existingUser) {
            return redirect()->back()->withInput()->withErrors(['name' => 'Tên đã được sử dụng. Vui lòng chọn tên khác.']);
        }

        $imageContent = file_get_contents($request->file('image_url')->path());

        $check = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'address' => $request->address,
            'image_url' => $imageContent,
        ]);

        return redirect()->route('login');
    }
}
