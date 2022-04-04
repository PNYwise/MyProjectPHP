<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdatePasswordRequest;
use Illuminate\Support\Facades\Hash;

use App\Traits\ApiResponser;

class PasswordController extends Controller
{
    /**
     * @param UpdatePasswordRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */

    use ApiResponser;
    public function update(UpdatePasswordRequest $request)
    {
        $request->user()->update([
            'full_name' => $request->full_name,
            'password' => Hash::make($request->password)
        ]);
        return ApiResponser::successResponse('data found',);
    }
}
