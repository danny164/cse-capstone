@extends('layouts.master')
@section('title', 'Control Panel')
@section('content')

    <div class="breadcrumb-bar navbar bg-white sticky-top">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Control Panel</li>
            </ol>
        </nav>

        <a href="{{ url('admin/control/users/add') }}"><button class="btn btn-outline-primary"><i class="fad fa-user-plus"></i>Add Users</button></a>


    </div>

    <!-- begin a container -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <div class="mt-3">
                    <h3>User List</h3>
                    <hr>

                </div>
            </div>
        </div>
    </div>
    <!-- end div container -->

@endsection

