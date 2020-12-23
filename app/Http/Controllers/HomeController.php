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

        if($request->isMethod('post')){

            $messages = [
                'phone.required' => 'We need to know your phone!',
                'avatar_path.image' => 'Only jpg, jpeg, png, svg, or webp are allowed.'
            ];

            $validator = Validator::make($request->all(), [

                'full_name' => 'filled|min:3|max:50',
                'student_id' => 'required_if:role_id,3|min:10|max:20|unique:users,student_id,'.$id,
                'phone' => 'required|min:10|max:11|regex:/^[0-9]+$/i',
                'avatar_path' => 'filled|image|mimes:jpg,jpeg,png,svg,webp|max:4096'

            ], $messages);

            if ($validator->fails()) {

                return back()->withErrors($validator)->withInput();
            }

            /**
             * ? $example = current(explode(".", $str)); // avatar.png -> avatar
             * php artisan storage:link // Put a symlink from /public/storage to /storage/app/public folder
             */

            if ($request->hasFile('avatar_path')) {
                // get avatar original name
                $original_name = current(explode(".", $request->file('avatar_path')->getClientOriginalName()));
                // set random name with time + file extension name
                $avatar_name = "IMG_".$original_name.'_'.time().'.'.request()->avatar_path->getClientOriginalExtension();
                // save image to images folder
                $request->file('avatar_path')->storeAs('images', $avatar_name);
                // save avatar_name to database
                $data['avatar_path'] = $avatar_name;
            }

            DB::table('users')->where('id',$id)->update($data);
            return redirect('profile/'.$id)->withSuccess('Updated Successfully!');
        }

    }
}
