@extends('layouts.master')

@section('title', 'Account Settings')

@section('content')

    <div class="breadcrumb-bar navbar bg-white sticky-top">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a>
                </li>
                <li class="breadcrumb-item"><a href="#">User List</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Edit Account</li>
            </ol>
        </nav>
    </div>

    <div class="container">
        <div class="row justify-content-center mt-5">


            <div class="col-xl-8 col-lg-9">
                <div class="card">
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" role="tabpanel" id="profile">
                            @foreach($users as $key => $cate_pro)
                            <form method="POST" action="{{ url('/admin/users/'.$cate_pro->id.'/edit')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="media mb-4">
                                    <img id="img-avatar" alt="Image" src="{{ URL::to('/storage/images/'.$cate_pro->avatar_path) }}"class="avatar avatar-lg" />
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
                                        <label class="col-3">Full Name</label>
                                        <div class="col">
                                            <input type="text" value="{{ $cate_pro->full_name }}" name="full_name" class="form-control @error('full_name') is-invalid @enderror" required />
                                        </div>
                                    </div>



                                    <div class="form-group row align-items-center">
                                        <label class="col-3">Birthday</label>
                                        <div class="col">
                                            <input class="form-control" value="{{ $cate_pro->birthday }}"  name="birthday" type="text" placeholder="Select a Date" data-flatpickr data-alt-input="true" data-max-date="today" required>
                                        </div>
                                    </div>

                                    <div class="form-group row align-items-center">
                                        <label class="col-3">Gender</label>
                                        <div class="col">
                                            <select name="gender" class="form-control">
                                                <option value=1  {{  ($cate_pro->gender == 1 ? ' selected' : '') }}>Male</option>
                                                <option value=2 {{  ($cate_pro->gender == 2 ? ' selected' : '') }}>Female</option>
                                                <option value=3 {{  ($cate_pro->gender == 3 ? ' selected' : '') }}>Others</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row align-items-center">
                                        <label class="col-3">Email</label>
                                        <div class="col">
                                            <input type="email" placeholder="Enter your email address" value="{{$cate_pro->email}}"  name="email" class="form-control"/>
                                        </div>
                                    </div>

                                    <div class="form-group row align-items-center">
                                        <label class="col-3">Phone</label>
                                        <div class="col">
                                            <input type="text" placeholder="Enter your phone number" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{$cate_pro->phone}}" required />
                                        </div>
                                    </div>
                                    @if($cate_pro->role_id ==3 )
                                    <div class="form-group row align-items-center">
                                        <label class="col-3">Student ID</label>
                                        <div class="col">
                                            <input type="text" placeholder="Enter your student ID" value="{{$cate_pro->student_id}}" name="student_id" class="form-control @error('student_id') is-invalid @enderror" required />
                                        </div>
                                    </div>

                                    <div class="form-group row align-items-center">
                                        <label class="col-3">Class</label>
                                        <div class="col">
                                            <input type="text" placeholder="Enter your class" name="class" value="{{$cate_pro->class}}" class="form-control @error('class') is-invalid @enderror"  />
                                        </div>
                                    </div>
                                    @endif

                                    <div class="form-group row align-items-center">
                                        <label class="col-3">Faculty</label>
                                        <div class="col">
                                            <select name="faculty" class="form-control" >
                                            <option selected>Choose...</option>

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
                                            <select name="department" class="form-control">
                                            <option selected>Choose...</option>

                                                @foreach($departments as $key => $value)
                                                    @if($value->id == $cate_pro->department)
                                                        <option value="{{$value->id}}"selected>{{$value->department_name}}</option>
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
                                            <select name="language" class="form-control">
                                                <option value=1  {{  ($cate_pro->language == 1 ? ' selected' : '') }}>Vietnamese</option>
                                                <option value=2  {{  ($cate_pro->language == 2 ? ' selected' : '') }}>English</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-3">Bio</label>
                                        <div class="col">
                                            <textarea placeholder="Tell us a little about yourself" name="bio" class="form-control @error('bio') is-invalid @enderror" rows="4">{{$cate_pro->about_me}}</textarea>
                                            @if($cate_pro->role_id ==3 )
                                                <small><span class="font-weight-bold text-danger-2">You will take a F point for this course if the above information is NOT true</span></small>
                                                @endif
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
                                            <input type="password" placeholder="Enter your current password" name="old_password" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="form-group row align-items-center">
                                        <label class="col-3">New Password</label>
                                        <div class="col">
                                            <input type="password" placeholder="Enter a new password" name="password" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="form-group row align-items-center">
                                        <label class="col-3">Confirm Password</label>
                                        <div class="col">
                                            <input type="password" placeholder="Confirm your new password" name="password_confirmation" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="row justify-content-end">
                                        <button type="submit" class="btn btn-primary">Change Password</button>
                                    </div>
                                </form>

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
