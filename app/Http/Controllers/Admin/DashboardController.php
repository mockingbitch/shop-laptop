<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * Người dùng đăng nhập thành công sẽ chuyển về trang dashboard
     * function $this->checkAdmin(); sẽ kiểm tra người dùng có phải Admin hay không
     *
     * @return void
     */
    public function index() 
    {
        $this->checkAdmin();

        return view('admin.dashboard');
    }
}
