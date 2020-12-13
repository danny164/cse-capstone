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
    // Cái này Q nó bảo cho hết xuống dưới
    public function new_announcement(){
        return view('admin.new-announcement');
    }
}
