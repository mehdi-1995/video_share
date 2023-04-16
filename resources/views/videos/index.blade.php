@extends('layouts.video')

@section('content')
    <div id="all-output" class="col-md-12">
        <h1 class="new-video-title"><i class="fa fa-bolt"></i>{{ $name }}</h1>
        <div class="row">

            <!-- video-item -->
            @foreach ($videos as $video)
                <x-video-shaer :video="$video"></x-video-shaer>
            @endforeach
            <!-- video-item -->

        </div>
    </div><!-- // row -->
@endsection
