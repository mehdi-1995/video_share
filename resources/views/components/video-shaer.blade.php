<div class="col-lg-2 col-md-4 col-sm-6">
    <div class="video-item">
        <div class="thumb">
            <div class="hover-efect"></div>
            <small class="time">{{ $video->duration_to_human }}</small>
            <a href="#"><img src="{{ $video->thumbnail }}" alt=""></a>
        </div>
        <div class="video-info">
            <a href="#" class="title">{{ $video->title }}</a>
            <a href="#" class="fa fa-pencil"></a>
            <a class="channel-name" href="#">{{ $video->user->name }}<span>
                    <i class="fa fa-check-circle"></i></span></a>
            <span class="views"><i class="fa fa-eye"></i>2.8M بازدید </span>
            <span class="date"><i class="fa fa-clock-o"></i>{{ $video->created_at_to_human }}</span>
            <span class="date"><i class="fa fa-tag"></i>{{ $video->category->name }}</span>
        </div>
    </div>
</div>
