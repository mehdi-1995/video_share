<div class="col-lg-2 col-md-4 col-sm-6">
    <div class="video-item">
        <div class="thumb">
            <div class="hover-efect"></div>
            <small class="time">{{ $video->duration_to_human }}</small>
            <a href="{{ route('video.show', $video) }}"><img src="{{ $video->video_thumbnail_in_human }}"
                    alt=""></a>
        </div>
        <div class="video-info">
            <a href="{{ route('video.show', $video) }}" class="title">{{ $video->title }}</a>
            @can('update', $video)
                <a href="{{ route('video.edit', $video) }}" class="fa fa-pencil fa-spin"></a>
            @endcan
            @can('delete', $video)
            <a href="{{ route('video.delete', $video) }}" class="fa fa-trash-o"></a>
            @endcan
            <a class="channel-name" href="#">{{ $video->user->name }}<span>
                    <i class="fa fa-check-circle"></i></span></a>
            <span class="views"><i class="fa fa-eye"></i>2.8M بازدید </span>
            <span class="date"><i class="fa fa-clock-o"></i>{{ $video->created_at_to_human }}</span>
            <span class="date"><i class="fa fa-tag"></i>{{ $video->category->name }}</span>
        </div>
    </div>
</div>
