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
    public function index(Request $request)
    {
        $manage_announcements=DB::table('announcements')->orderBy('created_at','desc')->paginate(10);
        $all_user=DB::table('users')->get();

        if ($request->ajax()) {
            return view('user.load', compact('manage_announcements', 'all_user'))->render();
        }

        return view('user.home', compact('manage_announcements', 'all_user'));
    }

    /**
     * Profile
     *
     * @param Request $request
     * @param [type] $id
     * @return void
     */
    public function account_settings(Request $request, $id){

        $departments=DB::table('departments')->orderBy('id','asc')->get();
        $faculties=DB::table('faculties')->orderBy('id','asc')->get();
        $users=DB::table('users')->where('users.id',$id)->get();

        return view('admin.account-settings', compact('departments', 'faculties', 'users'));
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
        $data['about_me'] = Str::of($request->input('bio'))->replaceMatches('/[ ]{2,}/', ' ')->trim();
        $get_image = $request ->file('avatar_path');


        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,9999).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('images/',$new_image);
            $data['avatar_path'] = $new_image;
        }
        if($request->isMethod('post')){

            $messages = [
                'phone.required' => 'We need to know your phone!',
                'mimes' => 'Only jpeg, png, bmp,tiff are allowed.'
            ];

            $validator = Validator::make($request->all(), [

                'full_name' => 'filled|min:3|max:50',
                'student_id' => 'required_if:role_id,3|min:10|max:20|unique:users,student_id,'.$id,
                'phone' => 'required|min:10|max:11|regex:/^[0-9]+$/i',
                 'new_image' => 'mimes:jpg,jpeg,png,bmp,tiff |max:4096|unique:users,avatar_path,'.$id,
            ], $messages);

            if ($validator->fails()) {

                return back()->withErrors($validator)->withInput();
            }

            DB::table('users')->where('id',$id)->update($data);
            return redirect('profile/'.$id)->withSuccess('Updated Successfully!');
        }

    }
}
