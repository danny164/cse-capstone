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
                <li class="breadcrumb-item active"><a href="{{ url('#') }}">Tên Topic Xem nội dung chi tiết</a>
                </li>
            </ol>
        </nav>

        <a href="{{ url('#') }}"><h6 class="modal-title text-table"><i class="fad fa-angle-left"></i>Back</h6></a>

    </div>
    <!-- end breadcrumb -->

    <!-- begin a container -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-11 col-xl-10">

                <div class="mt-3">
                    <!--  -->
                    <div class="card card-team mb-2">
                        <div class="progress">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 0%"></div>
                        </div>
                        <div class="card-body">
                            <div class="dropdown card-options">
                                <a class="dropdown-item text-chartjs" href="{{ url('#') }}"><i class="fad fa-check"></i>Pick</a>
                            </div>
                            <div class="card-title">
                                <h5>English Title here...</h5>
                                <small>Vietnamese Title here...</small><br/>
                                <small>Initial...</small>
                            </div>
                            <p class="lead">Write something here...</p>
                            <div class="card-meta d-flex justify-content-between mt-2">
                                <div class="d-flex align-self-end text-primary">
                                    <i class="fad fa-calendar-star"></i>
                                    <span class="text-small">01/12/2020</span>&nbsp;&nbsp;
                                    <span class="text-small">#34</span>
                                </div>
                                <a href="#" data-toggle="tooltip" data-placement="top" title="Nguyễn Đức Mận">
                                    <img alt="Nguyễn Đức Mận" class="avatar" src="{{ asset('assets/img/avatar-man.png') }}" />
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- out of content -->

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

