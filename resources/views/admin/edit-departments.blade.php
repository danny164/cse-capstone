@extends('layouts.master')

@section('content')
<div class="main-container">
    
    <div class="breadcrumb-bar navbar bg-white sticky-top">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a>
                </li>
                <li class="breadcrumb-item"><a href="#">Departments</a>
                </li>
                @foreach($edit_departments as $key => $cate_pro)

                <li class="breadcrumb-item"><a href="#">{{ Str::limit($cate_pro->department_name, 19,'...') }}</a></li>
                @endforeach

                <li class="breadcrumb-item active" aria-current="page">Edit</li>

            </ol>
        </nav>
    </div>
    @if (session('success_message'))
        {{ session('success_message') }}
    @endif

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-11 col-xl-10">
            @foreach($edit_departments as $key => $cate_pro)

                <form class="mt-3"method="post" action="{{ url('admin/departments/management/'.$cate_pro->id.'/update') }}">
                {{csrf_field()}}
               
                    <div class="modal-content">
                        <div class="modal-header bg-primary">
                            <h5 class="modal-title">Edit a Department</h5> 
                        </div>
                        <!--end of modal head-->
                        <div class="modal-body">
                            
                            <div class="form-group row align-items-center">
                                <label class="col-2">Department</label>
                               
                                <input class="form-control col" type="text" value="{{$cate_pro->department_name}}" name="department_name" required />
                                
                            </div>
                           
                            <div class="form-group row align-items-center">
                                <label class="col-2">Faculty</label>
                                <select  name="faculty_id" class="form-control col" required>
                                @foreach($faculties as $key => $value)
                                    @if($value->id == $cate_pro->faculty_id)
                                    <option  value="{{$value->id}}"selected>{{$value->faculty_name}}</option>
                                    @else
                                    <option value="{{$value->id}}">{{$value->faculty_name}}</option>
                                    @endif
                                    
                                @endforeach

                                </select>
                            </div>
                            
                            
                            <div class="form-group row">
                                <label class="col-2">Description</label>

                                <textarea class="form-control col" rows="10" name="description" required >{{$cate_pro->description}}</textarea>
                            </div>
                        
                        </div>
                        <!--end of modal body-->
                        <div class="modal-footer">
                            <button role="button" class="btn btn-primary" type="submit">
                                Done
                            </button>
                        </div>
                    </div>

                </form>
                @endforeach

            </div>
        </div>
    </div>

</div>





@endsection

