<?php

namespace App\Http\Controllers;

use http\Env\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class MentorController extends Controller
{

    public function index(Request $request)
    {
        $manage_announcements=DB::table('announcements')->orderBy('created_at','desc')->paginate(10);
        $all_user=DB::table('users')->get();

        if ($request->ajax()) {
            return view('user.load', compact('manage_announcements', 'all_user'))->render();
        }

        return view('user.home', compact('manage_announcements', 'all_user'));
    }

}
