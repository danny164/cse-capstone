@extends('layouts.master')
@section('title', 'Plan Management')
@section('content')

    <div class="breadcrumb-bar navbar bg-white sticky-top">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a>
                </li>
                <li class="breadcrumb-item"><a href="{{ url('admin/plans') }}">Plans</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Plan Management</li>
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
                        <h3>Plan Management</h3>
                    </div>

                </div>
                <!--end of content list head-->

                <div class="table-responsive mt-3">

                    <table id="example" class="stripe" style="width:100%">
                        <thead>
                            <tr>
                                <th></th>
                                <th class="text-left">Title</th>
                                <th>Start Date</th>
                                <th>Due Date</th>
                                <th>Progress</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                                <td class="text-left">Almost before we knew it, we had left the ground.</td>
                                <td>23/11/2020</td>
                                <td>25/11/2020</td>
                                <td>
                                    <span class="text-success">37/37</span>
                                </td>
                                <td>
                                    <a href="#" data-toggle="modal" data-target="#topic-edit-modal"><span class="ic-dark"><i class="fad fa-pencil"></i></span></a>
                                    <a href="#"><span class="ic-dark"><i class="fad fa-trash-alt"></i></span></a>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td class="text-left">Almost before we knew it, we had left the ground.</td>
                                <td>23/11/2020</td>
                                <td>25/11/2020</td>
                                <td>
                                    <span class="text-danger">12/37</span>
                                </td>
                                <td>
                                    <a href="#" data-toggle="modal" data-target="#topic-edit-modal"><span class="ic-dark"><i class="fad fa-pencil"></i></span></a>
                                    <a href="#"><span class="ic-dark"><i class="fad fa-trash-alt"></i></span></a>
                                </td>
                            </tr>

                        </tbody>
                        <tfoot>
                            <tr>
                                <th></th>
                                <th class="text-left">Title</th>
                                <th>Start Date</th>
                                <th>Due Date</th>
                                <th>Progress</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>

                </div>
                <!-- end div table responsive -->
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

@endsection
