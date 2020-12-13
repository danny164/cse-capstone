@extends('layouts.master')
@section('title', 'Control Panel')
@section('content')

    <div class="breadcrumb-bar navbar bg-white sticky-top">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a>
                </li>
                <li class="breadcrumb-item"><a href="{{ url('admin') }}">Control Panel</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Add Users</li>
            </ol>
        </nav>

        <a href="{{ url('admin/control/users') }}"><h6 class="modal-title text-table"><i class="fad fa-angle-left"></i>Back</h6></a>

    </div>

    <!-- begin a container -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-11">
                <div class="mt-3">
                    <h3>Add user</h3>
                    <hr>
                    <form>

                        <div class="form-group row align-items-center">
                            <label class="col-3">Full name</label>
                            <div class="col">
                                <input type="text" placeholder="Enter Your full name" value="" name="full-name" class="form-control" autofocus />
                            </div>
                        </div>

                        <div class="form-group row align-items-center">
                            <label class="col-3">Email</label>
                            <div class="col">
                                <input type="text" placeholder="Enter Your email" value="" name="email" class="form-control" />
                            </div>
                        </div>

                        <div class="form-group row align-items-center">
                            <label class="col-3">Password</label>
                            <div class="col">
                                <input type="password" placeholder="Enter password" name="password-new" class="form-control" />
                            </div>
                        </div>

                        <div class="form-group row align-items-center">
                            <label class="col-3">Confirm Password</label>
                            <div class="col">
                                <input type="password" placeholder="Confirm your password" name="password-new-confirm" class="form-control" />
                            </div>
                        </div>

                        <div class="form-group row align-items-center">
                            <label class="col-3">User Level</label>
                            <div class="col">
                                <select name="user-role" class="form-control">
                                    <option>Admin</option>
                                    <option>Mentor</option>
                                    <option selected>Student</option>
                                </select>
                            </div>
                        </div>

                        <div class="row align-items-center">
                            <div class="col text-right">
                                <span>
                                    <button role="button" class="btn btn-primary" type="submit">
                                        Update
                                    </button>
                                </span>
                                <span class="mx-2">
                                    <button role="button" class="btn btn-outline-secondary" type="reset">
                                        Reset
                                    </button>
                                </span>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- end div container -->

@endsection

