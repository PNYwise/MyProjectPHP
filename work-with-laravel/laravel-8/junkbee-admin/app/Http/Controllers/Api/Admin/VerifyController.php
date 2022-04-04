<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Traits\ApiResponser;

class VerifyController extends Controller
{
    use ApiResponser;
    public function Verifylist()
    {
        $data = User::where('verified', 'verified')->get();
        return ApiResponser::successResponse('data found', $data);
    }
    public function verifyDetail($id)
    {
        $data =  User::find($id);

        return ApiResponser::successResponse('data found', $data);
    }
    public function verifyMember(Request $request)
    {
        User::where('id', $request->user_id)->update([
            'verified' => 1
        ]);
        $data = [];
        return ApiResponser::successResponse('', $data);
    }
}
