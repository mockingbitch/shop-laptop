<?php

namespace App\Http\Controllers\Trangchu;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TrangchuController extends Controller
{
    public function trangchu()
    {
        return view('home.trangchu');
    }
}
