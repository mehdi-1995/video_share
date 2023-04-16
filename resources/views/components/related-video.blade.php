<div id="related-posts">
    <!-- video item -->
    @foreach ($videos as $video)
        <div class="related-video-item">
            <div class="thumb">
                <small class="time">{{ $video->duration_to_human }}</small>
                <a href="{{ route('video.show', $video) }}"><img src="{{ $video->video_thumbnail_in_human }}" alt=""></a>
            </div>
            <a href="{{ route('video.show', $video) }}" class="title">{{ $video->title }}</a>
            <a class="channel-name" href="#">{{ $video->user->name }}<span>
                    <i class="fa fa-check-circle"></i></span></a>
        </div>
    @endforeach
    <!-- // video item -->
</div>
