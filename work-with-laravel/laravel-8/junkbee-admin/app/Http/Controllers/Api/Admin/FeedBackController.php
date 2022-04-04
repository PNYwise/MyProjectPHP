<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\FeedBack;
use App\Traits\ApiResponser;

class FeedBackController extends Controller
{
    use ApiResponser;

    public function index()
    {
        $data = FeedBack::all()->map(function ($v, $i) {
            $v->user->full_name;
            return $v;
        });
        return ApiResponser::successResponse('data found', $data);
    }
}
