@extends('timeline.master')
@section('timeline_content')
    <div id="open-modal" class="modal-window">
        <div style="background: rosybrown">
            <a href="#" title="Close" class="modal-close">X</a>
            <header class="text-white text-center">
                <img src="https://st.quantrimang.com/photos/image/072015/22/avatar.jpg" width="150" alt=""
                     style="width: 150px" class="mb-4">
            </header>
            <div class="row py-4">
                <div class="col-lg-6 mx-auto">
                    <!-- Upload image input-->
                    <form action="{{route('user.update.avatar')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="input-group mb-3 px-2 py-2 rounded-pill bg-white shadow-sm">
                            <input name="file" id="upload" type="file" onchange="readURL(this);" class="form-control border-0">
                            <label id="upload-label" for="upload" class="font-weight-light text-muted">Tải ảnh lên</label>
                            <div class="input-group-append">
                                <label for="upload" class="btn btn-light m-0 rounded-pill px-4"> <i
                                        class="fa fa-cloud-upload mr-2 text-muted"></i><small
                                        class="text-uppercase font-weight-bold text-muted">Tải ảnh lên
                                    </small></label>
                            </div>
                        </div>

                        <!-- Uploaded image area-->
                        <p class="font-italic text-white text-center">The image uploaded will be rendered inside the
                            box below.</p>
                        <div class="image-area mt-4"><img id="imageResult" src="#" alt=""
                                                          class="img-fluid rounded shadow-sm mx-auto d-block"></div>
                        <div style="float: right"><button style="border-radius: 5px" type="submit">Lưu</button></div>
                    </form>
                </div>
            </div>
        </div>

    </div>
<div class="central-meta item">
    <div class="new-postbox">
        <figure>
            <img src="{{ $user->avatar }}" style="width: 60px" alt="">
        </figure>
        <div class="newpst-input">
            <form method="post" action="{{ route("timeline.post") }}">
                @csrf
                <textarea rows="2" name="content" placeholder="write something"></textarea>
                <div class="attachments">
                    <ul>
                        <li>
                            <i class="fa fa-music"></i>
                            <label class="fileContainer">
                                <input type="file">
                            </label>
                        </li>
                        <li>
                            <i class="fa fa-image"></i>
                            <label class="fileContainer">
                                <input type="file">
                            </label>
                        </li>
                        <li>
                            <i class="fa fa-video-camera"></i>
                            <label class="fileContainer">
                                <input type="file">
                            </label>
                        </li>
                        <li>
                            <i class="fa fa-camera"></i>
                            <label class="fileContainer">
                                <input type="file">
                            </label>
                        </li>
                        <li>
                            <button type="submit">Post</button>
                        </li>
                    </ul>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- add post new box -->
<div class="loadMore">
    @foreach ($posts as $post)
    @if ($post->parent_id == null)
    <div class="central-meta item">
        <div class="user-post">
            <div class="friend-info">
                <figure>
                    <a href="{{ route('timeline.index',['id' => $post->user->id]) }}">
                        <img src="{{ $post->user->avatar }}" style="width: 60px" alt="">
                    </a>
                </figure>
                <div class="friend-name">
                    <ins><a href="{{ route('timeline.index',$post->user_id) }}"
                            title="">{{ $post->user->last_name ." ". $post->user->first_name }}</a></ins>
                    @if (Auth::user()->id == $post->user->id)
                    <span class="social-media" title="Edit or Delete this" style="position: absolute">
                        <div class="menu">
                            <div class="btn trigger bg-secondary"><i class="fa fa-ellipsis-h"></i>
                            </div>
                            <div class="rotater"></div>
                            <div class="rotater"></div>
                            <div class="rotater"></div>
                            <div class="rotater"></div>
                            <div class="rotater"></div>
                            <div class="rotater"></div>
                            <div class="rotater">
                                <div class="btn btn-icon bg-secondary">
                                    <a href="{{ route('post.delete',['postId' => $post->id]) }}"
                                        onclick="return confirm('Are you sure want to delete?')" title="Delete">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="rotater">
                                <div class="btn btn-icon bg-secondary">
                                    <a href="" title="Edit"><i class="fa fa-edit"></i></a>
                                </div>
                            </div>
                        </div>
                    </span>
                    @endif
                    {{-- delete and edit --}}
                    <span>{{ date_format($post->created_at, "d/m/Y H:i:s")}}</span>
                </div>
                <div class="description">
                    <p>{{ $post->content }}</p>
                </div>
                <div class="post-meta">
                    <img src="images/resources/user-post.jpg" alt="">
                    <div class="we-video-info">
                        <ul>
                            <li>
                                <span class="views" data-toggle="tooltip" title="views">
                                    <i class="fa fa-eye"></i>
                                    <ins>1.2k</ins>
                                </span>
                            </li>
                            <li>
                                <span class="comment" data-toggle="tooltip" title="Comments">
                                    <i class="fa fa-comments-o"></i>
                                    <ins>52</ins>
                                </span>
                            </li>
                            <li>
                                <span class="like" data-toggle="tooltip" title="like">
                                    <i class="ti-heart"></i>
                                    <ins>2.2k</ins>
                                </span>
                            </li>
                            <li class="social-media">
                                <div class="menu">
                                    <div class="btn trigger"><i class="fa fa-share-alt"></i>
                                    </div>
                                    <div class="rotater">
                                        <div class="btn btn-icon"><a href="#" title=""><i class="fa fa-html5"></i></a>
                                        </div>
                                    </div>
                                    <div class="rotater">
                                        <div class="btn btn-icon"><a href="#" title=""><i
                                                    class="fa fa-facebook"></i></a></div>
                                    </div>
                                    <div class="rotater">
                                        <div class="btn btn-icon"><a href="#" title=""><i
                                                    class="fa fa-google-plus"></i></a></div>
                                    </div>
                                    <div class="rotater">
                                        <div class="btn btn-icon"><a href="#" title=""><i class="fa fa-twitter"></i></a>
                                        </div>
                                    </div>
                                    <div class="rotater">
                                        <div class="btn btn-icon"><a href="#" title=""><i class="fa fa-css3"></i></a>
                                        </div>
                                    </div>
                                    <div class="rotater">
                                        <div class="btn btn-icon"><a href="#" title=""><i
                                                    class="fa fa-instagram"></i></a>
                                        </div>
                                    </div>
                                    <div class="rotater">
                                        <div class="btn btn-icon"><a href="#" title=""><i
                                                    class="fa fa-dribbble"></i></a>
                                        </div>
                                    </div>
                                    <div class="rotater">
                                        <div class="btn btn-icon"><a href="#" title=""><i
                                                    class="fa fa-pinterest"></i></a>
                                        </div>
                                    </div>

                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="coment-area">
                <ul class="we-comet">
                    @foreach ($post->comments as $comment)
                    <li>
                        <div class="comet-avatar">
                            <a class="comet-avatar" href="{{ route('timeline.index',$comment->user->id) }}">
                                <img src="{{ $comment->user->avatar }}" style="width: 45px" alt="">
                            </a>

                        </div>
                        <div class="we-comment">
                            <div class="coment-head">
                                <h5>
                                    <a
                                        href="{{ route('timeline.index',$comment->user->id) }}">{{ $comment->user->last_name . " " . $comment->user->first_name }}</a>
                                </h5>
                                <span>{{ $comment->created_at }}</span>
                                <a class="we-reply text-primary reply-comment" data-id="{{ $comment->id }}"
                                    data-value="{{ '@'.$comment->user->last_name . " " . $comment->user->first_name. ' ' }}"
                                    title="Reply"><i class="fa fa-reply"></i>
                                </a>
                                @if (Auth::user()->id == $comment->user->id)
                                <span class="social-media" title="Edit or Delete this" style="position: absolute;">
                                    <div class="menu">
                                        <div class="btn trigger" style="background-color: #ccc"><i
                                                class="fa fa-ellipsis-h"></i>
                                        </div>
                                        <div class="rotater"></div>
                                        <div class="rotater"></div>
                                        <div class="rotater">
                                            <div class="btn btn-icon bg-secondary">
                                                <a href="{{ route('post.delete',['postId' => $comment->id]) }}"
                                                    onclick="return confirm('Are you sure want to delete?')"
                                                    title="Delete">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="rotater">
                                            <div class="btn btn-icon bg-secondary">
                                                <a href="" title="Edit"><i class="fa fa-edit"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </span>
                                @endif
                                {{-- delete and edit --}}
                                <div>
                                    <p>{{ $comment->content }}</p>
                                </div>
                            </div>
                        </div>
                        <ul>
                            @foreach ($comment->comments as $comment_reply)
                            <li>
                                <div class="comet-avatar">
                                    <a class="comet-avatar"
                                        href="{{ route('timeline.index',$comment_reply->user->id) }}">
                                        <img src="{{ $comment_reply->user->avatar }}" style="width: 45px" alt="">
                                    </a>
                                </div>
                                <div class="we-comment">
                                    <div class="coment-head">
                                        <h5>
                                            <a href="{{ route('timeline.index',['id' => $comment_reply->user->id]) }}">
                                                {{ $comment_reply->user->last_name . " " . $comment_reply->user->first_name }}</a>
                                        </h5>
                                        <span>{{ $comment_reply->created_at }}</span>
                                        <a role="button" class="we-reply text-primary reply-comment"
                                            data-id="{{ $comment_reply->parent_id }}"
                                            data-value="{{ '@'.$comment_reply->user->last_name . " " . $comment_reply->user->first_name. ' ' }}"
                                            title="Reply"><i class="fa fa-reply"></i>
                                        </a>
                                        @if (Auth::user()->id == $comment_reply->user->id)
                                        <span class="social-media" title="Edit or Delete this"
                                            style="position: absolute;">
                                            <div class="menu">
                                                <div class="btn trigger" style="background-color: #ccc"><i
                                                        class="fa fa-ellipsis-h"></i>
                                                </div>
                                                <div class="rotater"></div>
                                                <div class="rotater"></div>
                                                <div class="rotater">
                                                    <div class="btn btn-icon bg-secondary">
                                                        <a href="{{ route('post.delete',['postId' => $comment_reply->id]) }}"
                                                            onclick="return confirm('Are you sure want to delete?')"
                                                            title="Delete">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="rotater">
                                                    <div class="btn btn-icon bg-secondary">
                                                        <a href="" title="Edit"><i class="fa fa-edit"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </span>
                                        @endif
                                        {{-- delete and edit --}}
                                        <div>
                                            <p>{{ $comment_reply->content }}</p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                            <li class="post-comment" id="reply-form-{{ $comment->id }}" style="display: none">
                                <div class="comet-avatar">
                                    <img src="{{ Auth::user()->avatar }}" alt="">
                                </div>
                                <div class="post-comt-box">
                                    <form method="post" action="{{ route('post.comment',['postId' => $comment->id]) }}">
                                        @csrf
                                        <textarea id="comment-{{ $comment->id }}" data-id="{{ $comment->id }}"
                                            name="comment-{{ $comment->id }}"
                                            placeholder="Post your comment"></textarea>
                                        <div class="add-smiles">
                                            <span class="em em-expressionless" title="add icon"></span>
                                        </div>
                                        <div class="smiles-bunch">
                                            <i class="em em---1"></i>
                                            <i class="em em-smiley"></i>
                                            <i class="em em-anguished"></i>
                                            <i class="em em-laughing"></i>
                                            <i class="em em-angry"></i>
                                            <i class="em em-astonished"></i>
                                            <i class="em em-blush"></i>
                                            <i class="em em-disappointed"></i>
                                            <i class="em em-worried"></i>
                                            <i class="em em-kissing_heart"></i>
                                            <i class="em em-rage"></i>
                                            <i class="em em-stuck_out_tongue"></i>
                                        </div>
                                        <button type="submit"></button>
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </li>
                    @endforeach
                    <li>
                        <a href="#" title="" class="showmore underline">more comments</a>
                    </li>
                    <li class="post-comment">
                        <div class="comet-avatar">
                            <img src="{{ Auth::user()->avatar }}" alt="">
                        </div>
                        <div class="post-comt-box">
                            <form method="post" action="{{ route('post.comment',['postId' => $post->id]) }}">
                                @csrf
                                <textarea name="comment-{{ $post->id }}" data-id="{{ $post->id }}"
                                    placeholder="Post your comment"></textarea>
                                <div class="add-smiles">
                                    <span class="em em-expressionless" title="add icon"></span>
                                </div>
                                <div class="smiles-bunch">
                                    <i class="em em---1"></i>
                                    <i class="em em-smiley"></i>
                                    <i class="em em-anguished"></i>
                                    <i class="em em-laughing"></i>
                                    <i class="em em-angry"></i>
                                    <i class="em em-astonished"></i>
                                    <i class="em em-blush"></i>
                                    <i class="em em-disappointed"></i>
                                    <i class="em em-worried"></i>
                                    <i class="em em-kissing_heart"></i>
                                    <i class="em em-rage"></i>
                                    <i class="em em-stuck_out_tongue"></i>
                                </div>
                                <button type="submit"></button>
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    @endif
    @endforeach
</div><!-- centerl meta -->
@endsection
