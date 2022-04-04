<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\FinalOrder;
use App\Models\FinalOrderDetail;
use App\Models\User;
use Illuminate\Http\Request;
use App\Traits\ApiResponser;

class StatisticController extends Controller
{

    use ApiResponser;
    public function defaultorderStatistic()
    {
        $data = FinalOrder::whereYear('created_at', date('Y'))->whereMonth('created_at', date('m'))
            ->where('status', 'completed')
            ->select('status', 'created_at')
            ->get()->map(function ($v, $i) {
                $v->date = $v->created_at->format('y-m-d');
                return $v;
            });

        $grouped = $data->groupBy('date')->map(function ($v, $i) {
            $v = count($v);
            return $v;
        });
        return ApiResponser::successResponse('data found', $grouped->toArray());
    }
    public function defaultuserStatistic()
    {

        $data = User::whereYear('created_at', date('Y'))->whereMonth('created_at', date('m'))
            ->whereNotIn('role', ['admin', 'manager', 'waste collector', 'customer rep'])
            ->select('role', 'created_at')
            ->orderBy('created_at', 'asc')
            ->get()->map(function ($v, $i) {
                $v->date = $v->created_at->format('y-m-d');
                return $v;
            });

        $grouped = $data->groupBy('date')->map(function ($v, $i) {
            $v = count($v);
            return $v;
        });

        return ApiResponser::successResponse('data found', $grouped->toArray());
    }
    public function defaultcollectionStatistic()
    {

        $data = FinalOrderDetail::whereYear('created_at', date('Y'))->whereMonth('created_at', date('m'))
            ->where('waste_type', 'plastic')
            ->select('waste_type', 'created_at')
            ->orderBy('created_at', 'asc')
            ->get()->map(function ($v, $i) {
                $v->date = $v->created_at->format('y-m-d');
                return $v;
            });

        $grouped = $data->groupBy('date')->map(function ($v, $i) {
            $v = count($v);
            return $v;
        });
        return ApiResponser::successResponse('data found', $grouped->toArray());
    }

    public function orderStatistic(Request $request)
    {
        $data = FinalOrder::whereDate('created_at', '>=', $request->start)->whereDate('created_at', '<=', $request->finish)
            ->where('status', $request->orderStatus)
            ->select('status', 'created_at')
            ->orderBy('created_at', 'asc')
            ->get()->map(function ($v, $i) {
                $v->date = $v->created_at->format('y-m-d');
                return $v;
            });

        $grouped = $data->groupBy('date')->map(function ($v, $i) {
            $v = count($v);
            return $v;
        });
        return ApiResponser::successResponse('data found', $grouped->toArray());
    }



    public function userStatistic(Request $request)
    {

        if ($request->role == 'all') {
            $data = User::whereDate('created_at', '>=', $request->start)->whereDate('created_at', '<=', $request->finish)
                ->whereNotIn('role', ['admin', 'manager', 'waste collector', 'customer rep'])
                ->select('role', 'created_at')
                ->orderBy('created_at', 'asc')
                ->get()->map(function ($v, $i) {
                    $v->date = $v->created_at->format('y-m-d');
                    return $v;
                });
        } else {
            $data = User::whereDate('created_at', '>=', $request->start)->whereDate('created_at', '<=', $request->finish)
                ->where('role', $request->role)
                ->select('role', 'created_at')
                ->orderBy('created_at', 'asc')
                ->get()->map(function ($v, $i) {
                    $v->date = $v->created_at->format('y-m-d');
                    return $v;
                });
        };

        $grouped = $data->groupBy('date')->map(function ($v, $i) {
            $v = count($v);
            return $v;
        });
        return ApiResponser::successResponse('data found', $grouped->toArray());
    }
    public function collectionStatistic(Request $request)
    {

        $data = FinalOrderDetail::whereDate('created_at', '>=', $request->start)->whereDate('created_at', '<=', $request->finish)
            ->where('waste_type', $request->type)
            ->select('waste_type', 'created_at')
            ->orderBy('created_at', 'asc')
            ->get()->map(function ($v, $i) {
                $v->date = $v->created_at->format('y-m-d');
                return $v;
            });

        $grouped = $data->groupBy('date')->map(function ($v, $i) {
            $v = count($v);
            return $v;
        });
        // dd($grouped->toArray());
        return ApiResponser::successResponse('data found', $grouped->toArray());
    }

    public function collectionMade()
    {
        $data = FinalOrder::all()->count();

        return ApiResponser::successResponse('data found', [$data]);
    }
    public function materialRecycled()
    {
        $data = FinalOrderDetail::all()->sum('waste_weight');
        return ApiResponser::successResponse('data found', [$data]);
    }
    public function treeSaved()
    {
        $data = FinalOrderDetail::where('waste_type', 'paper')->get()->sum('waste_weight');
        $data = floor($data / 54);
        return ApiResponser::successResponse('data found', [$data]);
    }
}
