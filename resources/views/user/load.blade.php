<div class="content-list-body" id="load">
    @foreach( $manage_announcements  as $key => $cate_pro)
        <div class="card card-note">
            <div class="card-header">
                <div class="media align-items-center text-break">
                    @foreach($all_user  as $key => $value)
                        @if($value->id == $cate_pro->user_id)
                            <img src="{{ URL::to('images/'.$value->avatar_path) }}" class="avatar" data-toggle="tooltip" data-title="{{ ($value->full_name)}}" data-filter-by="alt" />
                        @endif
                    @endforeach
                    <div class="media-body">
                        <h6 class="mb-0 text-danger" data-filter-by="text">{{ Str::limit($cate_pro->title, 200) }}</h6>
                    </div>
                </div>
                <div class="d-flex align-items-center flex-shrink-0">
                    <span data-filter-by="text">{{ Carbon\Carbon::parse($cate_pro->created_at)->diffForHumans() }}</span>
                    @if(Auth::user()->role_id == 1)
                        <div class="ml-1 dropdown card-options">
                            <button class="btn-options" type="button" id="note-dropdown-button-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="material-icons">more_vert</i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="{{URL::to('/admin/announcements/'.$cate_pro->id.'/edit')}}">Edit</a>
                                <a class="dropdown-item text-chartjs" onclick="return confirm('Are you sure to delete?')"href="{{URL::to('/admin/announcements/'.$cate_pro->id.'/delete')}}">Delete</a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            <div class="card-body" data-filter-by="text">
                {{ $cate_pro->content }}
            </div>

            <div class="card-footer comment">
                <div class="chat-module" data-filter-list="chat-module-body">
                    <div class="chat-module-bottom comment mb-2">
                        <form class="chat-form">
                            <textarea class="form-control comment" placeholder="Type message" rows="1"></textarea>
                            <div class="chat-form-buttons">
                                <button type="button" class="btn btn-link">
                                    <i class="material-icons">tag_faces</i>
                                </button>
                                <div class="custom-file custom-file-naked">
                                    <input type="file" class="custom-file-input" id="customFile">
                                    <label class="custom-file-label" for="customFile">
                                            <i class="material-icons">attach_file</i>
                                    </label>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="media chat-item">
                        <img alt="avatar" src="images/avatar.png" class="avatar" />
                        <div class="media-comment">
                          <div class="chat-item-title">
                            <span class="chat-item-author" data-filter-by="text">{{ $value->full_name }}</span>
                            <span data-filter-by="text">4 days ago</span>
                          </div>
                          <div class="chat-item-body" data-filter-by="text">
                            <p>Hey guys, just kicking things off here in the chat window. Hope you&#39;re all ready to tackle this great project. Let&#39;s smash some Brand Concept &amp; Design!</p>

                          </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>

    @endforeach
</div>

<div class="d-flex justify-content-center mt-4">
    {{ $manage_announcements->links() }}
</div>
