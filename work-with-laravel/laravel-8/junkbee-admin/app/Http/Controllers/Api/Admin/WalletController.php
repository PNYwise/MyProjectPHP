<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\WalletTransaction;
use App\Traits\ApiResponser;

class WalletController extends Controller
{
    use ApiResponser;
    public function walletTransactrion()
    {
        $data = WalletTransaction::all()->map(function ($v, $i) {
            $v->user->full_name;

            return $v;
        });
        return ApiResponser::successResponse('data found', $data);
    }
}
