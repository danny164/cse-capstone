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
            <li class="breadcrumb-item active" aria-current="page">Topic Management New</li>
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
                        <h3>Topic Management New</h3>
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
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                        @foreach($topics as $key => $cate_pro)
                        @if($cate_pro->duoc_chon ==1 )
                            <tr>
                                <td></td>
                                <td class="text-left" >{{ $cate_pro->ini_title }}</td>
                                <td>{{ $cate_pro->semester_name }}</td>
                                <td>{{ $cate_pro->team_name }}</td>

                                <td>
                                    <a href="#"><span class="text-success"><i class="fad fa-check"></i></span></a>

                                </td>
                                <td>
                                    <a href="{{url('/admin/topics/'.$cate_pro->id.'/edit')}}"><span class="ic-dark"><i class="fad fa-pencil"></i></span></a>
                                    <a onclick="return confirm('Are you sure to delete?')"href="{{url('/admin/topics/'.$cate_pro->id.'/delete')}}"><span class="ic-dark"><i class="fad fa-trash-alt"></i></span></a>
                                </td>
                            </tr>
                                @endif
                            @endforeach

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


