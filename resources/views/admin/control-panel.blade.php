@extends('layouts.master')
@section('title', 'Control Panel')
@section('content')

    <div class="breadcrumb-bar navbar bg-white sticky-top">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Control Panel</li>
            </ol>
        </nav>

        <a href="{{ url('admin/control/users/add') }}"><button class="btn btn-outline-primary"><i class="fad fa-user-plus"></i>Add Users</button></a>


    </div>

    <!-- begin a container -->
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col">
                <div class="mt-3 ml-2">
                    <h3>User List</h3>
                    <div class="my-2">
                        Show/Hide: <a class="toggle-vis" data-column="2">Avatar</a> -
                        <a class="toggle-vis" data-column="3">User ID</a> -
                        <a class="toggle-vis" data-column="4">Role</a> -
                        <a class="toggle-vis" data-column="5">Student ID</a> -
                        <a class="toggle-vis" data-column="6">Full Name</a> -
                        <a class="toggle-vis" data-column="7">Gender</a> -
                        <a class="toggle-vis" data-column="8">Email</a> -
                        <a class="toggle-vis" data-column="9">Phone</a> -
                        <a class="toggle-vis" data-column="10">Faculty</a> -
                        <a class="toggle-vis" data-column="11">Department</a> -
                        <a class="toggle-vis" data-column="12">Class</a> -
                        <a class="toggle-vis" data-column="13">Account Status</a> -
                        <a class="toggle-vis" data-column="14">Email Confirmed</a> -
                        <a class="toggle-vis" data-column="15">Register Date</a> -
                        <a class="toggle-vis" data-column="16">Modified Date</a>

                    </div>

                    <div class="mt-2">

                        <ul class="list-inline">
                            <span>Action: </span>
                            <li><a href="#"><span class="badge badge-primary"><i class="fad fa-check"></i>Active</span></a></li>
                            <li><a href="#"><span class="badge badge-warning"><i class="fad fa-exclamation"></i>Disable</span></a></li>
                            <li><a href="#"><span class="badge badge-danger"><i class="fad fa-times"></i>Delete</span></a></li>
                        </ul>
                    </div>
                    <hr>
                </div>

                <div class="table-responsive mt-3">
                    <table id="example" class="cell-border" style="width:100%">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Action</th>
                                <th>Avatar</th>
                                <th>User ID</th>
                                <th>Role</th>
                                <th>Student ID</th>
                                <th>Full Name</th>
                                <th>Gender</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Faculty</th>
                                <th>Department</th>
                                <th>Class</th>
                                <th>Account Status</th>
                                <th>Email Confirmed</th>
                                <th>Register Date</th>
                                <th>Modified Date</th>

                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td></td>
                                <td>
                                    <a href=""><i class="fad fa-pencil"></i></span></a>
                                    <a href=""><span class="ic-dark"><i class="fad fa-trash-alt"></i></span></a>
                                </td>
                                <td>2</td>
                                <td>3</td>
                                <td>4</td>
                                <td>5</td>
                                <td>6</td>
                                <td>7</td>
                                <td>8</td>
                                <td>9</td>
                                <td>10</td>
                                <td>11</td>
                                <td>12</td>
                                <td><span class="badge badge-primary"><i class="fad fa-check"></i>Actived</span></td>
                                <td><span class="badge text-danger"><i class="fad fa-exclamation-triangle"></i>Waiting</span></td>
                                <td>15</td>
                                <td>16</td>

                            </tr>

                            <tr>
                                <td></td>
                                <td>
                                    <a href=""><i class="fad fa-pencil"></i></span></a>
                                    <a href=""><span class="ic-dark"><i class="fad fa-trash-alt"></i></span></a>
                                </td>
                                <td>2</td>
                                <td>3</td>
                                <td>4</td>
                                <td>5</td>
                                <td>6</td>
                                <td>7</td>
                                <td>8</td>
                                <td>9</td>
                                <td>10</td>
                                <td>11</td>
                                <td>12</td>
                                <td><span class="badge badge-warning"><i class="fad fa-exclamation"></i>Disabled</span></td>
                                <td><span class="badge badge-success"><i class="fad fa-badge-check"></i>Verified</span></td>
                                <td>15</td>
                                <td>16</td>

                            </tr>


                        </tbody>
                        <tfoot>
                            <tr>
                                <th></th>
                                <th>Action</th>
                                <th>Avatar</th>
                                <th>User ID</th>
                                <th>Role</th>
                                <th>Student ID</th>
                                <th>Full Name</th>
                                <th>Gender</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Faculty</th>
                                <th>Department</th>
                                <th>Class</th>
                                <th>Account Status</th>
                                <th>Email Confirmed</th>
                                <th>Register Date</th>
                                <th>Modified Date</th>

                            </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- end div table responsive -->
            </div>
        </div>
    </div>
    <!-- end div container -->

@endsection

@section('script')
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
                        'targets': [1, 2],
                        'orderable': false
                    },
                    {
                        "targets": [ 3, 4, 7, 8, 9, 10, 11, 12, 15, 16 ],
                        "visible": false
                    }
                ],
                'select': {
                    'style': 'multi'
                },
                'order': [[5, 'asc']]
            });

            $('a.toggle-vis').on( 'click', function (e) {
                e.preventDefault();

                // Get the column API object
                var column = table.column( $(this).attr('data-column') );

                // Toggle the visibility
                column.visible( ! column.visible() );
            });

        });
    </script>
@endsection

