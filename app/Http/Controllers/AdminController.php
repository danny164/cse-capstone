<?php
namespace App\Http\Controllers;

use http\Env\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
class AdminController extends Controller
// announcements
{

    public function index(Request $request){

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

        return view('admin.edit-announcement', compact('edit_new_announcement'));
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
            return redirect('/home')->withSuccess('Post Created Successfully!');
        }

    }

    public function edit_announcement_home(Request $request, $id)
    {
        $edit_new_announcement=DB::table('announcements')->where('id', $id)->get();

        return view('admin.edit-announcement-home', compact('edit_new_announcement'));

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
            return redirect('/home')->withSuccess('Post Created Successfully!');
        }

    }

    public function delete_announcement_home(Request $request, $id){

        DB::table('announcements')->where('id',$id)->delete();

        return  redirect('/home')->withSuccess('Deleted Successfully!');

    }

    // MANAGE ANNOUNCEMENTS
    public function manage_announcements(){

        $manage_announcements=DB::table('announcements')->orderBy('created_at','desc')->get();

        return view('admin.manage-announcements', compact('manage_announcements'));

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

        return view('admin.edit-faculty', compact('edit_new_faculty'));

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

        return view('admin.manage-faculties', compact('manage_faculties'));
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

        return view('admin.edit-departments', compact('edit_departments', 'faculties') );
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

        return view('admin.manage-departments', compact('manage_departments'));

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


    public function save_new_semesters(Request $request)
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

        $manage_faculties=DB::table('faculties')->orderBy('id','asc')->get();
        return view('admin.new-department', compact('manage_faculties'));
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

    public function semester_details(){
        return view('admin.semester-details');
    }
    public function manage_semesters(){
        return view('admin.manage-semesters');
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

    public function new_semester(){
        return view('admin.new-semester');
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
