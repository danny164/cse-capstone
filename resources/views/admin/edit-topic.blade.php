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
                                <input class="form-control col" type="text" placeholder="Title in English" name="english_title" required />
                            </div>
                            <div class="form-group row align-items-center">
                                <label class="col-2"></label>
                                <input class="form-control col" type="text" placeholder="Title in Vietnamese" name="vietnamese_title" required />
                            </div>
                            <div class="form-group row align-items-center">
                                <label class="col-2"></label>
                                <input class="form-control col" type="text" placeholder="Initial Title" name="initial_title" required />
                            </div>
                            <div class="form-group row">
                                <label class="col-2">Description</label>
                                <textarea class="form-control col" rows="10" placeholder="Write something here..." name="description" required ></textarea>
                            </div>
                            <div class="form-group row align-items-center">
                                <label class="col-2">Semester</label>
                                <select name="semesters" class="form-control col" required>
                                    <option value="">Choose...</option>
                                    <option value="1">Semester 1</option>
                                </select>
                            </div>
                            <div class="form-group row">
                                <label class="col-2">Team</label>
                                <select name="teams" class="form-control col">
                                    <option value="">Choose...</option>
                                    <option value="1">Team 7</option>
                                    <option value="2">Team 8</option>
                                    <option value="3">Team 9</option>
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
