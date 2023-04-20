<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryVideoController extends Controller
{
    public function index(Request $request, Category $category)
    {
        $videos = $category
            ->videos()
            ->Filter($request->all())
            // ->get()
            // ->load('user', 'category')
            // ->all()
            ->paginate(6)
            ->withQueryString();
        $name = $category->name;
        return view('videos.index', compact('videos', 'name'));
    }
}
