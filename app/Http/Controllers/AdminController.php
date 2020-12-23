<?php
namespace App\Http\Controllers;

use http\Env\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Support\Facades\Route;

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
                'description' => 'max:500',
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
                'description' => 'max:500',
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
                'department_name' => 'required|min:3|max:100',
                'description' => 'max:500',
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
                'department_name' => 'required|min:3|max:100',
                'description' => 'max:500',
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
    public function manage_semesters(){

        $manage_semesters=DB::table('semesters')->orderBy('created_at','desc')->get();

        return view('admin.manage-semesters', compact('manage_semesters'));

    }

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

// add user

        public function  new_user(Request $request){
            $data = [];
            $data['full_name'] = Str::of($request->input('full_name'))->replaceMatches('/[^a-zA-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ]{1,}/', ' ')->replaceMatches('/[ ]{2,}/', ' ')->trim()->title();
            $data['email'] = $request->input('email');
            $data['password'] = bcrypt($request->input('password'));
            $data['role_id'] = $request->input('user-role');
            $data['email_verified_at'] = now();


            if($request->isMethod('post')){
                $validator = Validator::make($request->all(), [

                    'full_name' => ['required', 'string', 'min:3', 'max:50', 'regex:/^[a-zA-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s]+$/i'],
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

              //======================================================================================= User List 

       // Mệt quá éo làm nữa 
       
       public function unemail_active($id){
           DB::table('users')->where('id',$id)->update(['is_email_confirmed'=>1]);
           return  Redirect('admin/control/users');
 

       }
       public function email_active($id){
        DB::table('users')->where('id',$id)->update(['is_email_confirmed'=>0]);
        return  Redirect('admin/control/users');


    }
    public function active($id){
        DB::table('users')->where('id',$id)->update(['is_active'=>0]);
        return  Redirect('admin/control/users');


    }
    public function unactive($id){
        DB::table('users')->where('id',$id)->update(['is_active'=>1]);
        return  Redirect('admin/control/users');


    }
    //edit & delete
    public function edit_account(Request $request, $id){

        $departments=DB::table('departments')->orderBy('id','asc')->get();
        $faculties=DB::table('faculties')->orderBy('id','asc')->get();
        $users=DB::table('users')->where('users.id',$id)->get();

        return view('admin.edit-user', compact('departments', 'faculties', 'users'));
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
            return redirect('admin/control/users')->withSuccess('Updated Successfully!');
        }

    }
    public function delete_users(Request $request,$id){
        DB::table('users')->where('id',$id)->delete();

        return  redirect('admin/control/users')->withSuccess('Deleted Successfully!');
    }
    // Plan ======================================================================================= 

    public function save_plan(Request $request){
// Colum -> name
        $data = [];
        $data['title'] = Str::of($request->input('title'));
        $data['description'] = $request->input('request-description');
        $data['start_date'] = $request->input('request-start');
        $data['due_date'] = $request->input('request-due');
        $data['semester_id'] = $request->input('semesters');
      
        // $get_file = $request ->file('file_path');


        // if($get_image){
        //     $get_name_image = $get_image->getClientOriginalName();
        //     $name_image = current(explode('.',$get_name_image));
        //     $new_image = $name_image.rand(0,9999).'.'.$get_image->getClientOriginalExtension();
        //     $get_image->move('images/',$new_image);
        //     $data['avatar_path'] = $new_image;
        // }
        if($request->isMethod('post')){



            $validator = Validator::make($request->all(), [

                'title' => 'filled|min:3|max:50',
            ]);

            if ($validator->fails()) {

                return back()->withErrors($validator)->withInput();
            }

            DB::table('plans')->insert($data);
            return redirect('admin/plans/new')->withSuccess('Create Successfully!');
        }

    }
    public function manage_plans(){
        $plans=DB::table('plans')
        ->join('semesters','semesters.id','=','plans.semester_id')
        // còn join cái nữa đừng xóa
        ->select('plans.id','plans.start_date','plans.due_date','semesters.semester_name','plans.semester_id','plans.title')
        ->orderBy('plans.id','desc')->get();

        return view('admin.manage-plans', compact('plans'));
    }

    public function delete_plans(Request $request,$id){
        DB::table('plans')->where('id',$id)->delete();

        return  redirect('admin/plans')->withSuccess('Deleted Successfully!');
    }
    public function edit_plans(Request $request, $id){

        $plans=DB::table('plans')->where('plans.id',$id)->get();
        $semesters=DB::table('semesters')->orderBy('id','asc')->get();
        

        return view('admin.edit-plan', compact('plans', 'semesters'));
    }
    public function update_plan(Request $request ,$id){
        // Colum -> name
                $data = [];
                $data['title'] = Str::of($request->input('title'));
                $data['description'] = $request->input('request-description');
                $data['start_date'] = $request->input('request-start');
                $data['due_date'] = $request->input('request-due');
                $data['semester_id'] = $request->input('semesters');
              
      
                if($request->isMethod('post')){
        
        
        
                    $validator = Validator::make($request->all(), [
        
                        'title' => 'filled|min:3|max:50',
                    ]);
        
                    if ($validator->fails()) {
        
                        return back()->withErrors($validator)->withInput();
                    }
        
                    DB::table('plans')->where('id',$id)->update($data);
                    return redirect('admin/plans')->withSuccess('Update Successfully!');
                }
        
            }
 
 //=====================================Topic================================================== 

 public function new_topic(){


    $semesters=DB::table('semesters')->orderBy('id','desc')->get();
    $teams=DB::table('teams')->get();
   
    return view('admin.new-topic', compact('semesters','teams'));

}

public function ajax_team(Request $request){
     
    $semester_id = $request->cat_id;
     
    $subcategories = DB::table('teams')->where('semester_id',$semester_id)->get();
    return Response($subcategories);
  
}
public function save_topic(Request $request){
    // Colum -> name
            $data = [];
            $data['title'] = Str::of($request->input('title'));
            $data['description'] = $request->input('request-description');
            $data['start_date'] = $request->input('request-start');
            $data['due_date'] = $request->input('request-due');
            $data['semester_id'] = $request->input('semesters');
          
  
            if($request->isMethod('post')){
    
    
    
                $validator = Validator::make($request->all(), [
    
                    'title' => 'filled|min:3|max:50',
                ]);
    
                if ($validator->fails()) {
    
                    return back()->withErrors($validator)->withInput();
                }
    
                DB::table('plans')->where('id',$id)->update($data);
                return redirect('admin/plans')->withSuccess('Update Successfully!');
            }
    
        }

 //=======================================================================================

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
        $departments=DB::table('departments')->get();

        $faculties=DB::table('faculties')->get();
        $manage_users=DB::table('users')->orderBy('created_at','desc')->get();
        return view('admin.control-panel', compact('manage_users','faculties','departments'));
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
        $semesters=DB::table('semesters')->orderBy('id','asc')->get();
        return view('admin.new-plan', compact('semesters'));
       
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
