@extends('layouts.master')
@section('title', 'Topic Management')
@section('content')

    <div class="breadcrumb-bar navbar bg-white sticky-top">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a>
            </li>
            <li class="breadcrumb-item"><a href="{{ url('admin/topics') }}">Topics</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Topic Management Old</li>
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
                        <h3>Topic Management Old</h3>
                    </div>
                </div>
                <!--end of content list head-->

                <div class="table-responsive mt-3">

                    <table id="example" class="stripe" style="width:100%">
                        <thead>
                            <tr>
                                <th></th>
                                <th class="text-left">Topic Name</th>
                                <th>Semester</th>
                                <th>Team</th>
                                <th>Status</th>
                            </tr>
                        </thead>

                        <tbody>

                            <tr>
                                <td></td>
                                <td class="text-left">Đề tài từ điển</td>
                                <td>Capstone 1 2019</td>
                                <td>Nhóm 2</td>

                                <td>
                                    <!-- <a href="#"><span class="text-success"><i class="fad fa-check"></i></span></a> -->
                                    <a href="#"><span class="text-danger"><i class="fad fa-times"></i></span></a>

                                </td>
                                <td>
                                 
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td class="text-left">Đề  tài food good</td>
                                <td>Capstone 1 2019</td>
                                <td>Nhóm 3</td>

                                <td>
                                    <!-- <a href="#"><span class="text-success"><i class="fad fa-check"></i></span></a> -->
                                    <a href="#"><span class="text-danger"><i class="fad fa-times"></i></span></a>

                                </td>
                                <td>
                                 
                                </td>
                            </tr>                            <tr>
                                <td></td>
                                <td class="text-left">Đề tài game giả lập</td>
                                <td>Capstone 1 2019</td>
                                <td>Nhóm 4</td>

                                <td>
                                    <!-- <a href="#"><span class="text-success"><i class="fad fa-check"></i></span></a> -->
                                    <a href="#"><span class="text-danger"><i class="fad fa-times"></i></span></a>

                                </td>
                                <td>
                                   
                                </td>
                            </tr>                            <tr>
                                <td></td>
                                <td class="text-left">Đề tài capstone tracking </td>
                                <td>Capstone 1 2019</td>
                                <td>Nhóm 5</td>

                                <td>
                                    <!-- <a href="#"><span class="text-success"><i class="fad fa-check"></i></span></a> -->
                                    <a href="#"><span class="text-danger"><i class="fad fa-times"></i></span></a>

                                </td>
                                <td>
                                    
                                </td>
                            </tr>
                            <!-- <tr>
                                <td></td>
                                <td class="text-left">Almost before we knew it, we had left the ground.</td>
                                <td>2</td>
                                <td>15</td>
                                <td>
                                    <a href="#"><span class="text-danger"><i class="fad fa-times"></i></span></a>
                                </td>
                                <td>
                                    <a href="#" data-toggle="modal" data-target="#topic-edit-modal"><span class="ic-dark"><i class="fad fa-pencil"></i></span></a>
                                    <a href="#"><span class="ic-dark"><i class="fad fa-trash-alt"></i></span></a>
                                </td>
                            </tr> -->

                        </tbody>
                        <tfoot>
                            <tr>
                                <th></th>
                                <th class="text-left">Topic Name</th>
                                <th>Semester</th>
                                <th>Team</th>
                                <th>Status</th>
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

@endsection


