<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\FinalOrder;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;

class CollectionController extends Controller
{
    use ApiResponser;

    public function allCollection()
    {
        $data =  FinalOrder::where('status', 'on going')
            ->orWhere('status', 'completed')
            ->orderBy('date', 'desc')->get()
            ->map(function ($v, $i) {
                $v->user_name = $v->user->full_name;
                if ($v->driver_id) {
                    $v->driver_name = $v->driver->full_name;
                }
                if ($v->waste_collector_id) {
                    $v->waste_collector_name = $v->wastecollector->full_name;
                }
                return $v;
            });
        return ApiResponser::successResponse('data found', $data);
    }

    public function disputeCollection()
    {
        $data =  FinalOrder::where('status', 'requested')
            ->orWhere('status', 'closed')
            ->orWhere('status', 'beever_requested')
            ->orWhere('status', 'cenceled')
            ->orWhere('status', 'beever_cenceled')
            ->orderBy('date', 'desc')->get()
            ->map(function ($v, $i) {
                $v->user_name = $v->user->full_name;
                if ($v->driver_id) {
                    $v->driver_name = $v->driver->full_name;
                }
                if ($v->waste_collector_id) {
                    $v->waste_collector_name = $v->wastecollector->full_name;
                }
                return $v;
            });
        return ApiResponser::successResponse('data found', $data);
    }


    public function accept(Request $request)
    {
        if ($request->role_accept == 'beever_requested') {
            FinalOrder::where('order_code', $request->accept)->update([
                'status' => 'beever_cenceled',
            ]);
        } else {
            FinalOrder::where('order_code', $request->accept)->update([
                'status' => 'cenceled',
            ]);
        }
        return ApiResponser::successResponse('order has been cenceled', $data = []);
    }

    public function cencel(Request $request)
    {
        FinalOrder::where('order_code', $request->cencel)->update([
            'status' => 'on going',
        ]);
        return ApiResponser::successResponse('order has been cenceled', $data = []);
    }


    public function allCollectionDetail($order_code)
    {
        $data =  FinalOrder::where('order_code', $order_code)->get()->map(function ($v, $i) {
            $v->user->full_name;
            $v->driver->full_name;
            $v->detail;
            $v->images;

            return $v;
        });

        return ApiResponser::successResponse('data found', $data);
    }
}
