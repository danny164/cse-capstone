@extends('layouts.master')

@section('content')

    <div class="breadcrumb-bar navbar bg-white sticky-top">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a>
                </li>
                <li class="breadcrumb-item"><a href="{{ url('admin/groups') }}">Semesters</a>
                </li>
                <li class="breadcrumb-item"><a href="{{ url('#') }}">Tên Semesters</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Tên Team</li>
            </ol>
        </nav>

        <div class="dropdown">
            <button class="btn btn-round" role="button" data-toggle="dropdown" aria-expanded="false">
                <i class="material-icons">settings</i>
            </button>
            <div class="dropdown-menu dropdown-menu-right">

                <a class="dropdown-item" href="{{ url('admin/edit-team') }}">Edit Team</a>
                <a class="dropdown-item" href="{{ url('#') }}">Share</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item text-chartjs" href="#"><i class="fad fa-lock"></i>Close Team</a>

            </div>
        </div>
    </div>
    <!-- end breadcrumb -->


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

    <script>
        $(document).ready(function(){
            $(".check").click(function(){
                $(".custom-control-input").prop("checked", true);
            });
            $(".uncheck").click(function(){
                $(".custom-control-input").prop("checked", false);
            });
        });
    </script>


@endsection

