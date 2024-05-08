<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash; // Import Hash facade

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }
    public function login()
    {
        return view('admin.login');
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
        return view('admin.register');
    }
    public function check_register(Request $request)
    {
        request()->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
            'address' => 'required',
            'image_url' => 'required|nullable|image',

        ]);
        $imageContent = file_get_contents($request->file('image_url')->path());

        // $data = request()->all('email', 'name','address','image_url');
        // $data['password'] = bcrypt(request('password'));
        // dd($data);
        // User::create($check);

        $check = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'address' => $request->address,
            'image_url' => $imageContent,
        ]);


        return redirect()->route('admin.login');
    }
    public function changePassword()
    {
        return view('admin.changePassword');
    }
    //kiểm tra
    // public function check_changePassword(Request $request)
    // {
    //     $request->validate([
    //         'email' => 'required|email', // Kiểm tra email không được rỗng và phải là email hợp lệ

    //         'old_password' => 'required',
    //         'password' => 'required|min:8',
    //         'confirm_password' => 'required|same:password'
    //     ]);

    //     dd($request->all());

    //     return redirect()->route('admin.index')->with('success', 'Mật khẩu đã được thay đổi thành công.');
    // }
    public function check_changePassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email', 
            'old_password' => 'required',
            'password' => 'required|min:8',
            'confirm_password' => 'required|same:password'
        ]);

        // lấy thông tin
        $user = User::where('email', $request->email)->first();

        // ktra mật khẩu cũ có khớp với mật khẩu hiện tại không
        if (!Hash::check($request->old_password, $user->password)) {
            return redirect()->back()->with('error', 'Mật khẩu cũ không chính xác.')->withInput();
        }

      //update 
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('admin.login')->with('success', 'Mật khẩu đã được thay đổi thành công.');
    }
}
