<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

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

    /**
     * Profile
     *
     * @param Request $request
     * @param [type] $id
     * @return void
     */
    public function account_settings(Request $request, $id){

        $departments=DB::table('departments')->orderBy('id','desc')->get();
        $faculties=DB::table('faculties')->orderBy('id','desc')->get();
        $users=DB::table('users')->where('users.id',$id)->get();

        $account_settings = view('admin.account-settings')
            ->with('departments',$departments)
            ->with('faculties',$faculties)
            ->with('users',$users);

        return view('layouts.master')->with('admin.account-settings', $account_settings );
    }

    public function account_update(Request $request,$id){

        $data = [];
        $data['full_name'] = Str::of($request->input('full_name'))->replaceMatches('/[^a-zA-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ]{1,}/', ' ')->replaceMatches('/[ ]{2,}/', ' ')->trim()->title();
        $data['birthday'] = $request->input('birthday');
        $data['gender'] = $request->input('gender');
        $data['email'] = $request->input('email');
        $data['phone'] = $request->input('phone');
        $data['faculty'] = $request->input('faculty');
        $data['department'] = $request->input('department');
        $data['language'] = $request->input('language');
        $data['about_me'] = $request->input('bio');
        $get_image = $request ->file('avatar_path');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,9999).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('images/',$new_image);
            $data['avatar_path'] = $new_image;
        }
        if($request->isMethod('post')){
            $validator = Validator::make($request->all(), [

                // 'student_id' => 'required|min:10|max:20|unique:users,student_id,'.$id,
                'phone' => 'required|size:10',
                // 'profile-class' => 'required|min:3|max:20',

            ]);

            if ($validator->fails()) {

                return back()->withErrors($validator)->withInput();
            }

            DB::table('users')->where('id',$id)->update($data);
            return redirect('profile/'.$id)->withSuccess('Updated Successfully!');
        }

    }
}
