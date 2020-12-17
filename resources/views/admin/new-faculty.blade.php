@extends('layouts.master')

@section('content')

    <div class="breadcrumb-bar navbar bg-white sticky-top">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a>
                </li>
                <li class="breadcrumb-item"><a href="{{ url('admin/faculties') }}">Faculties</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">New Faculty</li>
            </ol>
        </nav>
    </div>
    @if (session('success_message'))
        {{ session('success_message') }}
    @endif

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-11 col-xl-10">

                <form class="mt-3"method="POST" action="{{ url('admin/faculty/new-faculty') }}">
                      {{csrf_field()}}
                    <div class="modal-content">
                        <div class="modal-header bg-primary">
                            <h5 class="modal-title">Create a Faculty</h5>
                        </div>
                        <!--end of modal head-->
                        <div class="modal-body">
                            <div class="form-group row align-items-center"{{ $errors->get('name') ? 'has-error' : '' }}>
                                <label class="col-2">Faculty</label>
                                <input class="form-control col" type="text" placeholder="Faculty name" name="faculty_name"/>
                                @foreach($errors->get('name') as $error)
                                    <span class="help-block">{{ $error }}</span>
                                @endforeach
                            </div>
                            <div class="form-group row">
                                <label class="col-2">Description</label>
                                <textarea class="form-control col" rows="10" placeholder="Write something here..." name="description" ></textarea>
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


@endsection
