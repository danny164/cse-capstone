@extends('layouts.master')

@section('content')

    <div class="breadcrumb-bar navbar bg-white sticky-top">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a>
                </li>
                <li class="breadcrumb-item"><a href="{{ url('admin/plans') }}">Plans</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">New Plan</li>
            </ol>
        </nav>
    </div>
    <!-- end breadcrumb -->

    <!-- begin a container -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-11 col-xl-10">
            @foreach($plans as $key => $cate_pro)

                <form class="mt-3" method="post"  action="{{ url('admin/plan/'.$cate_pro->id.'/update-plan') }}" >
                {{csrf_field()}}
                    <div class="modal-content">

                        <div class="modal-header">
                            <h5 class="modal-title">Edit a Plan</h5>
                        </div>

                        <div class="modal-body">
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="document-request" role="tabpanel">

                                    <h6>General Details</h6>
                                    <div class="form-group row align-items-center">
                                        <label class="col-3">Title</label>
                                        <input class="form-control col" type="text" placeholder="Title" name="title" value="{{ $cate_pro->title }}"/>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-3">Description</label>
                                        <textarea class="form-control col" rows="10" name="request-description">{{ $cate_pro->description }}</textarea>
                                    </div>

                                    <hr>
                                    <h6>Season</h6>
                                    <div class="form-group row align-items-center">
                                        <label class="col-3">Season</label>
                                            <select name="semesters" class="form-control col" required>
                                        
                                            @foreach($semesters as $key => $value)

                                                @if($value->is_closed!=1 )
                                                   @if($cate_pro->semester_id == $value->id)

                                                    <option value="{{$value->id}}" selected >{{ ($value->semester_name)}}</option>
                                                    @else
                                                    <option value="{{$value->id}}">{{$value->semester_name}}</option>
                                    
                                                    @endif
                                                @endif

                                             @endforeach

                                            </select>
                                    </div>

                                    <hr>
                                    <h6>Timeline</h6>
                                    <div class="form-group row align-items-center">
                                        <label class="col-3">Start Date</label>
                                        <input class="form-control col" id="startDate" type="text" name="request-start" placeholder="Select a date" data-alt-input="true" data-enable-time="true" value="{{ $cate_pro->start_date }}"/>
                                    </div>

                                    <div class="form-group row align-items-center">
                                        <label class="col-3">Due Date</label>
                                        <input class="form-control col" id="dueDate" type="text" name="request-due" placeholder="Select a date" data-alt-input="true" data-enable-time="true" value="{{ $cate_pro->due_date }}"/>
                                    </div>

                                    <div class="alert alert-warning text-small" role="alert">
                                        <span>You can change due dates at any time.</span>
                                    </div>

                                    <hr>

                                    <h6>Attachments</h6>

                                    <div class="d-none dz-template">
                                        <li class="list-group-item dz-preview dz-file-preview">
                                            <div class="media align-items-center dz-details">
                                                <ul class="avatars">
                                                    <li>
                                                        <div class="avatar bg-primary dz-file-representation">
                                                            <img class="avatar" data-dz-thumbnail />
                                                            <i class="material-icons">attach_file</i>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <img alt="..." src="..." class="avatar" data-title="..." data-toggle="tooltip" />
                                                    </li>
                                                </ul>
                                                <div class="media-body d-flex justify-content-between align-items-center">
                                                    <div class="dz-file-details">
                                                        <a href="#" class="dz-filename"><span data-dz-name></span></a><br>
                                                        <span class="text-small dz-size" data-dz-size></span>
                                                    </div>
                                                    <img alt="Loader" src="assets/img/loader.svg" class="dz-loading" />
                                                    <div class="dropdown">
                                                        <button class="btn-options" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="material-icons">more_vert</i>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item" href="#">Download</a>
                                                            <div class="dropdown-divider"></div>
                                                            <a class="dropdown-item text-danger" href="#" data-dz-remove>Delete</a>
                                                        </div>
                                                    </div>
                                                    <button class="btn btn-danger btn-sm dz-remove" data-dz-remove>
                                                        Cancel
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="progress dz-progress">
                                                <div class="progress-bar dz-upload" data-dz-uploadprogress></div>
                                            </div>
                                        </li>
                                    </div>

                                    <form class="dropzone" action="">
                                        <span class="dz-message">Drop files or click here to upload</span>
                                    </form>
                                    <ul class="list-group list-group-activity dropzone-previews flex-column-reverse">

                                    </ul>


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
                @endforeach
            </div>
        </div>
    </div>
    <!-- end div container -->

@endsection

@section('script')


    <script>

        $("#startDate").flatpickr({
            defaultDate: "today",
            time_24hr: true
        });

        $("#dueDate").flatpickr({
            defaultDate: new Date().fp_incr(7)
        });

    </script>

@endsection

