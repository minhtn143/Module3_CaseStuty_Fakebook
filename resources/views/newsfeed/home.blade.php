@extends('newsfeed.master')
@section('newsfeed_content')
<div class="central-meta">
    <div class="new-postbox">
        <figure>
            <a href="{{ route('timeline.index') }}">
                <img src="{{ Auth::user()->avatar }}" style="width: 60px" alt="">
            </a>
        </figure>
        <div class="newpst-input">
            <form method="post" action="{{ route('post.store') }}">
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
                    <img src="{{ $post->user->avatar }}" style="width: 60px" alt="">
                </figure>
                <div class="friend-name">
                    <ins><a href="{{ route('timeline.index',$post->user_id) }}"
                            title="">{{ $post->user->last_name ." ". $post->user->first_name }}</a></ins>
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
                            <img src="{{ $post->user->avatar }}" style="width: 45px" alt="">
                        </div>
                        <div class="we-comment">
                            <div class="coment-head">
                                <h5><a
                                        href="{{ route('timeline.index') }}">{{ $comment->user->last_name . " " . $comment->user->last_name }}</a>
                                </h5>
                                <span>{{ $comment->created_at }}</span>
                                <a role="button" class="we-reply reply-comment" data-id="{{ $comment->id }}"
                                    title="Reply"><i class="fa fa-reply"></i></a>
                                <div>
                                    <p>{{ $comment->content }}</p>
                                </div>
                            </div>
                        </div>
                        <ul>
                            @foreach ($comment->comments as $comment_2nd)
                            <li>
                                <div class="comet-avatar">
                                    <img src="{{ $comment_2nd->user->avatar }}" style="width: 45px" alt="">
                                </div>
                                <div class="we-comment">
                                    <div class="coment-head">
                                        <h5><a
                                                href="{{ route('timeline.index') }}">{{ $comment_2nd->user->last_name . " " . $comment_2nd->user->last_name }}</a>
                                        </h5>
                                        <span>{{ $comment_2nd->created_at }}</span>
                                        <div>
                                            <p>{{ $comment_2nd->content }}</p>
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
                                        <textarea name="comment-{{ $comment->id }}"
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
                    {{-- <li>
                        <div class="comet-avatar">
                        </div>
                        <div class="we-comment">
                            <div class="coment-head">
                                <h5><a href="time-line.html" title="">Jason borne</a></h5>
                                <span>1 year ago</span>
                                <a class="we-reply" href="#" title="Reply"><i class="fa fa-reply"></i></a>
                            </div>
                            <p>we are working for the dance and sing songs. this car is very
                                awesome for the youngster. please vote this car and like our
                                post</p>
                        </div>
                        <ul>
                            <li>
                                <div class="comet-avatar">
                                    <img src="images/resources/comet-2.jpg" alt="">
                                </div>
                                <div class="we-comment">
                                    <div class="coment-head">
                                        <h5><a href="time-line.html" title="">alexendra
                                                dadrio</a></h5>
                                        <span>1 month ago</span>
                                        <a class="we-reply" href="#" title="Reply"><i class="fa fa-reply"></i></a>
                                    </div>
                                    <p>yes, really very awesome car i see the features of this
                                        car in the official website of <a href="#" title="">#Mercedes-Benz</a> and
                                        really impressed :-)
                                    </p>
                                </div>
                            </li>
                            <li>
                                <div class="comet-avatar">
                                    <img src="images/resources/comet-3.jpg" alt="">
                                </div>
                                <div class="we-comment">
                                    <div class="coment-head">
                                        <h5><a href="time-line.html" title="">Olivia</a></h5>
                                        <span>16 days ago</span>
                                        <a class="we-reply" href="#" title="Reply"><i class="fa fa-reply"></i></a>
                                    </div>
                                    <p>i like lexus cars, lexus cars are most beautiful with the
                                        awesome features, but this car is really outstanding
                                        than lexus</p>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <div class="comet-avatar">
                            <img src="images/resources/comet-1.jpg" alt="">
                        </div>
                        <div class="we-comment">
                            <div class="coment-head">
                                <h5><a href="time-line.html" title="">Donald Trump</a></h5>
                                <span>1 week ago</span>
                                <a class="we-reply" href="#" title="Reply"><i class="fa fa-reply"></i></a>
                            </div>
                            <p>we are working for the dance and sing songs. this video is very
                                awesome for the youngster. please vote this video and like our
                                channel
                                <i class="em em-smiley"></i>
                            </p>
                        </div>
                    </li>
                    <li>
                        <a href="#" title="" class="showmore underline">more comments</a>
                    </li> --}}
                    <li class="post-comment">
                        <div class="comet-avatar">
                            <img src="{{ Auth::user()->avatar }}" alt="">
                        </div>
                        <div class="post-comt-box">
                            <form method="post" action="{{ route('post.comment',['postId' => $post->id]) }}">
                                @csrf
                                <textarea name="comment-{{ $post->id }}" placeholder="Post your comment"></textarea>
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
