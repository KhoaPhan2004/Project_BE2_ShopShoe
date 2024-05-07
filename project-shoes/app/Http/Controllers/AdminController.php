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
        if(auth()->attempt($data)){
            return redirect()->route('admin.index');
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
}
