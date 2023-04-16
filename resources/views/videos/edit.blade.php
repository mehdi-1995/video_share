@extends('layouts.video')

@section('content')
    {{-- <div class="col-md-2 no-padding-left hidden-sm hidden-xs">
        <div class="left-sidebar">
            <div id="sidebar-stick">
                <ul class="menu-sidebar">
                    <li><a href="01-home.html"><i class="fa fa-home"></i>خانه</a></li>
                    <li><a href="#"><i class="fa fa-bolt"></i>رندوم</a></li>
                    <li><a href="14-history.html"><i class="fa fa-clock-o"></i>تاریخچه</a></li>
                    <li><a href="11-blog.html"><i class="fa fa-file-text"></i>وبلاگ</a></li>
                    <li><a href="10-upload.html"><i class="fa fa-upload"></i>آپلود</a></li>
                </ul>
                <ul class="menu-sidebar">
                    <li><a href="#"><i class="fa fa-edit"></i>ویرایش پروفایل</a></li>
                    <li><a href="#"><i class="fa fa-sign-out"></i>خروج</a></li>
                </ul>
                <ul class="menu-sidebar">
                    <li><a href="#"><i class="fa fa-gear"></i>تنظیمات</a></li>
                    <li><a href="#"><i class="fa fa-question-circle"></i>راهنما</a></li>
                    <li><a href="#"><i class="fa fa-send-o"></i>ارسال بازخورد</a></li>
                </ul>
            </div><!-- // sidebar-stick -->
            <div class="clear"></div>
        </div><!-- // left-sidebar -->
    </div> --}}
    <div id="upload">
        <div class="row">
            <!-- upload -->
            <div class="col-md-8">
                <x-error-validation></x-error-validation>
                <h1 class="page-title"><span>@lang('public.upload') </span>@lang('public.film')</h1>
                <form action="{{ route('video.update', $video) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="col-md-6">
                            <label>@lang('public.title')</label>
                            <input name="title" type="text" value="{{ $video->title }}" class="form-control"
                                placeholder="{{ __('public.title') }}">
                        </div>
                        <div class="col-md-6">
                            <label>@lang('public.slug')</label>
                            <input name="slug" type="text" value="{{ $video->slug }}" class="form-control"
                                placeholder="{{ __('public.slug') }}">
                        </div>
                        <div class="col-md-6">
                            <label>@lang('public.categories')</label>
                            <select name="category_id" id="" class="form-control">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ $category->id == $video->category_id ? 'selected' : '' }}>{{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label>@lang('public.upload_file')</label>
                            <input name="path" id="upload_file" type="file" class="form-control">
                        </div>
                        <div class="col-md-12">
                            <label>@lang('public.description')</label>
                            <textarea name="description" class="form-control" rows="4" placeholder="{{ __('public.description') }}">{{ $video->description }}</textarea>
                        </div>
                        <div class="col-md-6">
                            <button type="submit" id="contact_submit" class="btn btn-dm">@lang('public.store')</button>
                        </div>
                    </div>
                </form>
            </div><!-- // col-md-8 -->

            <div class="col-md-4">
                <a href="#"><img src="/demo_img/upload-adv.png" alt=""></a>
            </div><!-- // col-md-8 -->
            <!-- // upload -->
        </div><!-- // row -->
    </div><!-- // upload -->
@endsection
