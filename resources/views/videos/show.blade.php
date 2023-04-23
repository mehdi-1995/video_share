@extends('layouts.video')

@section('content')
    <div class="row">
        <!-- Watch -->
        <div class="col-md-8">
            <div id="watch">

                <!-- Video Player -->
                <h1 class="video-title">{{ $video->title }}</h1>
                <div class="video-code">
                    <video controls style="height: 100%; width: 100%;">
                        <source src="{{ $video->video_path_in_human }}" type="video/mp4">
                    </video>
                    <p>{{ $video->description }}</p>
                </div><!-- // video-code -->

                <div class="video-share">
                    <ul class="like">
                        <li><a class="deslike"
                                href="{{ route('dislike.create', ['likeable_type' => 'video', 'likeable_id' => $video]) }}">
                                {{ $video->DislikeCount }}
                                <i class="fa fa-thumbs-down"></i></a>
                        </li>
                        <li><a class="like"
                                href="{{ route('like.create', ['likeable_type' => 'video', 'likeable_id' => $video]) }}">
                                {{ $video->likeCount }}
                                <i class="fa fa-thumbs-up"></i></a>
                        </li>
                    </ul>
                    <ul class="social_link">
                        <li><a class="facebook" href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                        </li>
                        <li><a class="youtube" href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
                        <li><a class="linkedin" href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                        </li>
                        <li><a class="google" href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                        </li>
                        <li><a class="twitter" href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                        </li>
                        <li><a class="rss" href="#"><i class="fa fa-rss" aria-hidden="true"></i></a></li>
                    </ul><!-- // Social -->
                </div><!-- // video-share -->
                <!-- // Video Player -->


                <!-- Chanels Item -->
                <div class="chanel-item">
                    <div class="chanel-thumb">
                        <a href="#"><img src="{{ $video->user->gravatar }}" alt=""></a>
                    </div>
                    <div class="chanel-info">
                        <a class="title" href="#">{{ $video->user->name }}</a>
                        <span class="subscribers">436,414 اشتراک</span>
                    </div>
                    <a href="#" class="subscribe">اشتراک</a>
                </div>
                <!-- // Chanels Item -->


                <!-- Comments -->
                <div id="comments" class="post-comments">
                    <h3 class="post-box-title"><span>{{ $video->comments->count() }}</span> نظرات</h3>
                    <ul class="comments-list">
                        @foreach ($video->comments as $comment)
                            <li>
                                <div class="post_author">
                                    <div class="img_in">
                                        <a href="#"><img src="{{ $comment->user->gravatar }}" alt=""></a>
                                    </div>
                                    <a href="#" class="author-name">{{ $comment->user->name }}</a>
                                    <a class="deslike"
                                        href="{{ route('dislike.create', ['likeable_type' => 'comment', 'likeable_id' => $comment]) }}">
                                        {{ $comment->DislikeCount }}
                                        <i class="fa fa-thumbs-down"></i></a>
                                    <a class="like"
                                        href="{{ route('like.create', ['likeable_type' => 'comment', 'likeable_id' => $comment]) }}">
                                        {{ $comment->likeCount }}
                                        <i class="fa fa-thumbs-up"></i></a>
                                    <time datetime="2017-03-24T18:18">{{ $comment->created_at_to_human }}</time>
                                </div>
                                <p>
                                    {{ $comment->body }}
                                </p>
                                <a href="#" class="reply">پاسخ</a>

                                {{-- <ul class="children">
                                <li>
                                    <div class="post_author">
                                        <div class="img_in">
                                            <a href="#"><img src="demo_img/c2.jpg" alt=""></a>
                                        </div>
                                        <a href="#" class="author-name">بهمن نجاتی</a>
                                        <time datetime="2017-03-24T18:18">مرداد 27, 1397 - 11:00</time>
                                    </div>
                                    <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از
                                        طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و
                                        سطرآنچنان که لازم است</p>
                                    <a href="#" class="reply">پاسخ</a>
                                </li>
                            </ul> --}}
                            </li>
                        @endforeach

                    </ul>

                    @can('create',['App\\Models\Comment',$video])
                    <h3 class="post-box-title">ارسال نظرات</h3>
                    <form action="{{ route('videos.comment.create', $video) }}" method="post">
                        @csrf
                        <textarea name="body" class="form-control" rows="8" id="Message" placeholder="پیام"></textarea>
                        <button type="submit" id="contact_submit" class="btn btn-dm">ارسال پیام</button>
                    </form>
                    @endcan
                </div>
                <!-- // Comments -->


            </div><!-- // watch -->
        </div><!-- // col-md-8 -->
        <!-- // Watch -->

        <!-- Related Posts-->
        <div class="col-md-4">
            <x-related-video :video="$video"></x-related-video>
        </div><!-- // col-md-4 -->
        <!-- // Related Posts -->
    </div><!-- // row -->
@endsection
