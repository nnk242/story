<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        date_default_timezone_set('UTC');
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        echo date("Y-m-d", mktime(0, 0, 0, date("m"), 0));
    }
}
