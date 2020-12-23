@extends('layouts.master')

@section('content')

    <div class="breadcrumb-bar navbar bg-white sticky-top">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a>
                </li>
                <li class="breadcrumb-item"><a href="{{ url('admin/topics') }}">Topics</a>
                </li>
                @foreach($topics as $key => $cate_pro)

                <li class="breadcrumb-item"><a href="#">{{ Str::limit($cate_pro->ini_title, 19,'...') }}</a>
                </li>
                @endforeach

                <li class="breadcrumb-item active" aria-current="page">Edit Topic</li>
            </ol>
        </nav>
    </div>
    <!-- end breadcrumb -->

    <!-- begin a container -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-11 col-xl-10">
            @foreach($topics as $key => $cate_pro)

                <form class="mt-3" method="post" action="{{ url('admin/topic/'.$cate_pro->id.'/update-topic')}}">
                {{csrf_field()}}
                    <div class="modal-content">
                        <div class="modal-header bg-primary">
                            <h5 class="modal-title">Edit a Topic</h5>
                        </div>
                        <!--end of modal head-->
                        <div class="modal-body">
                            <div class="form-group row align-items-center">
                                <label class="col-2">Title</label>
                                <input class="form-control col" type="text" placeholder="Title in English" name="eng_title" required value="{{$cate_pro->eng_title}}" />
                            </div>
                            <div class="form-group row align-items-center">
                                <label class="col-2"></label>
                                <input class="form-control col" type="text" placeholder="Title in Vietnamese" name="vie_title" required value="{{$cate_pro->vie_title}}"/>
                            </div>
                            <div class="form-group row align-items-center">
                                <label class="col-2"></label>
                                <input class="form-control col" type="text" placeholder="Initial Title" name="ini_title" value="{{$cate_pro->ini_title}}"required />
                            </div>
                            <div class="form-group row">
                                <label class="col-2">Description</label>
                                <textarea class="form-control col" rows="10" placeholder="Write something here..." name="note-description" required >{{$cate_pro->description}}</textarea>
                            </div>
                            <div class="form-group row align-items-center">
                                <label class="col-2">Semester</label>
                                <select name="groups" class="form-control col" id="semesters" required>
                                <option value="" selected>Please select semester </option>

                                @foreach($semesters as $key => $cate_pro)
                                    @if($cate_pro->is_closed !=1 )
                                    <option value="{{ $cate_pro->id }}">{{$cate_pro->semester_name}}</option>
                                    @endif
                                @endforeach    
                                </select>
                            </div>
                            <div class="form-group row">
                                <label class="col-2">Team</label>
                                
                                <select name="team_id" class="form-control col" id="team">
                                    <option value="" selected>Please select semester first</option>
                                </select>
                            </div>

                        </div>
                        <!--end of modal body-->
                        <div class="modal-footer">
                            <button role="button" class="btn btn-primary" type="submit">
                            Update
                            </button>
                        </div>
                    </div>
                </form>
                @endforeach

            </div>
        </div>
    </div>
    <!-- end div container -->

@endsection

@section('script')
<script>
$.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
    });
$(document).ready(function() {
    $('#semesters').on('change', function(e) {
        var cat_id = e.target.value;
        console.log(cat_id)
        $.ajax({
            url: '{{url('admin/ajaxTeam')}}',
            type: "POST",
            data: {
                cat_id
            },
            success: function(data) {
                console.log(data)
                var result=[];
                $('#team').empty();
                for (var i = 0; i < data.length; i++) {
                    if(data[i].is_closed==0){
                    $('#team').append('<option value="' + data[i].id + '">' + data[i].team_name + '</option>');
                    }
                  
                }
                // $('#subcategory').empty();
                // $.each(data.subcategories[0].subcategories, function(index, subcategory) {
                //     $('#subcategory').append('<option value="' + subcategory.id + '">' + subcategory.team_name + '</option>');
                // })
            }
        })
    });
}); 
</script>


@endsection

