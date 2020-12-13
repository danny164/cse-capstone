<?php

namespace App\Http\Controllers;

use Auth;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user()->isRole()===1){
            return redirect('/admin');
        }
        else if (Auth::user()->isRole()===2){
            return redirect('/mentor');
        }
        return view('user.home');
    }
}
