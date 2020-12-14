@extends('layouts.master')

@section('content')

    <div class="breadcrumb-bar navbar bg-white sticky-top">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a>
                </li>
                <li class="breadcrumb-item"><a href="{{ url('admin') }}">Announcements</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">New Announcement</li>
            </ol>
        </nav>
    </div>
    <!-- end breadcrumb -->
    @if (session('success_message'))
        {{ session('success_message') }}
    @endif
    <!-- begin a container -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-11 col-xl-10">

            <form class="mt-3" method="POST" action="{{ url('admin/announcements/save/'.Auth::user()->id) }}">
            {{csrf_field()}}

                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Create an Announcement</h5>
                    </div>
                    <!--end of modal head-->
                    <div class="modal-body">
                        <div class="form-group row align-items-center">
                            <label class="col-3">Title</label>
                            <input class="form-control @error('title') is-invalid @enderror col" type="text" value="{{ old('title') }}" placeholder="Title" name="title" autofocus/>
                        </div>
                        <div class="form-group row">
                            <label class="col-3">Content</label>
                            <textarea class="form-control @error('content') is-invalid @enderror col" rows="10" placeholder="Write something here..." name="content">{{ old('content') }}</textarea>
                        </div>
                        <hr>
                        <h6>Visibility</h6>
                        <div class="row">
                            <div class="col">
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="visibility-everyone" name="visibility" class="custom-control-input" checked value="1">
                                    <label class="custom-control-label" for="visibility-everyone">Everyone</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="visibility-members" name="visibility" class="custom-control-input" value="2">
                                    <label class="custom-control-label" for="visibility-members">Members</label>
                                </div>
                            </div>
                            <div class="col">
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="visibility-me" name="visibility" class="custom-control-input" value="3">
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
            </form>

          </div>
        </div>
    </div>
    <!-- end div container -->

@endsection
