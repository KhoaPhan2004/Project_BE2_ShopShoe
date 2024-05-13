<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash; // Import Hash facade

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function login()
    {
        return view('admin.loginAdmin');
    }
    public function check_login(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'role' => 1])) {
            return redirect()->route('admin.index');
        }
        return redirect()->back()->with('err', 'Sai thông tin ');
    }
    public function singOut()
    {
       Auth::logout();
       return redirect()->route('admin.login');
    }
}
