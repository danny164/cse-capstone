@extends('layouts.master')
@section('title', 'Admin Page')
@section('content')

    <!-- begin a container -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-11 col-xl-10">

                <div class="tab-content mt-3">
                    <div class="tab-pane fade show active" id="task" role="tabpanel">

                        <div class="content-list" data-filter-list="content-list-body">
                            <div class="row content-list-head">
                                <div class="col-auto">
                                    <h3>Announcements</h3>
                                    <button class="btn btn-round" data-toggle="modal" data-target="#note-add-modal">
                                        <i class="material-icons">add</i>
                                    </button>
                                </div>
                                <form class="col-md-auto">
                                    <div class="input-group input-group-round">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="material-icons">filter_list</i>
                                            </span>
                                        </div>
                                        <input type="search" class="form-control filter-list-input" placeholder="Filter notes" aria-label="Filter notes">
                                    </div>
                                </form>
                            </div>
                            <!-- end of content list head-->
                            @if (session('success_message'))
                                {{ session('success_message') }}
                            @endif
                            <div class="content-list-body">
                                @foreach( $manage_announcements  as $key => $cate_pro)
                                    <div class="card card-note">
                                        <div class="card-header">
                                            <div class="media align-items-center text-break">
                                                @foreach($all_use  as $key => $value)
                                                    @if($value->id == $cate_pro->user_id)
                                                <img  src="{{ URL::to('public/uploads/'.$value->avatar_path) }}" class="avatar" data-toggle="tooltip" data-title="{{ ($value-> full_name)}}" data-filter-by="alt" />
                                                    @endif
                                                @endforeach
                                                <div class="media-body">
                                                    <h6 class="mb-0 text-danger" data-filter-by="text">{{ Str::limit($cate_pro->title, 200) }}</h6>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center flex-shrink-0">
                                                <span data-filter-by="text">{{ Carbon\Carbon::parse($cate_pro->created_at)->diffForHumans() }}</span>
                                                <div class="ml-1 dropdown card-options">
                                                    <button class="btn-options" type="button" id="note-dropdown-button-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="material-icons">more_vert</i>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="{{URL::to('/admin/announcements/'.$cate_pro->id.'/edit')}}">Edit</a>
                                                        <a class="dropdown-item text-chartjs" onclick="return confirm('Are you sure to delete?')"href="{{URL::to('/admin/announcements/'.$cate_pro->id.'/delete')}}">Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body" data-filter-by="text">
                                        {{ $cate_pro->content }}
                                        <!--
                                            <div class="media media-attachment">
                                                <div class="text-primary">
                                                        <i class="material-icons">attach_file</i>
                                                </div>
                                                <div class="media-body">
                                                    <a href="#" data-filter-by="text">Template Proposal.docx</a>
                                                <span data-filter-by="text">24kb Document</span>
                                            </div>
                                            -->
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                        </div>
                        <!-- end of content list-->
                    </div>
                    <!-- end of tab-->
                </div>

                <!-- Tạo Thông báo -->
                <form class="modal fade" id="note-add-modal" tabindex="-1" aria-hidden="true" method="POST" action="{{ url('admin/announcements/home/save/'.Auth::user()->id) }}">
                    {{csrf_field()}}
                    <div class="modal-dialog modal-lg" role="document" >
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Create an Announcement</h5>
                                <button type="button" class="close btn btn-round" data-dismiss="modal" aria-label="Close">
                                    <i class="material-icons">close</i>
                                </button>
                            </div>
                            <!--end of modal head-->
                            <div class="modal-body">
                                <div class="form-group row align-items-center">
                                    <label class="col-3">Title</label>
                                    <input class="form-control col" type="text" placeholder="Title" name="title" />
                                </div>
                                <div class="form-group row">
                                    <label class="col-3">Content</label>
                                    <textarea class="form-control col" rows="10" placeholder="Write something here..." name="content"></textarea>
                                </div>
                                <hr>
                                <h6>Visibility</h6>
                                <div class="row">
                                    <div class="col">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="visibility-everyone" name="visibility" class="custom-control-input" checked value="1">
                                            <label class="custom-control-label" for="visibility-everyone" >Everyone</label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="visibility-members" name="visibility" class="custom-control-input" value="2">
                                            <label class="custom-control-label" for="visibility-members" value="2">Members</label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="visibility-me" name="visibility" class="custom-control-input"value="3">
                                            <label class="custom-control-label" for="visibility-me">Just me</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end of modal body-->
                            <div class="modal-footer">
                                <button role="button" class="btn btn-primary" type="submit">Post</button>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- End Tạo Thông báo -->

            </div>
        </div>
    </div>
    <!-- end div container -->

@endsection
