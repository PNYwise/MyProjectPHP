<?php

namespace App\Http\Controllers\Api\WasteCollector;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\ApiResponser;
use Illuminate\Support\Facades\Validator;
use App\Models\FinalOrder;
use App\Models\FinalOrderDetail;
use App\Models\Image;
use App\Models\User;
use App\Models\WalletTransaction;

class WasteCollectorController extends Controller
{
    use apiResponser;

    public function confirmOrder(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'waste_weight' => 'required',
            'total_weight' => 'required',
            'subtotal' => 'required',
            'total' => 'required'
        ]);
        if ($validator->fails()) {
            return ApiResponser::errorResponse($validator->getMessageBag(), 400);
        }

        FinalOrderDetail::where('order_code', $request->order_code)->update([
            'waste_type' => $request->waste_type,
            'waste_weight' => $request->waste_weight,
            'subtotal' => $request->subtotal
        ]);

        FinalOrder::where('order_code', $request->order_code)->update([
            'total_weight' => $request->total_weight,
            'total' => $request->total,
            'fee_beever' => $request->fee_beever,
            'status' => 'completed'
        ]);

        if ($files = $request->file('images')) {
            foreach ($files as $value) {
                $imageName = time() . '-' . $value->getClientOriginalName();
                $path = env('PUBLIC_DIR') . 'storage/order-images';
                $value->move($path, $imageName);
                Image::create([
                    'directory' => $imageName,
                    'order_code' => $request->order_code,
                    'user_id' => auth()->user()->id,
                    'waste_type' => $request->waste_type
                ]);
            };
        }
        $data = FinalOrder::where('order_code', $request->order_code)->get();
        /*
        |
        |Send notification.
        |
        */
        return ApiResponser::successResponse('data has been created', $data);
    }

    public function collectionHistory()
    {
        $data = FinalOrder::where('waste_collector_id', auth()->user()->id)->latest()->filter(request(['search', 'type', 'start_date', 'finish_date']))
            ->get()
            ->map(function ($v, $i) {
                $v->user_name = $v->user->full_name;
                if ($v->driver_id) {
                    $v->driver_name = $v->driver->full_name;
                }
                if ($v->waste_collector_id) {
                    $v->waste_collector_name = $v->wastecollector->full_name;
                }
                return $v;
            })
            ->makeHidden(['user_id', 'driver_id', 'waste_collector_id', 'user', 'driver', 'wastecollector']);
        return ApiResponser::successResponse('data found', $data);
    }

    public function releaseCash(Request $request)
    {
        $findOrder = FinalOrder::where('waste_collector_id', auth()->user()->id)
            ->where('oreder_code', $request->order_code)
            ->get();
        $userFee = $findOrder->total;
        $driverFee = $findOrder->fee_beever;

        user::find($findOrder->user_id)->increment('balance', $userFee);
        user::find($findOrder->driver_id)->increment('balance', $driverFee);
        User::find(auth()->user()->id)->decrement('balance', $findOrder->total + $findOrder->fee_beever);

        WalletTransaction::create([
            'id_transaction' => 'RLS' . date('dmyhm') . $findOrder->user_id,
            'user_id' => auth()->user()->id,
            'type' => 'released',
            'to' => $findOrder->user_id,
            'number' => '-',
            'amount' => $findOrder->total,
            'status' => 'success'
        ]);

        WalletTransaction::create([
            'id_transaction' => 'RLS' . date('dmyhm') . $findOrder->driver_id,
            'user_id' => auth()->user()->id,
            'type' => 'released',
            'to' => $findOrder->driver_id,
            'number' => '-',
            'amount' => $findOrder->fee_beever,
            'status' => 'success'
        ]);

        /*
        |
        | push notification again huh...
        |
        */

        return ApiResponser::successResponse('data has been created', $data = [
            'user_fee'  => $userFee,
            'driver_fee' => $driverFee,
            'balance' => User::find(auth()->user()->id)->balance
        ]);
    }
    public function getCollectionByOrderCode($orderCode)
    {
        $data = FinalOrder::where('order_code', $orderCode)->get();
        if (is_null($data)) {
            return ApiResponser::errorResponse(['order code not found'], 404);
        }
        return ApiResponser::successResponse('data found', $data, 200);
    }
}
