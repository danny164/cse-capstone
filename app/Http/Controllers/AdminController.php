<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
class AdminController extends Controller
{
    public function index(Request $request){
        $manage_announcements=DB::table('announcements')->orderBy('created_at','desc')->get();
        $all_manage_announcements=view('admin.index')->with('manage_announcements', $manage_announcements);
        return view('layouts.master')->with('admin.index', $all_manage_announcements);
//         test
//         echo '<pre>';
//         print_r($manage_announcements);
//         echo '</pre>';

    }

}
