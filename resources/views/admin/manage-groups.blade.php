@extends('layouts.master')
@section('title', 'Group Management')
@section('content')

    <div class="breadcrumb-bar navbar bg-white sticky-top">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a>
                </li>
                <li class="breadcrumb-item"><a href="{{ url('admin/groups') }}">Groups</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Group Management</li>
            </ol>
        </nav>

        <a href="#"><button class="btn btn-chartjs btn-sm"><i class="far fa-lock-alt"></i>Close All Groups</button></a>
    </div>
    <!-- end breadcrumb -->

    <!-- begin a container -->
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col mt-3">
                <div class="row content-list-head">
                    <div class="col-auto">
                        <h3>Group Management</h3>
                    </div>
                </div>
                <!--end of content list head-->

                <div class="table-responsive mt-3">

                    <table id="example" class="stripe" style="width:100%">
                        <thead>
                            <tr>
                                <th></th>
                                <th class="text-left">Group Name</th>
                                <th>Start Date</th>
                                <th>Due Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                                <td class="text-left">Almost before we knew it, we had left the ground. #6C757D</td>
                                <td>05/10/2020</td>
                                <td>05/11/2021</td>
                                <td><a href="#"><span class="ic-dark"><i class="fad fa-check"></i></span></a></td>
                                <td>
                                    <a href="{{ url('admin/edit-group') }}"><span class="ic-dark"><i class="fad fa-pencil"></i></span></a>
                                    <a href="#"><span class="ic-dark"><i class="fad fa-trash-alt"></i></span></a>
                                    <a href="{{ url('admin/group-details') }}"><span class="ic-dark"><i class="fad fa-eye"></i></span></a>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td class="text-left">Almost before we knew it, we had left the ground. #6C757D</td>
                                <td>05/10/2020</td>
                                <td>05/11/2021</td>
                                <td><a href="#"><span class="ic-dark"><i class="fad fa-lock"></i></span></a></td>
                                <td>
                                    <a href="#"><span class="ic-dark"><i class="fad fa-pencil"></i></span></a>
                                    <a href="#"><span class="ic-dark"><i class="fad fa-trash-alt"></i></span></a>
                                    <a href="#"><span class="ic-dark"><i class="fad fa-eye"></i></span></a>
                                </td>
                            </tr>

                        </tbody>
                        <tfoot>
                            <tr>
                                <th></th>
                                <th class="text-left">Group Name</th>
                                <th>Start Date</th>
                                <th>Due Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>

                </div>
                <!-- end div table responsive -->

                <!-- member -->
                {{-- <div class="card card-team mb-2">
                    <div class="progress">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 20%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div class="card-body">
                        <div class="dropdown card-options">
                            <button class="btn-options" type="button" id="..." data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="material-icons">more_vert</i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#group-edit-modal">Edit Group</a>
                                <a class="dropdown-item" href="#">Share</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item text-chartjs" href="#"><i class="fas fa-lock-alt"></i>Close Group</a>
                            </div>
                        </div>
                        <div class="card-title">
                            <a href="{{ url('admin/group-details') }}">
                                <h5>Đợt Capstone 1 MIS 2020</h5>
                            </a>
                            <span>37 Teams, 148 Members</span>
                        </div>
                        <ul class="avatars">
                            <li>
                                <a href="#" data-toggle="tooltip" data-placement="top" title="Lý Hiện">
                                    <img alt="Lý Hiện" class="avatar" src="{{ url('assets/img/avatar-gun.jpg') }}" />
                                </a>
                            </li>
                            <li>
                                <a href="#" data-toggle="tooltip" data-placement="top" title="Ngọc Trinh">
                                    <img alt="Ngọc Trinh" class="avatar" src="{{ url('assets/img/avatar-ngoc-trinh.jpg') }}" />
                                </a>
                            </li>
                            <li>
                                <a href="#" data-toggle="tooltip" data-placement="top" title="Tống Uy Long">
                                    <img alt="Tống Uy Long" class="avatar" src="{{ url('assets/img/avatar-tong-uy-long.jpg') }}" />
                                </a>
                            </li>
                            <li>
                                <a href="#" data-toggle="tooltip" data-placement="top" title="Lý Hiện">
                                    <img alt="Lý Hiện" class="avatar" src="{{ url('assets/img/avatar-gun.jpg') }}" />
                                </a>
                            </li>
                            <li>
                                <a href="#" data-toggle="tooltip" data-placement="top" title="Sơn Tùng MTP">
                                    <img alt="Sơn Tùng MTP" class="avatar" src="{{ url('assets/img/avatar-sontung-mtp.jpg') }}" />
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
                </div> --}}
            </div>
            <!-- end div col -->
        </div>
        <!-- end div row -->
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

    <script>

        $(document).ready(function() {
            var table = $('#example').DataTable({
                'columnDefs': [
                    {
                        'targets': 0,
                        'checkboxes': {
                            'selectRow': true
                        }
                    },
                    {
                        'targets': 4,
                        'orderable': false
                    },
                    {
                        'targets': 5,
                        'orderable': false
                    },
                ],
                'select': {
                    'style': 'multi'
                },
                'order': [[1, 'asc']]
            });

        });
    </script>

    <script>

        $(document).ready(function() {
            var table = $('#popup').DataTable({
                'columnDefs': [
                    {
                        'targets': 0,
                        'checkboxes': {
                            'selectRow': true
                        }
                    }
                ],
                'select': {
                    'style': 'multi'
                },
                'order': [[1, 'asc']]
            });

        });
    </script>

@endsection
