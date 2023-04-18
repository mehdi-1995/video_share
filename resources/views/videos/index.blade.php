@extends('layouts.video')

@section('content')
    <div id="all-output" class="col-md-12">

        <form>
            <div class="row">
                <div class="form-group col-md-3">
                    <label for="inputCity">ترتیب براساس</label>
                    <select name="sortBy" class="form-control">
                        <option value="like" محبوبیت</option>
                        <option value="duration" مدت زمان</option>
                        <option value="created_at" جدیدترین</option>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="inputCity">مدت زمان</label>
                    <select name="length" id="inputState" class="form-control">
                        <option value="0" همه</option>
                        <option value="1" کمتر از یک دقیقه</option>
                        <option value="2" 1 تا 5 دقیقه</option>
                        <option value="3" بیشتر از 5 دقیقه</option>
                    </select>
                </div>
                <input type="hidden" name="q" value="{{ request()->query('q') }}">
                <div class="form-group col-md-3" style="margin-top: 29px">
                    <button class="btn btn-primery">فیلتر</button>
                </div>
            </div>
        </form>
        <h1 class="new-video-title"><i class="fa fa-film"></i>{{ $name }}</h1>
        <div class="row">

            <!-- video-item -->
            @foreach ($videos as $video)
                <x-video-shaer :video="$video"></x-video-shaer>
            @endforeach
            <!-- video-item -->

        </div>
    </div><!-- // row -->
@endsection
