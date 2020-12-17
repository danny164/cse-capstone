@extends('layouts.master')
@section('title', 'Home Page')
@section('content')

    @include('components.scroll-process')

    <!-- begin a container -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-11 col-xl-10">

                <div class="tab-content mt-3">
                    <div class="tab-pane fade show active" id="task" role="tabpanel">

                        <div class="content-list" data-filter-list="content-list-body">
                            <div class="row content-list-head">
                                <div class="col-auto">
                                    <h3>Announcements</h3>
                                    @if(Auth::user()->role_id == 1)
                                        <button class="btn btn-round" data-toggle="modal" data-target="#note-add-modal">
                                            <i class="material-icons">add</i>
                                        </button>
                                    @endif
                                </div>
                                <form class="col-md-auto">
                                    <div class="input-group input-group-round">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="material-icons">filter_list</i>
                                            </span>
                                        </div>
                                        <input type="search" class="form-control filter-list-input" placeholder="Filter notes" aria-label="Filter notes">
                                    </div>
                                </form>
                            </div>
                            <!-- end of content list head-->
                            <section class="load">
                                @include('user.load')
                            </section>
                        </div>
                        <!-- end of content list-->
                    </div>
                    <!-- end of tab-->
                </div>

                <!-- Tạo Thông báo -->
                <form class="modal fade" id="note-add-modal" tabindex="-1" aria-hidden="true" method="POST" action="{{ url('admin/announcements/home/save/'.Auth::user()->id) }}">
                    {{csrf_field()}}
                    <div class="modal-dialog modal-lg" role="document" >
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Create an Announcement</h5>
                                <button type="button" class="close btn btn-round" data-dismiss="modal" aria-label="Close">
                                    <i class="material-icons">close</i>
                                </button>
                            </div>
                            <!--end of modal head-->
                            <div class="modal-body">
                                <div class="form-group row align-items-center">
                                    <label class="col-3">Title</label>
                                    <input class="form-control @error('title') is-invalid @enderror col" type="text" placeholder="Title" name="title" />
                                </div>
                                <div class="form-group row">
                                    <label class="col-3">Content</label>
                                    <textarea class="form-control @error('content') is-invalid @enderror col" rows="10" placeholder="Write something here..." name="content"></textarea>
                                </div>
                                <hr>
                                <h6>Visibility</h6>
                                <div class="row">
                                    <div class="col">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="visibility-everyone" name="visibility" class="custom-control-input" checked value="1">
                                            <label class="custom-control-label" for="visibility-everyone" >Everyone</label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="visibility-members" name="visibility" class="custom-control-input" value="2">
                                            <label class="custom-control-label" for="visibility-members" value="2">Members</label>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="visibility-me" name="visibility" class="custom-control-input"value="3">
                                            <label class="custom-control-label" for="visibility-me">Just me</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end of modal body-->
                            <div class="modal-footer">
                                <button role="button" class="btn btn-primary" type="submit">Post</button>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- End Tạo Thông báo -->

            </div>
        </div>
    </div>
    <!-- end div container -->

@endsection

@section('script')

    <script type="text/javascript">

        $(function() {
            $('body').on('click', '.pagination a', function(e) {
                e.preventDefault();

                $('#load a').css('color', '#dfecf6');
                // $('#load').append('<img style="position: absolute; left: 0; top: 0; z-index: 100000;" src="assets/img/loader.svg" />');

                var url = $(this).attr('href');
                getArticles(url);
                window.history.pushState("", "", url);
            });

            function getArticles(url) {
                $.ajax({
                    url : url
                }).done(function (data) {
                    $('.load').html(data);
                    $('html, body').animate({ scrollTop: 0 }, 'slow');
                }).fail(function () {
                    alert('Could not be loaded.');
                });
            }

        });

    </script>
@endsection
