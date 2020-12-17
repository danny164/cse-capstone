@extends('layouts.master')
@section('title', 'Department Management')
@section('content')

    <div class="breadcrumb-bar navbar bg-white sticky-top">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ url('admin/departments') }}">Departments</a></li>
                <li class="breadcrumb-item active" aria-current="page">Department Management</li>
            </ol>
        </nav>
    </div>
    <!-- end breadcrumb -->

    <!-- begin a container -->
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col mt-3">
                <div class="row content-list-head">
                    <div class="col-auto">
                        <h3>Department Management</h3>
                    </div>

                </div>
                <!--end of content list head-->

                <div class="table-responsive mt-3">

                    <table id="example" class="stripe" style="width:100%">
                        <thead>
                            <tr>
                                <th></th>
                                <th class="text-left">Department Name</th>
                                <th class="text-left">Faculty Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($manage_departments as $key =>$value)

                            <tr>
                                <td></td>
                                <td class="text-left">{{$value->department_name}}</td>
                                <td class="text-left">{{$value->faculty_name}}</td>

                                <td>
                                    <a href="{{url('/admin/departments/management/'.$value->id.'/edit')}}"><span class="ic-dark"><i class="fad fa-pencil"></i></span></a>
                                    <a onclick="return confirm('Are you sure to delete?')"href="{{url('/admin/departments/management/'.$value->id.'/delete')}}"><span class="ic-dark"><i class="fad fa-trash-alt"></i></span></a>
                                    <a href="#"><span class="ic-dark"><i class="fad fa-eye"></i></span></a>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                        <tfoot>
                            <tr>
                                <th></th>
                                <th class="text-left">Department Name</th>
                                <th class="text-left">Faculty Name</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>

                </div>
                <!-- end div table responsive -->
            </div>
            <!-- end div col mt-3-->
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
        // $(document).ready(function() {
        //     $('#example').DataTable({

        //     });
        // });

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

