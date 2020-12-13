@extends('layouts.master')
@section('title', 'Faculty Management')
@section('content')

    <div class="breadcrumb-bar navbar bg-white sticky-top">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ url('admin/faculties') }}">Faculties</a></li>
                <li class="breadcrumb-item active" aria-current="page">Faculty Management</li>
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
                        <h3>Faculty Management</h3>
                    </div>

                </div>
                <!--end of content list head-->

                <div class="table-responsive mt-3">

                    <table id="example" class="stripe" style="width:100%">
                        <thead>
                            <tr>
                                <th></th>
                                <th class="text-left">Faculty Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($manage_faculties as $key => $cate_pro)

                            <tr>
                                <td></td>
                                <td class="text-left">{{ Str::limit($cate_pro->faculty_name, 100,('...')) }}</td>
                                <td>
                                    <a href="{{URL::to('/admin/faculties/management/'.$cate_pro->id.'/edit')}}" ><span class="ic-dark"><i class="fad fa-pencil"></i></span></a>
                                    <a onclick="return confirm('Are you sure to delete?')"href="{{URL::to('/admin/faculties/management/'.$cate_pro->id.'/delete')}}" ><span class="ic-dark"><i class="fad fa-trash-alt"></i></span></a>
                                    <a href="#"><span class="ic-dark"><i class="fad fa-eye"></i></span></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th></th>
                                <th class="text-left">Faculty Name</th>
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
                        'targets': 2,
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

