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
            <div class="col">

                <div class="mt-3">
                    <!--  -->
                    <div class="card card-team mb-2">
                        <div class="progress">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 100%"></div>
                        </div>
                        <div class="card-body">
                            <div class="dropdown card-options">
                                <a class="dropdown-item text-chartjs" href="{{ url('#') }}"><i class="fad fa-sign-out"></i>Leave</a>
                            </div>
                            <div class="card-title">
                                <a href="{{ url('/semesters/id') }}">
                                    <h5>Tên Kỳ Capstone</h5>
                                </a>
                            </div>
                            <ul class="avatars">
                                <li>
                                    <a href="{{ url('#') }}" data-toggle="tooltip" data-placement="top" title="Lý Hiện">
                                        <img alt="Lý Hiện" class="avatar" src="assets/img/avatar-gun.jpg" />
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('#') }}" data-toggle="tooltip" data-placement="top" title="Ngọc Trinh">
                                        <img alt="Ngọc Trinh" class="avatar" src="assets/img/avatar-ngoc-trinh.jpg" />
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('#') }}" data-toggle="tooltip" data-placement="top" title="Tống Uy Long">
                                        <img alt="Tống Uy Long" class="avatar" src="assets/img/avatar-tong-uy-long.jpg" />
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('#') }}" data-toggle="tooltip" data-placement="top" title="Lý Hiện">
                                        <img alt="Lý Hiện" class="avatar" src="assets/img/avatar-gun.jpg" />
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('#') }}" data-toggle="tooltip" data-placement="top" title="Sơn Tùng MTP">
                                        <img alt="Sơn Tùng MTP" class="avatar" src="assets/img/avatar-sontung-mtp.jpg" />
                                    </a>
                                </li>

                            </ul>
                            <div class="card-meta d-flex justify-content-between mt-2">
                                <div class="d-flex align-self-end">
                                    <i class="fad fa-calendar"></i>
                                    <span class="text-small">24/08/2020 - 05/12/2020</span>
                                </div>
                                <span class="text-small">Due 81 days</span>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- out of content -->

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

