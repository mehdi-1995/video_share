<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $latestVideos = Video::latest()->get()->take(6);
        $mostViewedVideos = Video::all()->random(6);
        $popularVideos = Video::all()->random(6);
        return view('index', compact('latestVideos', 'mostViewedVideos', 'popularVideos'));
    }
}
