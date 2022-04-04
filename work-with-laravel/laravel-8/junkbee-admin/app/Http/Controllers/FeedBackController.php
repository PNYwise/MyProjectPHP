<?php

namespace App\Http\Controllers;

use App\Models\FeedBack;
use Illuminate\Http\Request;

class FeedBackController extends Controller
{
    public function index()
    {
        $data = FeedBack::all();
        return view('feedback.feedbacks', [
            'feedbacks' => $data
        ]);
    }
}
