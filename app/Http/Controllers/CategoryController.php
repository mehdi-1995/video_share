<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request, Category $category)
    {
        dd($request->all());
        $videos = $category->videos->load('user', 'category')->all();
        $name = $category->name;
        return view('videos.index', compact('videos', 'name'));
    }
}
