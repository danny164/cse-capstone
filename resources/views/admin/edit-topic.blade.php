@extends('layouts.master')
@section('title', 'Edit Topic')
@section('content')
    <div class="breadcrumb-bar navbar bg-white sticky-top">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a>
                </li>
                <li class="breadcrumb-item"><a href="{{ url('admin/topics') }}">Topics</a>
                </li>
                <li class="breadcrumb-item"><a href="{{ url('#') }}">Tên Topic</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Edit</li>
            </ol>
        </nav>

        <a href="{{ url('#') }}"><h6 class="modal-title text-table"><i class="fad fa-angle-left"></i>Back</h6></a>
    </div>

    <!-- begin a container -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-11 col-xl-10">

                <form class="mt-3">
                    <div class="modal-content">
                        <div class="modal-header bg-primary">
                            <h5 class="modal-title">Edit Topic</h5>
                        </div>
                        <!--end of modal head-->
                        <div class="modal-body">
                            <div class="form-group row align-items-center">
                                <label class="col-2">Title</label>
                                <input class="form-control col" type="text" placeholder="Title in English" name="english-title" required />
                            </div>
                            <div class="form-group row align-items-center">
                                <label class="col-2"></label>
                                <input class="form-control col" type="text" placeholder="Title in Vietnamese" name="vietnamese-title" required />
                            </div>
                            <div class="form-group row align-items-center">
                                <label class="col-2"></label>
                                <input class="form-control col" type="text" placeholder="Initial Title" name="initial-title" required />
                            </div>
                            <div class="form-group row">
                                <label class="col-2">Description</label>
                                <textarea class="form-control col" rows="10" placeholder="Write something here..." name="note-description" required ></textarea>
                            </div>
                            <div class="form-group row align-items-center">
                                <label class="col-2">Group</label>
                                <select name="groups" class="form-control col" required>
                                    <option selected>Group 2</option>
                                    <option>Group 1</option>
                                </select>
                            </div>
                            <div class="form-group row">
                                <label class="col-2">Team</label>
                                <select name="groups" class="form-control col">
                                    <option selected>-- Select One (Optional) --</option>
                                    <option>Team 7</option>
                                    <option>Team 8</option>
                                    <option>Team 9</option>
                                </select>
                            </div>

                        </div>
                        <!--end of modal body-->
                        <div class="modal-footer">
                            <button role="button" class="btn btn-primary" type="submit">
                            Post
                            </button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <!-- end div container -->

@endsection
