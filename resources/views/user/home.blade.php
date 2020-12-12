{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('User Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}

@extends('layouts.master')
@section('title', 'Home Page')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-11 col-xl-10">

                <div class="tab-content mt-3">
                    <div class="tab-pane fade show active" id="task" role="tabpanel">

                        <div class="content-list" data-filter-list="content-list-body">
                            <div class="row content-list-head">
                                <div class="col-auto">
                                    <h3>Announcements</h3>
                                    <button class="btn btn-round" data-toggle="modal" data-target="#note-add-modal">
                                        <i class="material-icons">add</i>
                                    </button>
                                </div>
                                <form class="col-md-auto">
                                    <div class="input-group input-group-round">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="material-icons">filter_list</i>
                                            </span>
                                        </div>
                                        <input type="search" class="form-control filter-list-input" placeholder="Filter notes" aria-label="Filter notes">
                                    </div>
                                </form>
                            </div>
                            <!-- end of content list head-->

                            {{-- @if (session('success_message'))
                                {{ session('success_message') }}
                            @endif --}}
                            <div class="content-list-body">
                                {{-- @foreach($manage_announcements as $key => $cate_pro) --}}
                                    <div class="card card-note">
                                        <div class="card-header">
                                            <div class="media align-items-center text-break">
                                                <img alt="#" src="{{ asset('assets/img/avatar-man.png') }}" class="avatar" data-toggle="tooltip" data-title="{{ Auth::user()->full_name}}" data-filter-by="alt" />
                                                <div class="media-body">
                                                    <h6 class="mb-0 text-danger" data-filter-by="text">Title</h6>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center flex-shrink-0">
                                                <span data-filter-by="text">Time</span>
                                                <div class="ml-1 dropdown card-options">
                                                    <button class="btn-options" type="button" id="note-dropdown-button-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="material-icons">more_vert</i>
                                                </button>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="#">Edit</a>
                                                        <a class="dropdown-item text-chartjs" onclick="return confirm('Are you sure to delete?')"href="#">Delete</a>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-body" data-filter-by="text">
                                            {{-- {{ $cate_pro->content }} --}}

                                        </div>
                                    </div>
                                {{-- @endforeach --}}
                            </div>

                        </div>
                        <!-- end of content list-->
                    </div>
                    <!-- end of tab-->
                </div>

            </div>
        </div>
    </div>

@endsection

