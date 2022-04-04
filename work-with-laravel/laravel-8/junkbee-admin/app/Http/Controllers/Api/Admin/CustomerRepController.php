<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Traits\ApiResponser;

class CustomerRepController extends Controller
{
    use ApiResponser;

    public function customerRepList()
    {
        $data = User::where('role', 'customer rep')->orderBy('created_at', 'desc')->get();

        return ApiResponser::successResponse('data found', $data);
    }

    public function addCustomerRep(Request $request)
    {
        $validateData = Validator::make($request->all(), [
            'full_name' => 'required',
            'email' => 'required|unique:users|email',
            'phone' => 'required',
            'address' => 'required|max:255',
        ]);
        if ($validateData->fails()) {
            return ApiResponser::errorResponse($validateData->getMessageBag(), 400);
        }
        User::create([
            'full_name' => $request->full_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'role' => 'customer rep',
            'active' => 1,
            'verified' => 1,
            'password' => bcrypt('password'),
        ]);
        $data = [];
        return ApiResponser::successResponse('data has been added', $data);
    }
}
