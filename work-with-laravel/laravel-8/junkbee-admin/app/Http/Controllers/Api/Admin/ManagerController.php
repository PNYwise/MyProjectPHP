<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Traits\ApiResponser;

class ManagerController extends Controller
{
    use ApiResponser;

    public function managerList()
    {
        $data = User::where('role', 'manager')->orderBy('created_at', 'desc')->get();
        return ApiResponser::successResponse('data found', $data);
    }

    public function addmanager(Request $request)
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
            'role' => 'manager',
            'active' => 1,
            'verified' => 1,
            'password' => bcrypt('password'),
        ]);
        $data = [];
        return ApiResponser::successResponse('data has been added', $data);
    }
}
