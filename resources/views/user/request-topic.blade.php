@extends('layouts.master')
@section('title')
@section('content')

    <div class="breadcrumb-bar navbar bg-white sticky-top">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a>
                </li>
                <li class="breadcrumb-item"><a href="{{ url('#') }}">Topics</a>
                </li>
                <li class="breadcrumb-item active"><a href="{{ url('#') }}">Request Topic</a>
                </li>
            </ol>
        </nav>

    </div>
    <!-- end breadcrumb -->

    <!-- begin a container -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-11 col-xl-10">

                <form class="mt-3">
                    <div class="modal-content">
                        <div class="modal-header bg-primary">
                            <h5 class="modal-title">Create a Topic</h5>
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
                                <label class="col-2">Semester</label>
                                <select name="groups" class="form-control col" required>
                                    <option selected>Choose...</option>
                                    <option value="">Semester 9</option>
                                </select>
                            </div>
                            <div class="form-group row">
                                <label class="col-2">Team</label>
                                <select name="groups" class="form-control col">
                                    <option selected>Choose...</option>
                                    <option value="">Team 7</option>
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

@section('script')

    <script>
        $("#startDate").flatpickr({
            defaultDate: "today",
        });

        $("#dueDate").flatpickr({
            defaultDate: new Date().fp_incr(91)
        });

    </script>

@endsection

