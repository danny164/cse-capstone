@extends('layouts.master')

@section('title', 'Account Settings')

@section('content')

    <div class="breadcrumb-bar navbar bg-white sticky-top">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a>
                </li>
                <li class="breadcrumb-item"><a href="{{ url('admin/account-settings') }}">Profile</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Account Settings</li>
            </ol>
        </nav>
    </div>

    <div class="d-flex justify-content-end mr-2">
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            Vui lòng cập nhật đầy đủ thông tin để <strong>kích hoạt</strong> tài khoản!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-lg-3 mb-3">
                <ul class="nav nav-tabs flex-lg-column" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="true">Your Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="password-tab" data-toggle="tab" href="#password" role="tab" aria-controls="password" aria-selected="false">Password</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="integrations-tab" data-toggle="tab" href="#integrations" role="tab" aria-controls="integrations" aria-selected="false">Integrations</a>
                    </li>
                </ul>
            </div>

            <div class="col-xl-8 col-lg-9">
                <div class="card">
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" role="tabpanel" id="profile">
                            @foreach($users as $key => $cate_pro)
                            <form method="POST" action="{{ url('admin/profile/'.$cate_pro->id.'/update') }}" enctype="multipart/form-data">
                                  {{csrf_field()}}
                                <div class="media mb-4">
                                    <img id="img-avatar" alt="Image" src="{{ URL::to('public/uploads/'.$cate_pro->avatar_path) }}"class="avatar avatar-lg" />
                                    <div class="media-body ml-3">
                                        <div class="custom-file custom-file-naked d-block mb-1">

                                            <input name="avatar_path"  onchange="readURL(this);" type="file" class="custom-file-input d-none" id="avatar-file" accept="image/*">
                                            <label class="custom-file-label position-relative" for="avatar-file" accept="image/*">
                                                <span class="btn btn-primary">Upload avatar</span>
                                            </label>

                                        </div>
                                        <small>For best results, use an image at least 256px by 256px in either .jpg or .png format</small>
                                    </div>
                                </div>
                                <!--end of avatar-->
                               



                                    <div class="form-group row align-items-center">
                                        <label class="col-3">Full Name<span class="text-danger">*</span></label>
                                        <div class="col">
                                            <input type="text"  value="{{$cate_pro->full_name}}" name="full-name" class="form-control" required />
                                        </div>
                                    </div>



                                    <div class="form-group row align-items-center">
                                        <label class="col-3">Birthday</label>
                                        <div class="col">
                                            <input class="form-control" value="{{$cate_pro->birthday}}"  name="birthday" type="text" placeholder="Select a Date" data-flatpickr data-alt-input="true" data-max-date="today" required>
                                        </div>
                                    </div>

                                    <div class="form-group row align-items-center">
                                        <label class="col-3">Gender</label>
                                        <div class="col">
                                            <select name="gender" class="form-control" >
                                                <option value=1  {{  ($cate_pro->gender == 1 ? ' selected' : '') }}>Male</option>
                                                <option value=2 {{  ($cate_pro->gender == 2 ? ' selected' : '') }}>Female</option>
                                                <option value=3 {{  ($cate_pro->gender == 3 ? ' selected' : '') }}>Others</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row align-items-center">
                                        <label class="col-3">Email</label>
                                        <div class="col">
                                            <input type="email" placeholder="Enter your email address" value="{{$cate_pro->email}}"  name="profile-email" class="form-control" readonly />
                                        </div>
                                    </div>

                                    <div class="form-group row align-items-center">
                                        <label class="col-3">Phone</label>
                                        <div class="col">
                                            <input type="text" placeholder="Enter your phone number" name="profile-phone-number" class="form-control" value="{{$cate_pro->phone}}" required />
                                        </div>
                                    </div>

                                    <div class="form-group row align-items-center">
                                        <label class="col-3"   >Student ID</label>
                                        <div class="col">
                                            <input type="text" placeholder="Ignore if you are an officer" value="{{$cate_pro->student_id}}" name="student_id" class="form-control" required />
                                        </div>
                                    </div>

                                    <div class="form-group row align-items-center">
                                        <label class="col-3">Class</label>
                                        <div class="col">
                                            <input type="text" placeholder="Enter your class" name="profile-class" value="{{$cate_pro->class}}"  class="form-control"  />
                                        </div>
                                    </div>

                                    <div class="form-group row align-items-center">
                                        <label class="col-3">Faculty</label>
                                        <div class="col">
                                            <select name="profile-faculty" class="form-control" >

                                            @foreach($faculties as $key => $value)
                                                @if($value->id == $cate_pro->faculty)
                                                    <option  value="{{$value->id}}"selected>{{$value->faculty_name}}</option>
                                                 @else
                                                     <option value="{{$value->id}}">{{$value->faculty_name}}</option>
                                                @endif
                                            @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row align-items-center">
                                        <label class="col-3">Department</label>
                                        <div class="col">
                                            <select name="profile-department" class="form-control">
                                            @foreach($departments as $key => $value)
                                                @if($value->id == $cate_pro->department)
                                                    <option  value="{{$value->id}}"selected>{{$value->department_name}}</option>
                                                 @else
                                                     <option value="{{$value->id}}">{{$value->department_name}}</option>
                                                @endif
                                            @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row align-items-center">
                                        <label class="col-3">Language</label>
                                        <div class="col">
                                            <select name="profile-language" class="form-control">
                                                <option value=1  {{  ($cate_pro->language == 1 ? ' selected' : '') }}>Vietnamese</option>
                                                <option value=2  {{  ($cate_pro->language == 2 ? ' selected' : '') }}>English</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-3">Bio</label>
                                        <div class="col">
                                            <textarea placeholder="Tell us a little about yourself" name="profile-bio" class="form-control" rows="4">{{$cate_pro->about_me}}</textarea>
                                            <small><span class="font-weight-bold text-danger-2">You will take a F point for this course if the above information is NOT true</span></small>
                                        </div>
                                    </div>

                                    <div class="row justify-content-end">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>

                                </form>
                                @endforeach
                            </div>

                            <!-- ### Here is for tabs #### -->

                            <div class="tab-pane fade" role="tabpanel" id="password">

                                <form>
                                    <div class="form-group row align-items-center">
                                        <label class="col-3">Current Password</label>
                                        <div class="col">
                                            <input type="password" placeholder="Enter your current password" name="password-current" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="form-group row align-items-center">
                                        <label class="col-3">New Password</label>
                                        <div class="col">
                                            <input type="password" placeholder="Enter a new password" name="password-new" class="form-control" />
                                        <small>Password must be at least 8 characters long</small>
                                        </div>
                                    </div>
                                    <div class="form-group row align-items-center">
                                        <label class="col-3">Confirm Password</label>
                                        <div class="col">
                                            <input type="password" placeholder="Confirm your new password" name="password-new-confirm" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="row justify-content-end">
                                        <button type="submit" class="btn btn-primary">Change Password</button>
                                    </div>
                                </form>

                            </div>

                            <div class="tab-pane fade" role="tabpanel" id="integrations">
                                <p class="text-center">Coming soon!</p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




 @endsection
 @section('script')

            <script>
                            function readURL(input) {
                                if (input.files && input.files[0]) {
                                    var reader = new FileReader();

                                    reader.onload = function (e) {
                                        $('#img-avatar').attr('src', e.target.result);
                                    };

                                    reader.readAsDataURL(input.files[0]);
                                    var file_data = $('#sortpicture').prop('files')[0];
                                    // var form_data = new FormData();
                                    // form_data.append('file', file_data);
                                    // alert(form_data);
                                    // $.ajax({
                                    //     url: 'upload.php', // point to server-side PHP script
                                    //     dataType: 'text',  // what to expect back from the PHP script, if anything
                                    //     cache: false,
                                    //     contentType: false,
                                    //     processData: false,
                                    //     data: form_data,
                                    //     type: 'post',
                                    //     success: function(php_script_response){
                                    //         alert(php_script_response); // display response from the PHP script, if any
                                    //     }
                                    // });
                                }
                            }
            </script>
@endsection
