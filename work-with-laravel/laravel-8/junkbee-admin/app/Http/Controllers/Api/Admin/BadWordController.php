<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\BadWord;
use Illuminate\Http\Request;
use App\Traits\ApiResponser;

class BadWordController extends Controller
{
    use ApiResponser;

    public function list()
    {
        $data = BadWord::all();
        return ApiResponser::successResponse('data found', $data);
    }
    public function add(Request $request)
    {
        BadWord::create([
            'word' => $request->word
        ]);
        $data = BadWord::all();
        return ApiResponser::successResponse('data has been added', $data);
    }
    public function delete(Request $request)
    {
        BadWord::find($request->id)->delete();
        return ApiResponser::successResponse('data has been deleted', $data = []);
    }
}
