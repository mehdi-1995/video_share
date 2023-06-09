@extends('layouts.video')

@section('content')
    <div id="all-output" class="col-md-12">
        <x-alert></x-alert>
        <h1 class="new-video-title"><i class="fa fa-film"></i> آخرین ویدیو‌ها</h1>
        <div class="row">

            <!-- video-item -->
            @foreach ($latestVideos as $video)
                <x-video-shaer :video="$video"></x-video-shaer>
            @endforeach
            <!-- video-item -->

        </div>

        <h1 class="new-video-title"><i class="fa fa-film"></i> پربازدیدترین ویدیوها</h1>
        <div class="row">

            <!-- video-item -->
            @foreach ($mostViewedVideos as $video)
                <x-video-shaer :video="$video"></x-video-shaer>
            @endforeach
            <!-- video-item -->

        </div>

        <h1 class="new-video-title"><i class="fa fa-film"></i> محبوب‌ترین‌ها</h1>
        <div class="row">

            <!-- video-item -->
            @foreach ($popularVideos as $video)
                <x-video-shaer :video="$video"></x-video-shaer>
            @endforeach
            <!-- video-item -->

        </div>
    </div><!-- // row -->
@endsection
