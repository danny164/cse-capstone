<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
class AdminController extends Controller
// announcements
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
    public function edit_announcement_home(Request $request, $id)
    {
        $edit_new_announcement=DB::table('announcements')->where('id', $id)->get();

        $all_manage_announcements=view('admin.edit-announcement-home')->with('edit_new_announcement', $edit_new_announcement);

        return view('layouts.master')->with('admin.edit-announcement-home', $all_manage_announcements);
    }
    public function update_announcement_home(Request $request, $id){

        $data = [];
        $data['title'] = $request->input('title');
        $data['content'] = $request->input('content');
        $data['visibility']=$request->input('visibility');

        if($request->isMethod('post')){
            $validator = Validator::make($request->all(), [
                'title' => 'required|min:5|max:255',
                'content' => 'required|min:5',
                'visibility' => 'required'
            ]);

            if ($validator->fails()) {
                return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
            }

            DB::table('announcements')->where('id',$id)->update($data);
            return redirect('admin')->withSuccess('Post Created Successfully!');
        }
    }
    public function save_announcement(Request $request, $id){
        $data = [];
        $data['title'] = $request->input('title');
        $data['content'] = $request->input('content');
        $data['visibility']=$request->input('visibility');
        $data['user_id']=$id;
        /**
         * TODO: Cần sửa chỗ này chổ này ko có thông báo vì biến ID
         */


        if($request->isMethod('post')){
            $validator = Validator::make($request->all(), [
                'title' => 'required|min:5|max:255',
                'content' => 'required|min:5',
                'visibility' => 'required'
            ]);

            if ($validator->fails()) {
                return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
            }

            DB::table('announcements')->insert($data);
            return redirect('admin/announcements/new')->withSuccess('Post Created Successfully!');
        }

    }
    public function save_announcement_home(Request $request, $id){

        $data = [];
        $data['title'] = $request->input('title');
        $data['content'] = $request->input('content');
        $data['visibility']=$request->input('visibility');
        $data['user_id']=$id;
        if($request->isMethod('post')){
            $validator = Validator::make($request->all(), [
                'title' => 'required|min:5|max:255',
                'content' => 'required|min:5',
                'visibility' => 'required'
            ]);

            if ($validator->fails()) {
                return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
            }

            DB::table('announcements')->insert($data);
            return redirect('admin')->withSuccess('Post Created Successfully!');
        }

    }
    public function delete_announcement_home(Request $request, $id){

        DB::table('announcements')->where('id',$id)->delete();

       // Session::put('message','Xóa thành công');

        return  redirect('admin')->withSuccess('Deleted Successfully!');
    }
    public function manage_announcements(){

        $manage_announcements=DB::table('announcements')->orderBy('created_at','desc')->get();

        $all_manage_announcements=view('admin.manage-announcements')->with('manage_announcements', $manage_announcements);

        return view('layouts.master')->with('admin.manage-announcements', $all_manage_announcements);

    }
    public function edit_announcement(Request $request, $id){

        $edit_new_announcement=DB::table('announcements')->orderBy('created_at','desc')->where('id',$id)->get();

        $all_manage_announcements=view('admin.edit-announcement')->with('edit_new_announcement', $edit_new_announcement);

        return view('layouts.master')->with('admin.edit-announcement', $all_manage_announcements);
    }

    public function update_announcement(Request $request, $id){
        $data = [];
        $data['title'] = $request->input('title');
        $data['content'] = $request->input('content');
        $data['visibility']=$request->input('visibility');

        if($request->isMethod('post')){
            $validator = Validator::make($request->all(), [
                'title' => 'required|min:5|max:255',
                'content' => 'required|min:5',
                'visibility' => 'required'
            ]);

            if ($validator->fails()) {
                return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
            }

            DB::table('announcements')->where('id',$id)->update($data);
            return redirect('/admin/announcements')->withSuccess('Post Created Successfully!');
        }

    }
    public function delete_announcement(Request $request, $id){

        DB::table('announcements')->where('id', $id)->delete();
        Alert::success('Success Title', 'Success Message');
        return  redirect('admin/announcements');
    }
// faculty
    public function manage_faculties(){
        $manage_faculties=DB::table('faculties')->orderBy('created_at','desc')->get();

        $all_manage_faculties=view('admin.manage-faculties')->with('manage_faculties', $manage_faculties);

        return view('layouts.master')->with('admin.manage-faculties', $all_manage_faculties);
    }
    public function save_new_faculty(Request $request){

        $data = [];
        $data['faculty_name'] = $request->input('faculty_name');
        $data['description'] = $request->input('description');

        if($request->isMethod('post')){
            $validator = Validator::make($request->all(), [
                'faculty_name' => 'required|min:3|max:100|unique:faculties',
                'description' => 'required|max:500',
            ]);

            if ($validator->fails()) {
                return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
            }

            DB::table('faculties')->insert($data);
            return redirect('/admin/faculties/new')->withSuccess('Post Created Successfully!');
        }
    }
    public function update_faculties(Request $request,$id){
        $data = [];
        $data['faculty_name'] = $request->input('faculty_name');
        $data['description'] = $request->input('description');
        // $data['visibility']=$request->input('visibility');

        if($request->isMethod('post')){
            $validator = Validator::make($request->all(), [
                'faculty_name' => 'required|min:3|max:100|unique:faculties', //form
                'description' => 'required|max:500',
                // 'visibility' => 'required'
            ]);

            if ($validator->fails()) {
                return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
            }

            DB::table('faculties')->where('id',$id)->update($data);
            return redirect('admin/faculties')->withSuccess('Successfully!');
        }

    }
    public function edit_faculties(Request $request, $id){
        $edit_new_faculty=DB::table('faculties')->orderBy('created_at','desc')->where('id',$id)->get();

        $all_manage_faculty=view('admin.edit-faculty')->with('edit_new_faculty', $edit_new_faculty);


        return view('layouts.master')->with('admin.edit-faculty', $all_manage_faculty);
    }
    public function delete_faculties(Request $request,$id){

        DB::table('faculties')->where('id',$id)->delete();
       // Session::put('messages','Xóa thành công');

        return  redirect('admin/faculties');

    }

//     departments
    public function edit_department($id){
        $edit_departments=DB::table('departments')->orderBy('id','desc')->where('departments.id',$id)->get();
        $faculties=DB::table('faculties')->orderBy('id','desc')->get();
        $all_department = view('admin.edit-departments')->with('edit_departments',$edit_departments)
            ->with('faculties',$faculties);
        return view('layouts.master')->with('admin.edit-departments', $all_department );
        // $manage_departments=DB::table('departments')
        // ->join('faculties','faculties.id','=','departments.faculty_id')
        // ->select('departments.id','faculties.faculty_name','departments.faculty_id','departments.department_name','departments.description')
        // ->orderBy('departments.created_at','desc')->where('departments.id',$id)->get();
        // $all_manage_departments=view('admin.edit-departments')->with('edit_departments', $manage_departments);
        // return view('layouts.master')->with('admin.edit-departments', $all_manage_departments );

    }
    public function update_department(Request $request,$id){
        $data = [];
        $data['department_name'] = $request->input('department_name');
        $data['description'] = $request->input('description');
        $data['faculty_id'] = $request->input('faculty_id');
        if($data['department_name']==null||$data['description']==null){
            //Session::put('message','Cập nhật thất bại');
            return  redirect('/admin/departments/management/'.$id.'/edit');
        }
        else{
            DB::table('departments')->where('id',$id)->update($data);
            return  redirect('/admin/departments');}
    }
    public function delete_department(Request $request,$id){
        DB::table('departments')->where('id',$id)->delete();
        //Session::put('messages','Xóa thành công');

        return  redirect('/admin/departments');
    }
    public function save_new_department(Request $request){
        // Nó không hiển thị thông báo là vì hiện thị faculty trong new-department
        $data = [];
        $data['department_name'] = $request->input('department_name');
        $data['description'] = $request->input('description');
        $data['faculty_id'] = $request->input('faculty_name');
        /**
         * TODO: Cần sửa chỗ này
         */
        if($request->isMethod('post')){
            $validator = Validator::make($request->all(), [
                'department_name' => 'required|min:3|max:100|unique:departments',
                'description' => 'required|max:500',
            ]);
            if ($validator->fails()) {
                return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
            }
            DB::table('departments')->insert($data);
            return redirect('/admin/departments/new')->withSuccess('Post Created Successfully!');
        }
    }
    public function new_department(){
        //return view('admin.new-department');
        $manage_faculties=DB::table('faculties')->orderBy('id','asc')->get();
        $all_manage_faculties=view('admin.new-department')->with('manage_faculties', $manage_faculties);
        return view('layouts.master')->with('admin.new-department', $all_manage_faculties);
    }
    public function manage_departments(){
        $manage_departments=DB::table('departments')
            ->join('faculties','faculties.id','=','departments.faculty_id')
            ->select('departments.id','faculties.faculty_name','departments.faculty_id','departments.department_name')
            ->orderBy('departments.created_at','desc')->get();
        $all_manage_departments=view('admin.manage-departments')->with('manage_departments', $manage_departments);
        return view('layouts.master')->with('admin.manage-departments', $all_manage_departments);
    }
// Profile

    public function account_settings(Request $request, $id){
        $departments=DB::table('departments')->orderBy('id','desc')->get();
        $faculties=DB::table('faculties')->orderBy('id','desc')->get();
        $users=DB::table('users')->where('users.id',$id)->get();

        $account_settings = view('admin.account-settings')
            ->with('departments',$departments)
            ->with('faculties',$faculties)
            ->with('users',$users);

        return view('layouts.master')->with('admin.account-settings', $account_settings );
        return view('admin.');
    }

    public function account_update(Request $request,$id){

        $data = [];
        $data['full_name'] = $request->input('full-name');
        $data['gender'] = $request->input('gender');
        $data['email'] = $request->input('profile-email');
        $data['phone'] = $request->input('profile-phone-number');
        $data['student_id'] = $request->input('student_id');
        $data['class'] = $request->input('profile-class');
        $data['faculty'] = $request->input('profile-faculty');
        $data['department'] = $request->input('profile-department');
        $data['language'] = $request->input('profile-language');
        $data['about_me'] = $request->input('profile-bio');
        $data['birthday'] = $request->input('birthday');
        $get_image = $request ->file('avatar_path');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/',$new_image);
            $data['avatar_path'] = $new_image;
        }
        if($request->isMethod('post')){
            $validator = Validator::make($request->all(), [
                // 'student_id' => [
                //     'required',
                //     'max:20',
                //     Rule::unique('users')->ignore($user->id),
                // ],
                'student_id' => 'required|max:20|unique:users,student_id,'.$id,
                'profile-phone-number' => 'required|min:9|max:11|',
                'profile-class' => 'required|min:3|max:20|',
                //'student_id' => ['required','max:20', ''],
                // 'phone' => ['required','max:11', 'unique:users'],


            ]);

            if ($validator->fails()) {

                return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
            }

            DB::table('users')->where('id',$id)->update($data);
            return redirect('admin/profile/'.$id.'/update')->withSuccess('Update Successfully!');
        }
    }
//Control









    // Cái này Q nó bảo cho hết xuống dưới
    public function new_announcement(){
        return view('admin.new-announcement');
    }
    public function new_faculty(){
        return view('admin.new-faculty');
    }
    public function control_panel(){
        return view('admin.control-panel');
    }
    public function add_user(){
        return view('admin.add-user');
    }
    public function edit_team(){
        return view('admin.edit-team');
    }

    public function edit_topic(){
        return view('admin.edit-topic');
    }

    public function group_details(){
        return view('admin.group-details');
    }
    public function manage_groups(){
        return view('admin.manage-groups');
    }

    public function manage_plans(){
        return view('admin.manage-plans');
    }

    public function manage_tasks(){
        return view('admin.manage-tasks');
    }

    public function manage_topics(){
        return view('admin.manage-topics');
    }

    public function new_group(){
        return view('admin.new-group');
    }

    public function new_team(){
        return view('admin.new-team');
    }

    public function new_task(){
        return view('admin.new-task');
    }

    public function new_plan(){
        return view('admin.new-plan');
    }

    public function new_topic(){
        return view('admin.new-topic');
    }

    public function pending_topics(){
        return view('admin.pending-topics');
    }

    public function statistics(){
        return view('admin.statistics');
    }

    public function team_details(){
        return view('admin.team-details');
    }

    public function template(){
        return view('admin.template');
    }



}
