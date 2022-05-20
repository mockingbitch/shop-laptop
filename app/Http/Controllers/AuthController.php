<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Session;

class AuthController extends Controller
{
    /**
     * @param Request $request
     * 
     * @return [type]
     */
    public function login(Request $request) 
    {
        $credentials =  $request->only('email', 'password');

        if (Auth::guard('users')->attempt($credentials)) {
            return redirect('admin/dashboard');
        }
        else{
            return view('admin.dangnhap')->with('msg', 'Sai tài khoản hoặc mật khẩu!!!');
        }
    }

    /**
     * @return [type]
     */
    public function loginView()
    {
        $msg = Session::get('msg');
        $user = Auth::guard('users')->user();
        if(isset($user)){
            return redirect()->route('trang.dashboard');
        }
        return view('admin.dangnhap', ['msg' => $msg]);
    }

    /**
     * @return void
     */
    public function logout() 
    {
        Auth::guard('users')->logout();

        return redirect()->route('trang.dangnhap');
    }
}