@extends('layouts.master')
@section('title', 'Announcement Management')
@section('content')

    <div class="breadcrumb-bar navbar bg-white sticky-top">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('admin') }}">Home</a>
            </li>
            <li class="breadcrumb-item"><a href="{{ url('admin') }}">Announcements</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Anncouncement Management</li>
            </ol>
        </nav>

        <a href="#"><button class="btn btn-chartjs btn-sm"><i class="fad fa-trash-alt"></i>Delete</button></a>
    </div>
    <!-- end breadcrumb -->
    <!-- Thông báo -->
    <?php
        $message= Session ::get('message');
        if($message){
             echo '<span class="test-alert">'.$message.'</span>';
             Session::put('message',null);

        }
    ?>
    <!-- begin a container -->
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col mt-3">
                <div class="row content-list-head">
                    <div class="col-auto">
                        <h4 class="text-table">Announcement Management</h4>
                    </div>
                </div>
                <!--end of content list head-->

                <div class="table-responsive mt-3">
                    <table id="example" class="stripe" style="width:100%">
                        <thead>
                            <tr>
                                <th></th>
                                <th class="text-left">Title</th>
                                <th>Posting Date</th>
                                <th>Last Edit</th>
                                <th>Privacy</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($manage_announcements as $key => $cate_pro)
                            <tr>
                                <td></td>
                                <td class="text-left">{{ $cate_pro->title }}</td>
                                <td>
                                    {{ $cate_pro->created_at }}
                                </td>
                                <td>
                                    {{ ($cate_pro->updated_at == $cate_pro->created_at ? '' : $cate_pro->updated_at) }}
                                </td>
                                <td>
                                    <?php
                                        if($cate_pro->visibility==1){

                                            echo '<span class="ic-dark"><i class="fad fa-globe-africa"></i></span>';

                                        }
                                        else if($cate_pro->visibility==2){

                                            echo '<span class="ic-dark"><i class="fad fa-user-friends"></i></span>';

                                        }
                                        else if($cate_pro->visibility==3){

                                            echo '<span class="ic-dark"><i class="fad fa-user"></i></span>';

                                        }
                                    ?>
                                </td>
                                <td>
                                    <a  href="{{URL::to('/admin/announcements/management/'.$cate_pro->id.'/edit')}}"><span class="ic-dark"><i class="fad fa-pencil"></i></span></a>
                                    <a onclick="return confirm('Are you sure to delete?')"href="{{URL::to('/admin/announcements/management/'.$cate_pro->id.'/delete')}}"><span class="ic-dark"><i class="fad fa-trash-alt"></i></span></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th></th>
                                <th class="text-left">Title</th>
                                <th>Posting Date</th>
                                <th>Last Edit</th>
                                <th>Privacy</th>
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
