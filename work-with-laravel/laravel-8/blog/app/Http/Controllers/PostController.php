<?php

namespace App\Http\Controllers;
use App\Models\post;
use App\Models\category;
use App\Models\user;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $title ="";
        if (request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            $title = "in $category->name";
        }
        if (request('author')) {
            $author = User::firstWhere('username', request('author'));
            $title = "by $author->name";
        }
        return view('pages/posts', [
            'title' => "All Posts $title",
            'active' => 'posts',
            'posts'=> Post::latest()->filter(request(['search','category', 'author']))->paginate(7)->withQueryString()
        ]);
    }
    public function show(post $post)
    {
        return view('pages/post',[
            'title'=>'Single Post',
            'active' => 'posts',
            'post'=> $post
        ]);
    }
}
