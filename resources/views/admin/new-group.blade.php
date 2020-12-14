@extends('layouts.master')

@section('content')

    <div class="breadcrumb-bar navbar bg-white sticky-top">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a>
                </li>
                <li class="breadcrumb-item"><a href="{{ url('admin/groups') }}">Groups</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">New Group</li>
            </ol>
        </nav>

    </div>
    <!-- end breadcrumb -->

    <!-- begin a container -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-11 col-xl-10">

                <form class="mt-3"method="POST" action="{{ url('admin/groups/new-groups') }}" enctype="multipart/form-data">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h5 class="modal-title">Create a Group</h5>
                        </div>

                        <!--end of modal head-->
                        <ul class="nav nav-tabs nav-fill" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="group-create-details-tab" data-toggle="tab" href="#group-create-details" role="tab" aria-controls="group-create-details" aria-selected="true">Details</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="group-add-members-tab" data-toggle="tab" href="#group-add-members" role="tab" aria-controls="group-add-members" aria-selected="false">Add Member</a>
                            </li>
                        </ul>

                        <div class="modal-body">
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="group-create-details" role="tabpanel">

                                    <h6>General Details</h6>
                                    <div class="form-group row align-items-center">
                                        <label class="col-3">Name</label>
                                        <input class="form-control col" type="text" placeholder="Group name" name="group-name" required/>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-3">Description</label>
                                        <textarea class="form-control col" rows="3" placeholder="Group description" name="group-description"></textarea>
                                    </div>

                                    <hr>

                                    <h6>Timeline</h6>
                                    <div class="form-group row align-items-center">
                                        <label class="col-3">Start Date</label>
                                        <input class="form-control col" id="startDate" type="text" name="group-start" placeholder="Select a date" data-alt-input="true" />
                                    </div>

                                    <div class="form-group row align-items-center">
                                        <label class="col-3">Due Date</label>
                                        <input class="form-control col" id="dueDate" type="text" name="group-due" placeholder="Select a date" data-alt-input="true" />
                                    </div>

                                    <div class="alert alert-warning text-small" role="alert">
                                        <span>You can change due dates at any time.</span>
                                    </div>

                                    <hr>

                                    <h6>Visibility</h6>
                                    <div class="row">
                                        <div class="col">
                                            <div class="custom-control custom-radio">
                                                <input value="1" type="radio" id="visibility-everyone" name="visibility" class="custom-control-input">
                                                <label  class="custom-control-label" for="visibility-everyone" >Everyone</label>
                                            </div>
                                        </div>

                                        <div class="col">
                                            <div class="custom-control custom-radio">
                                                <input value="2" type="radio" id="visibility-members" name="visibility" class="custom-control-input" checked>
                                                <label class="custom-control-label" for="visibility-members">Members</label>
                                            </div>
                                        </div>

                                        <div class="col">
                                            <div class="custom-control custom-radio">
                                                <input value="3" type="radio" id="visibility-me" name="visibility" class="custom-control-input">
                                                <label class="custom-control-label" for="visibility-me">Just me</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="group-add-members" role="tabpanel">
                                    <div class="users-manage" data-filter-list="form-group-users">

                                        <div class="mb-3">

                                            <div class="form-group row">
{{--                                                <input type="text" class="form-controller" id="search" name="search"></input>--}}
                                                <textarea class="form-control col" rows="3" placeholder="Add users by email, each email separated by commas&#10;e.g: matt@dtu.edu.com, joe@edu.dtu.com" id="search" name="search"></textarea>
                                            </div>
                                            <table id="table-popup" class="table table-bordered table-hover display-none" >
                                                <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Student ID</th>

                                                </tr>
                                                </thead>
                                                <tbody    id="test" >
                                                </tbody>
                                            </table>
                                            <div class="row align-items-center">
                                                <div class="col">
                                                    <button type="button" class="btn btn-outline-primary"><i class="fad fa-user-plus"></i>Add</button><span> &ensp; or &ensp; </span>
                                                    <button type="button" class="btn btn-chartjs"><i class="fad fa-upload"></i>Using CSV</button>
                                                </div>
                                                <div class="d-none d-md-block col-4 col-lg-5 text-right">
                                                        <a href="#"><i class="fad fa-download"></i>Download .CSV Sample</a>
                                                </div>
                                            </div>
                                            <div class="row align-items-center mt-2">
                                                <div class="d-block d-md-none d-sm-block ml-2">
                                                    <a href="#"><i class="fad fa-download"></i>Download .CSV Sample</a>
                                                </div>
                                            </div>

                                        </div>
                                        <hr>
                                        <h6>Member info</h6>
                                        <div class="row justify-content-center">
                                            <div class="table-responsive mt-3">

                                                <table id="example" class="stripe" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th></th>
                                                            <th class="text-left">Full name</th>
                                                            <th class="text-left">Email</th>
                                                            <th class="text-left">Student ID</th>

                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                        <tr>
                                                            <td></td>
                                                            <td class="text-left">Nguyễn Văn Quỳnh</td>
                                                            <td class="text-left">qnv164@gmail.com</td>
                                                            <td class="text-left">123456789</td>

                                                            <td>
                                                                <a href="#"><span class="ic-dark"><i class="fad fa-trash-alt"></i></span></a>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <th></th>
                                                            <th class="text-left">Full name</th>
                                                            <th class="text-left">Email</th>
                                                            <th class="text-left">Student ID</th>

                                                            <th>Action</th>
                                                        </tr>
                                                    </tfoot>
                                                </table>

                                            </div>
                                            <!-- end div table responsive -->
                                        </div>
                                        <!-- end div row -->

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end of modal body-->
                        <div class="modal-footer">
                            <button role="button" class="btn btn-primary" type="submit">
                                Create
                            </button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <!-- end div container -->

@endsection

@section('script')

    <script>
        $("#startDate").flatpickr({
            defaultDate: "today",
        });

        $("#dueDate").flatpickr({
            defaultDate: new Date().fp_incr(91)
        });

    </script>



    <script >
        $('#search').on('keyup',function(){
            $value=$(this).val();
            if($value !== '' && $value !== null){
                $('#table-popup').removeClass('display-none');
                $.ajax({
                    type : 'get',
                    url : '{{url('admin/search')}}',
                    data:{'search':$value},//  data:{id}
                    success:function(data){
                        var output = '';
                        data.forEach(student => {
                            output+= `<tr onclick="onSubmitStudent('${student.student_id}')">`+
                            `<td>${student.full_name}</td>`+
                            `<td>${student.student_id}</td>`+
                            "</tr>"
                        })
                        $('#test').html(output);
                        console.log(output);
                    }
                });
            }else{
               $('#table-popup').addClass('display-none');
            }

        })
        //post student by ID
        //ajax post
        var onSubmitStudent = (id) => {
            console.log(id);
            $.ajax({
                type:'POST',
                url:'{{url('admin/ajaxRequest')}}',
                data:{student_id:id},
                success:function(data){
                    var output = '';
                    data.forEach( nameStudent => {
                        output+= `<p ${nameStudent.student_id}>`+

                            "</p>"
                    })
                    $('tbody').html(output);
                    console.log(output);
                }
            });
        }
    </script>
    <script >
        $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

@endsection


