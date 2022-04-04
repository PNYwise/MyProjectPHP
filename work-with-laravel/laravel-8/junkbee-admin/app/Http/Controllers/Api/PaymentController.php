<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\WalletTransaction;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Xendit\Xendit;


class PaymentController extends Controller
{
    private $token = 'xnd_development_0PDbEJb2mkNKM15d5PkbtaseGcBYa6YWkPJESpav9c0Pvzm367GynOmIaZ3azaM';


    public function getListVA()
    {

        Xendit::setApiKey($this->token);
        $getVABanks = \Xendit\VirtualAccounts::getVABanks();

        return response()->json($getVABanks, 200);
    }

    public function createVA(Request $request)
    {
        Xendit::setApiKey($this->token);

        $externalId = "VA-" . time();
        $params = [
            "external_id" => $externalId,
            "bank_code" => $request->bank_code,
            "name" => auth()->user()->full_name,
            "email" => auth()->user()->email,
        ];


        WalletTransaction::create([
            'id_transaction' => $externalId,
            'user_id' => auth()->user()->id,
            'payment_channel' => 'Virtual-Account',
            'type' => 'topup',
            'to' => 'JUNKBEE',
            'number' => '0',
            'amount' => '0',
            'status' => 0,
        ]);

        $createVA = \Xendit\VirtualAccounts::create($params);
        return response()->json($createVA, 200);
    }


    public function callbackVA(Request $request)
    {
        $externalId = $request->external_id;
        $number = $request->account_number;
        $amount = $request->amount;

        $payment = WalletTransaction::where('id_transaction', $externalId)->exists();

        if ($payment) {
            $update = WalletTransaction::where('id_transaction', $externalId)->update([
                'status' => 1,
                'amount' => $amount,
                'number' => $number,
            ]);


            $userId = WalletTransaction::where('id_transaction', $externalId)->get()->map(function ($v, $i) {
                return $v->user_id;
            });
            $userAmount = User::where('id', $userId)->increment('balance', $amount);

            // send notif

            if ($update > 0 && $userAmount > 0) {
                return response()->json('transaction success', 200);
            }
            return response()->json('transaction failed', 400);
        } else {
            return response()->json('data not found', 400);
        }
    }


    public function getListDisbursements()
    {
        Xendit::setApiKey($this->token);
        $getDisbursementsBanks = \Xendit\Disbursements::getAvailableBanks();
        return response()->json($getDisbursementsBanks, 200);
    }

    public function createDisbursement(Request $request)
    {
        Xendit::setApiKey($this->token);

        $externalId = 'disb-' . time();

        $params = [
            'external_id' => $externalId,
            'amount' => $request->amount,
            'bank_code' => $request->bank_code,
            'account_holder_name' => $request->account_holder_name,
            'account_number' => $request->account_number,
            'X-IDEMPOTENCY-KEY' => time(),
            "description" => ""
        ];

        WalletTransaction::create([
            'id_transaction' => $externalId,
            'user_id' => $request->user_id,
            'payment_channel' => 'Virtual-Account',
            'type' => 'withdraw',
            'to' => $request->bank_code,
            'number' => '0',
            'amount' => $request->amount,
            'status' => 0,
        ]);

        $createDisbursement = \Xendit\Disbursements::create($params);
        return response()->json($createDisbursement, 200);
    }

    public function callbackDisbursement(Request $request)
    {
        $externalId = $request->external_id;
        $number = $request->account_number;
        $amount = $request->amount;

        $payment = WalletTransaction::where('id_transaction', $externalId)->exists();

        if ($payment) {
            $update = WalletTransaction::where('id_transaction', $externalId)->update([
                'status' => 1,
                'amount' => $amount,
                'number' => $number,
            ]);
            $userId = WalletTransaction::where('id_transaction', $externalId)->get()->map(function ($v, $i) {
                return $v->user_id;
            });
            $userAmount = User::where('id', $userId)->decrement('balance', $amount);

            if ($update > 0 && $userAmount > 0) {
                return response()->json('transaction success', 200);
            }
        } else {
            return response()->json('data not found', 400);
        }
    }
}
