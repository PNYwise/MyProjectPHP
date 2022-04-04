<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class PublicPagesController extends Controller
{
    public function news($slug)
    {
        $data = News::where('slug', $slug)->get()->map(function ($v, $i) {
            $v->user->full_name;
            return $v;
        });

        return view('publicPages.news', ['news' => $data]);
    }
}
