@extends('layouts.video')

@section('content')
    <div id="all-output" class="col-md-12">
        <h1 class="new-video-title"><i class="fa fa-bolt"></i> آخرین ویدیو‌ها</h1>
        <div class="row">

            <!-- video-item -->
            @foreach ($latestVideos as $video)
                <x-video-shaer :video="$video"></x-video-shaer>
            @endforeach
            <!-- video-item -->

        </div>

        <h1 class="new-video-title"><i class="fa fa-bolt"></i> پربازدیدترین ویدیوها</h1>
        <div class="row">

            <!-- video-item -->
            @foreach ($mostViewedVideos as $video)
                <x-video-shaer :video="$video"></x-video-shaer>
            @endforeach
            <!-- video-item -->

        </div>

        <h1 class="new-video-title"><i class="fa fa-bolt"></i> محبوب‌ترین‌ها</h1>
        <div class="row">

            <!-- video-item -->
            @foreach ($popularVideos as $video)
                <x-video-shaer :video="$video"></x-video-shaer>
            @endforeach
            <!-- video-item -->

        </div>
    </div><!-- // row -->
@endsection
