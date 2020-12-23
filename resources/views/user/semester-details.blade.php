@extends('layouts.master')
@section('title')
@section('content')

    <div class="breadcrumb-bar navbar bg-white sticky-top">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a>
                </li>
                <li class="breadcrumb-item active"><a href="{{ url('#') }}">Semesters</a>
                </li>
            </ol>
        </nav>

    </div>
    <!-- end breadcrumb -->

    <!-- begin a container -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-11 col-xl-10">

                <div class="page-header">
                    <h2>Capstone 1/12/2020</h2>
                    <p class="lead">Write something here...</p>
                    <div class="d-flex align-items-center">
                        <ul class="avatars">
                            <li>
                                <a href="#" data-toggle="tooltip" data-placement="top" title="Nguyễn Đức Mận">
                                    <img alt="Nguyễn Đức Mận" class="avatar" src="{{ asset('assets/img/avatar-man.png') }}" />
                                </a>
                            </li>

                        </ul>
                    </div>
                </div>

                <hr>

                <div class="content-list mt-3">
                    <div class="content-list-body row">

                        <div class="col">
                            <div class="card card-project">

                                <div class="progress">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 100%"></div>
                                </div>

                                <div class="card-body">

                                    <div class="dropdown card-options">
                                        <a class="dropdown-item text-chartjs" href="{{ url('#') }}"><i class="fad fa-sign-out"></i>Leave</a>
                                    </div>

                                    <div class="card-title">
                                        <a href="#">
                                            <h5 data-filter-by="text">Tên Team ở đây</h5>
                                        </a>
                                    </div>

                                    <ul class="avatars">

                                        <li>
                                            <a href="#" data-toggle="tooltip" data-placement="top" title="Nguyễn Đức Mận">
                                                <img alt="Nguyễn Đức Mận" class="avatar" src="{{ asset('assets/img/avatar-man.png') }}" />
                                            </a>
                                        </li>

                                    </ul>

                                    <div class="card-meta d-flex justify-content-between">
                                        <div class="d-flex align-items-center">
                                            <i class="material-icons mr-1">playlist_add_check</i>
                                            <span class="text-small">6/10</span>
                                        </div>
                                        <span class="text-small" data-filter-by="text">#</span>
                                    </div>

                                </div>
                            </div>
                            <!-- end card project -->
                        </div>

                    </div>
                    <!--end of content list body-->
                </div>

            </div>
        </div>
    </div>
    <!-- end div container -->

</div>
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

