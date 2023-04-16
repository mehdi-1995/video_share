<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Category $category)
    {
        $videos = $category->videos->all();
        $name = $category->name;
        return view('videos.index', compact('videos', 'name'));
    }
}
