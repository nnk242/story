<?php

namespace App\Http\Controllers;

use App\View;
use Illuminate\Http\Request;

class HomeController extends Controller
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
        $count_view = [
            'view' => [],
            'date' => []
        ];

        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $time_nyesterday_0 = time(date("d m Y"));

//        $count_view['view'] = View::

        return view('home');
    }
}
