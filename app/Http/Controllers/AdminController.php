<?php
namespace App\Http\Controllers;

use http\Env\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
class AdminController extends Controller
// announcements
{

    public function index(Request $request){

        $manage_announcements=DB::table('announcements')->orderBy('created_at','desc')->get();
        $all_user=DB::table('users')->get();
        $all_manage_announcements=view('admin.index')
            ->with('manage_announcements', $manage_announcements)
            ->with('all_use', $all_user);

        return view('layouts.master')->with('admin.index', $all_manage_announcements);

    }
    /**
     * SAVE/EDIT/UPATE/DELETE/MANAGE
     * ANNOUNCEMENTS AND HOME
     *
     * @param Request $request
     * @param [type] $id
     * @return void
     */
    public function save_announcement(Request $request, $id){

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
                return back()->withErrors($validator)->withInput();
            }

            DB::table('announcements')->insert($data);
            return redirect('admin/announcements/new')->withSuccess('Post Created Successfully!');
        }

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
                return back()->withErrors($validator)->withInput();
            }

            DB::table('announcements')->where('id',$id)->update($data);
            return redirect('/admin/announcements')->withSuccess('Post Created Successfully!');
        }

    }

    public function delete_announcement(Request $request, $id){

        DB::table('announcements')->where('id', $id)->delete();

        return  redirect('admin/announcements')->withSuccess('Deleted Successfully!');

    }

    // ANNOUNCEMENT HOME
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
                return back()->withErrors($validator)->withInput();
            }

            DB::table('announcements')->insert($data);
            return redirect('admin')->withSuccess('Post Created Successfully!');
        }

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
                return back()->withErrors($validator)->withInput();
            }

            DB::table('announcements')->where('id', $id)->update($data);
            return redirect('admin')->withSuccess('Post Created Successfully!');
        }

    }

    public function delete_announcement_home(Request $request, $id){

        DB::table('announcements')->where('id',$id)->delete();

        return  redirect('admin')->withSuccess('Deleted Successfully!');

    }

    // MANAGE ANNOUNCEMENTS
    public function manage_announcements(){

        $manage_announcements=DB::table('announcements')->orderBy('created_at','desc')->get();

        $all_manage_announcements=view('admin.manage-announcements')->with('manage_announcements', $manage_announcements);

        return view('layouts.master')->with('admin.manage-announcements', $all_manage_announcements);

    }

    /**
     * SAVE/EDIT/UPDATE/DELETE/MANAGE
     * FACULTY
     *
     * @return void
     */
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
                return back()->withErrors($validator)->withInput();
            }

            DB::table('faculties')->insert($data);
            return redirect('/admin/faculties/new')->withSuccess('Post Created Successfully!');
        }

    }

    public function edit_faculties(Request $request, $id){

        $edit_new_faculty=DB::table('faculties')->orderBy('created_at','desc')->where('id',$id)->get();

        $all_manage_faculty=view('admin.edit-faculty')->with('edit_new_faculty', $edit_new_faculty);

        return view('layouts.master')->with('admin.edit-faculty', $all_manage_faculty);

    }

    public function update_faculties(Request $request,$id){
        $data = [];
        $data['faculty_name'] = $request->input('faculty_name');
        $data['description'] = $request->input('description');

        if($request->isMethod('post')){
            $validator = Validator::make($request->all(), [
                'faculty_name' => 'required|min:3|max:100|unique:faculties,faculty_name,'.$id, //form
                'description' => 'required|max:500',
            ]);

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }

            DB::table('faculties')->where('id',$id)->update($data);
            return redirect('admin/faculties')->withSuccess('Updated Successfully!');
        }

    }

    public function delete_faculties(Request $request,$id){

        DB::table('faculties')->where('id',$id)->delete();

        return  redirect('admin/faculties')->withSuccess('Deleted Successfully!');

    }

    public function manage_faculties(){
        $manage_faculties=DB::table('faculties')->orderBy('created_at','desc')->get();

        $all_manage_faculties=view('admin.manage-faculties')->with('manage_faculties', $manage_faculties);

        return view('layouts.master')->with('admin.manage-faculties', $all_manage_faculties);
    }

    /**
     * SAVE/EDIT/UPDATE/DELETE/MANAGE
     * DEPARTMENT
     *
     * @param [type] $id
     * @return void
     */
    public function save_new_department(Request $request){

        $data = [];
        $data['department_name'] = $request->input('department_name');
        $data['description'] = $request->input('description');
        $data['faculty_id'] = $request->input('faculty_name');

        if($request->isMethod('post')){
            $validator = Validator::make($request->all(), [
                'department_name' => 'required|min:3|max:100|unique:departments',
                'description' => 'required|max:500',
            ]);
            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }
            DB::table('departments')->insert($data);
            return redirect('/admin/departments/new')->withSuccess('Post Created Successfully!');
        }
    }

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

        if($request->isMethod('post')){
            $validator = Validator::make($request->all(), [
                'department_name' => 'required|min:3|max:100|unique:departments,department_name,'.$id,
                'description' => 'required|max:500',
            ]);
            if ($validator->fails()) {
                return back()->withErrors($validator);
            }
            DB::table('departments')->where('id',$id)->update($data);
            return redirect('/admin/departments')->withSuccess('Update Successfully!');
        }
    }

    public function delete_department(Request $request,$id){
        DB::table('departments')->where('id',$id)->delete();

        return  redirect('/admin/departments')->withSuccess('Deleted Successfully!');
    }

    public function manage_departments(){

        $manage_departments=DB::table('departments')
            ->join('faculties','faculties.id','=','departments.faculty_id')
            ->select('departments.id','faculties.faculty_name','departments.faculty_id','departments.department_name')
            ->orderBy('departments.created_at','desc')->get();
        $all_manage_departments=view('admin.manage-departments')->with('manage_departments', $manage_departments);
        return view('layouts.master')->with('admin.manage-departments', $all_manage_departments);

    }

    // Groups

    public function search(Request $request) // $id
    {
        if ($request->ajax()) {
            // $output = "";
            $student = DB::table('users')->where('full_name', 'LIKE', '%' . $request->search . "%")->get();
            return Response($student);
        }
    }
    public function ajaxRequest(Request $request) // $id
    {

        $bodyContent = $request->getContent();
        $users=DB::table('users')->where('student_id', $bodyContent)->get();
        // $data=[];
        // $data['user_id']=$users->student_id;
        // DB::table('semesters_users')->insert('user_id', $users->student_id);
        return Response($users);

    }


    public function save_new_groups(Request $request)
    {
        $data = [];
        $data['full_name'] = $request->input('group-name');
        $data['email'] = $request->input('group-description');
        $data['password'] = $request->input('group-start');
        $data['role_id'] = $request->input('group-due');
        $data['role_id'] = $request->input('visibility');
        $data['role_id'] = $request->input('group-start');
        $data['role_id'] = $request->input('group-start');
        $data['role_id'] = $request->input('group-start');
        $data['role_id'] = $request->input('group-start');
        $data['role_id'] = $request->input('group-start');
        $data['role_id'] = $request->input('group-start');
        $data['email_verified_at'] = now();

        if($request->isMethod('post')){
            $validator = Validator::make($request->all(), [

                'full-name' => 'required|max:55',
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users', 'regex:/^[a-z|A-Z|0-9]+@((dtu|duytan)\.edu\.vn)$/i'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],

            ]);

            if ($validator->fails()) {

                return back()->withErrors($validator);
            }

            DB::table('users')->insert($data);
            return back()->withSuccess('Update Successfully!');
        }
    }


    // ? CHO HẾT TẤT CẢ MỤC SHOW FORM NEW Ở DƯỚI ĐÂY
    public function new_announcement(){
        return view('admin.new-announcement');
    }
    public function new_faculty(){
        return view('admin.new-faculty');
    }

    public function new_department(){
        //return view('admin.new-department');
        $manage_faculties=DB::table('faculties')->orderBy('id','asc')->get();
        $all_manage_faculties=view('admin.new-department')->with('manage_faculties', $manage_faculties);
        return view('layouts.master')->with('admin.new-department', $all_manage_faculties);
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
