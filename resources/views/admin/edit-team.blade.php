@extends('layouts.master')
@section('title', 'Edit Team')

@section('content')

    <div class="breadcrumb-bar navbar bg-white sticky-top">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a>
                </li>
                <li class="breadcrumb-item"><a href="{{ url('admin/groups') }}">Groups</a>
                </li>
                <li class="breadcrumb-item"><a href="#">Tên Group</a>
                </li>
                <li class="breadcrumb-item"><a href="#">Tên Team</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Edit</li>
            </ol>
        </nav>

        <a href="{{ url('#') }}"><h6 class="modal-title text-table"><i class="fad fa-angle-left"></i>Back</h6></a>

    </div>
    <!-- end breadcrumb -->

    <!-- begin a container -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-11 col-xl-10">

                <form class="mt-3">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">New Team</h5>
                        </div>
                        <!--end of modal head-->

                        <ul class="nav nav-tabs nav-fill" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="team-add-details-tab" data-toggle="tab" href="#team-add-details" role="tab" aria-controls="team-add-details" aria-selected="true">Details</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="team-add-members-tab" data-toggle="tab" href="#team-add-members" role="tab" aria-controls="team-add-members" aria-selected="false">Members</a>
                            </li>
                        </ul>

                        <div class="modal-body">
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="team-add-details" role="tabpanel">

                                    <h6>General Details</h6>
                                    <div class="form-group row align-items-center">
                                        <label class="col-3">Name</label>
                                        <input class="form-control col" type="text" placeholder="Team name" name="team-name" />
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-3">Description</label>
                                        <textarea class="form-control col" rows="3" placeholder="Write something here..." name="team-description"></textarea>
                                    </div>

                                    <hr>

                                    <h6>Visibility</h6>
                                    <div class="row">
                                        <div class="col">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="visibility-everyone" name="visibility" class="custom-control-input">
                                                <label class="custom-control-label" for="visibility-everyone">Everyone</label>
                                            </div>
                                        </div>

                                        <div class="col">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="visibility-members" name="visibility" class="custom-control-input" checked>
                                                <label class="custom-control-label" for="visibility-members">Members</label>
                                            </div>
                                        </div>

                                        <div class="col">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="visibility-me" name="visibility" class="custom-control-input">
                                                <label class="custom-control-label" for="visibility-me">Just me</label>
                                            </div>
                                        </div>
                                    </div>

                                    <hr>

                                    <h6>Status</h6>
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="status-active" name="status" class="custom-control-input" checked>
                                                <label class="custom-control-label" for="status-active">Active</label>
                                            </div>
                                        </div>

                                        <div class="col-4">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="status-disable" name="status" class="custom-control-input">
                                                <label class="custom-control-label" for="status-disable">Disable</label>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="tab-pane fade" id="team-add-members" role="tabpanel">
                                <div class="users-manage" data-filter-list="form-group-users">
                                    <div class="mb-3">
                                        <ul class="avatars text-center">
                                            <li>
                                                <a href="#" data-toggle="tooltip" data-placement="top" title="Lý Hiện">
                                                    <img alt="Lý Hiện" class="avatar" src="{{ asset('assets/img/avatar-gun.jpg') }}" />
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" data-toggle="tooltip" data-placement="top" title="Ngọc Trinh">
                                                    <img alt="Ngọc Trinh" class="avatar" src="{{ asset('assets/img/avatar-ngoc-trinh.jpg') }}" />
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" data-toggle="tooltip" data-placement="top" title="Lý Hiện">
                                                    <img alt="Tống Uy Long" class="avatar" src="{{ asset('assets/img/avatar-tong-uy-long.jpg') }}" />
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" data-toggle="tooltip" data-placement="top" title="Lý Hiện">
                                                    <img alt="Lý Hiện" class="avatar" src="{{ asset('assets/img/avatar-gun.jpg') }}" />
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" data-toggle="tooltip" data-placement="top" title="Lý Hiện">
                                                    <img alt="Sơn Tùng MTP" class="avatar" src="{{ asset('assets/img/avatar-sontung-mtp.jpg') }}" />
                                                </a>
                                            </li>

                                        </ul>
                                    </div>
                                    <hr>
                                    <div class="row justify-content-center">
                                        <div class="table-responsive mt-3">

                                            <table id="new-team" class="stripe" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th></th>
                                                        <th class="text-left">Full name</th>
                                                        <th class="text-left">Email</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <tr>
                                                        <td></td>
                                                        <td class="text-left">Nguyễn Văn Quỳnh</td>
                                                        <td class="text-left">qnv164@gmail.com</td>
                                                        <td>
                                                            <a href="#"><span class="ic-dark"><i class="fad fa-user-plus"></i></span></a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th></th>
                                                        <th class="text-left">Full name</th>
                                                        <th class="text-left">Email</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </tfoot>
                                            </table>

                                        </div>
                                        <!-- end div table responsive -->
                                    </div>
                                    <!-- end div row -->

                                </div>
                                </div>
                            </div>
                        </div>
                        <!--end of modal body-->

                        <div class="modal-footer">
                            <button role="button" class="btn btn-primary" type="submit">
                                Create Team
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

    <script>
        // $(document).ready(function() {
        //     $('#example').DataTable({

        //     });
        // });

        $(document).ready(function() {
            var table = $('#new-team').DataTable({
                'columnDefs': [
                    {
                        'targets': 0,
                        'checkboxes': {
                            'selectRow': true
                        }
                    },
                    {
                        'targets': 3,
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

@endsection
