<?php

namespace App\Http\Controllers;

use App\Models\WalletTransaction;


class WalletController extends Controller
{
    public function walletTransactrion()
    {
        $data = WalletTransaction::all();
        return view('wallet.transactions', [
            'wallets' => $data
        ]);
    }
}
