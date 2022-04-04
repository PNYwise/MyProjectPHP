<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Traits\ApiResponser;

class WasteCollectorController extends Controller
{
    use ApiResponser;

    public function wasteCollerctorList()
    {
        $data = User::where('role', 'waste collector')->orderBy('created_at', 'desc')->get();
        return ApiResponser::successResponse('data found', $data);
    }
}
