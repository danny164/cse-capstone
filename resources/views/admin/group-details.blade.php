@extends('layouts.master')
@section('title')
@section('content')

    <div class="breadcrumb-bar navbar bg-white sticky-top">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a>
                </li>
                <li class="breadcrumb-item"><a href="{{ url('admin/groups') }}">Groups</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Almost before we knew it, we had left the ground. #6C757D</li>
            </ol>
        </nav>

        <div class="dropdown">
            <button class="btn btn-round" role="button" data-toggle="dropdown" aria-expanded="false">
                <i class="material-icons">settings</i>
            </button>
            <div class="dropdown-menu dropdown-menu-right">

                <a class="dropdown-item" href="{{ url('admin/new-team') }}">New Team</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ url('admin/groups/edit') }}">Edit Group</a>
                <a class="dropdown-item" href="#">Share</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item text-chartjs" href="#"><i class="fas fa-lock-alt"></i>Close Group</a>

            </div>
        </div>
    </div>
    <!-- end breadcrumb -->

    <!-- begin a container -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">

                <div class="page-header">
                    <h2>Almost before we knew it, we had left the ground. #6C757D</h2>
                    <p class="lead">Write something here...</p>
                    <div class="d-flex align-items-center">
                        <ul class="avatars">
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
                        <button class="btn btn-round" data-toggle="modal" data-target="#member-add-modal">
                            <i class="material-icons">add</i>
                        </button>
                    </div>
                </div>

                <hr>

                <ul class="nav nav-tabs nav-fill" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#projects" role="tab" aria-controls="projects" aria-selected="true">Teams</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#members" role="tab" aria-controls="members" aria-selected="false">Members</a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane fade show active" id="projects" role="tabpanel">
                        <div class="content-list">
                            <div class="row content-list-head">
                                <div class="col-auto">
                                    <h3>Team list</h3>
                                </div>

                            </div>
                            <!-- end of content list head -->

                            <div class="table-responsive mt-3">

                                <table id="team-list" class="stripe" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th class="text-left">Team Name</th>
                                            <th>Mentor</th>
                                            <th>Progress</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td></td>
                                            <td class="text-left">Almost before we knew it, we had left the ground. #6C757D</td>
                                            <td>
                                                <a href="#" data-toggle="tooltip" data-placement="top" title="Nguyễn Đức Mận">
                                                    <img alt="Nguyễn Đức Mận" class="avatar" src="{{ asset('assets/img/avatar-man.png') }}" />
                                                </a>
                                            </td>
                                            <td>3/7</td>
                                            <td><a href="#"><span class="text-success"><i class="fad fa-check"></i></span></a></td>
                                            <td>
                                                <a href="#" data-toggle="modal" data-target="#group-edit-modal"><span class="ic-dark"><i class="fad fa-pencil"></i></span></a>
                                                <a href="#"><span class="ic-dark"><i class="fad fa-trash-alt"></i></span></a>
                                                <a href="{{ url('admin/group-details') }}"><span class="ic-dark"><i class="fad fa-eye"></i></span></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td class="text-left">Almost before we knew it, we had left the ground. #6C757D</td>
                                            <td>
                                                <a href="#" data-toggle="tooltip" data-placement="top" title="Nguyễn Đức Mận">
                                                    <img alt="Nguyễn Đức Mận" class="avatar" src="{{ asset('assets/img/avatar-man.png') }}" />
                                                </a>
                                            </td>
                                            <td>3/7</td>
                                            <td><a href="#"><span class="text-warning"><i class="fad fa-exclamation"></i></span></a></td>
                                            <td>
                                                <a href="#"><span class="ic-dark"><i class="fad fa-pencil"></i></span></a>
                                                <a href="#"><span class="ic-dark"><i class="fad fa-trash-alt"></i></span></a>
                                                <a href="#"><span class="ic-dark"><i class="fad fa-eye"></i></span></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td class="text-left">Almost before we knew it, we had left the ground. #6C757D</td>
                                            <td>
                                                <a href="#" data-toggle="tooltip" data-placement="top" title="Nguyễn Đức Mận">
                                                    <img alt="Nguyễn Đức Mận" class="avatar" src="{{ asset('assets/img/avatar-man.png') }}" />
                                                </a>
                                            </td>
                                            <td>3/7</td>
                                            <td><a href="#"><span class="text-danger"><i class="fad fa-times"></i></span></a></td>
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
                                            <th class="text-left">Team Name</th>
                                            <th>Mentor</th>
                                            <th>Progress</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                </table>

                            </div>
                            <!-- end div table responsive -->


                        </div>
                        <!--end of content list-->
                    </div>
                    <!--end of tab-->

                    <!-- content list member section -->
                    <div class="tab-pane fade" id="members" role="tabpanel">
                        <div class="content-list">

                            <div class="row content-list-head">
                                <div class="col-auto">
                                    <h3>Members</h3>
                                </div>
                            </div>
                            <!--end of content list head-->
                            <div class="row justify-content-center">
                                <div class="table-responsive mt-3">

                                    <table id="show-group-members" class="stripe" style="width:100%">
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
                                                    <a href="#"><span class="ic-dark"><i class="fad fa-trash-alt"></i></span></a>
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
                        <!--end of content list-->
                    </div>
                </div>

                <!-- Add Group Member -->
                <form class="modal fade" id="member-add-modal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Add Members</h5>
                                <button type="button" class="close btn btn-round" data-dismiss="modal" aria-label="Close">
                                    <i class="material-icons">close</i>
                                </button>
                            </div>
                            <!--end of modal head-->
                            <div class="modal-body">
                                <div class="form-group row">
                                    <textarea class="form-control col" rows="3" placeholder="Add users by email, each email separated by commas&#10;e.g: matt@example.com, joe@sample.com" name="group-description"></textarea>
                                </div>
                                <div class="row align-items-center">
                                    <div class="col">
                                        <button type="button" class="btn btn-outline-primary"><i class="fad fa-user-plus"></i>Add</button><span> &ensp; or &ensp; </span>
                                        <button type="button" class="btn btn-chartjs"><i class="fad fa-upload"></i>Using CSV</button>
                                    </div>
                                    <div class="d-none d-lg-block col-4 col-lg-5 text-right">
                                            <a href="#"><i class="fad fa-download"></i>Download .CSV Sample</a>
                                    </div>
                                </div>
                                <div class="row align-items-center mt-2">
                                    <div class="d-block d-lg-none d-md-block ml-2">
                                        <a href="#"><i class="fad fa-download"></i>Download .CSV Sample</a>
                                    </div>
                                </div>

                                <hr>
                                <h6>Member info</h6>
                                <div class="row justify-content-center">
                                    <div class="table-responsive mt-3">

                                        <table id="add-members-popup" class="stripe" style="width:100%">
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
                                                        <a href="#"><span class="ic-dark"><i class="fad fa-trash-alt"></i></span></a>
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
                            <!--end of modal body-->
                            <div class="modal-footer">
                                <button role="button" class="btn btn-primary" type="submit">
                                    Update
                                </button>
                            </div>
                        </div>
                    </div>
                </form>

                <!-- New Team -->
                <form class="modal fade" id="team-new-modal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">New Team</h5>
                                <button type="button" class="close btn btn-round" data-dismiss="modal" aria-label="Close">
                                    <i class="material-icons">close</i>
                                </button>
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
                                    <div class="users-manage">
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

                                                <table id="new-team-popup" class="stripe" style="width:100%">
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
                    </div>
                </form>

                <!-- Edit Team -->
                <form class="modal fade" id="team-edit-modal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Edit Team</h5>
                                <button type="button" class="close btn btn-round" data-dismiss="modal" aria-label="Close">
                                    <i class="material-icons">close</i>
                                </button>
                            </div>
                            <!--end of modal head-->

                            <ul class="nav nav-tabs nav-fill" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="team-edit-details-tab" data-toggle="tab" href="#team-edit-details" role="tab" aria-controls="team-edit-details" aria-selected="true">Details</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="team-edit-members-tab" data-toggle="tab" href="#team-edit-members" role="tab" aria-controls="team-edit-members" aria-selected="false">Members</a>
                                </li>
                            </ul>

                            <div class="modal-body">
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="team-edit-details" role="tabpanel">

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
                                                    <input type="radio" id="visibility-edit-everyone" name="visibility" class="custom-control-input">
                                                    <label class="custom-control-label" for="visibility-edit-everyone">Everyone</label>
                                                </div>
                                            </div>

                                            <div class="col">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="visibility-edit-members" name="visibility" class="custom-control-input" checked>
                                                    <label class="custom-control-label" for="visibility-edit-members">Members</label>
                                                </div>
                                            </div>

                                            <div class="col">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="visibility-edit-me" name="visibility" class="custom-control-input">
                                                    <label class="custom-control-label" for="visibility-edit-me">Just me</label>
                                                </div>
                                            </div>
                                        </div>

                                        <hr>

                                        <h6>Status</h6>
                                        <div class="row">
                                            <div class="col-4">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="status-edit-active" name="status" class="custom-control-input" checked>
                                                    <label class="custom-control-label" for="status-edit-active">Active</label>
                                                </div>
                                            </div>

                                            <div class="col-4">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="status-edit-disable" name="status" class="custom-control-input">
                                                    <label class="custom-control-label" for="status-edit-disable">Disable</label>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="tab-pane fade" id="team-edit-members" role="tabpanel">
                                        <div class="users-manage">
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

                                                    <table id="edit-team-popup" class="stripe" style="width:100%">
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
                                                                    <a href="#"><span class="ic-dark"><i class="fad fa-trash-alt"></i></span></a>
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

                            <div class="modal-footer justify-content-between">
                                <button role="button" class="btn btn-outline-primary" type="button">
                                    <i class="fad fa-times"></i>Delete Forever
                                </button>
                                <button role="button" class="btn btn-primary" type="submit">
                                    Update
                                </button>
                            </div>
                        </div>
                    </div>
                </form>

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

    <!--Team List-->
    <script>

        $(document).ready(function() {
            var table = $('#team-list').DataTable({
                'columnDefs': [
                    {
                        'targets': 0,
                        'checkboxes': {
                            'selectRow': true
                        }
                    },
                    {
                        'targets': 2,
                        'orderable': false
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
            var table = $('#add-members-popup').DataTable({
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

    <script>

        $(document).ready(function() {
            var table = $('#show-group-members').DataTable({
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

    <script>

        $(document).ready(function() {
            var table = $('#edit-team-popup').DataTable({
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

