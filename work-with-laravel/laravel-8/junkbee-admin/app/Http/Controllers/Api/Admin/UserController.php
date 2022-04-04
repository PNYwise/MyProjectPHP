<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\FinalOrder;
use App\Models\User;
use Illuminate\Http\Request;
use App\Traits\ApiResponser;

class UserController extends Controller
{
    use ApiResponser;
    public function userData()
    {
        $data = User::where('role', 'user')->orWhere('role', 'beever')->orderBy('created_at', 'desc')->get();
        return ApiResponser::successResponse('data found', $data);
    }
    public function detailUser($id)
    {
        $data = User::find($id);
        return ApiResponser::successResponse('data found', $data);
    }
    public function userStratistic($id)
    {
        $cenceledOrder = FinalOrder::where('user_id', $id)->where('status', 'cenceled')
            ->select('status')
            ->get()
            ->groupBy('status')->map(function ($v, $i) {
                $v = count($v);
                return $v;
            });
        $suceedOrder = FinalOrder::where('user_id', $id)->where('status', 'completed')
            ->select('status')
            ->get()
            ->groupBy('status')->map(function ($v, $i) {
                $v = count($v);
                return $v;
            });
        $cenceledOrderBeever = FinalOrder::where('driver_id', $id)->where('status', 'beever_cenceled')
            ->select('status')
            ->get()
            ->groupBy('status')->map(function ($v, $i) {
                $v = count($v);
                return $v;
            });
        $suceedOrderBeever = FinalOrder::where('driver_id', $id)->where('status', 'completed')
            ->select('status')
            ->get()
            ->groupBy('status')->map(function ($v, $i) {
                $v = count($v);
                return $v;
            });


        $data = [
            'suceedOrder' => $suceedOrder,
            'cenceledOrder' => $cenceledOrder,
            'suceedOrderBeever' => $suceedOrderBeever,
            'cenceledOrderBeever' => $cenceledOrderBeever,
        ];
        return ApiResponser::successResponse('data found', $data);
    }

    public function suspend(Request $request)
    {
        User::where('id', $request->id)->update([
            'active' => '0'
        ]);
        $data = [];
        return ApiResponser::successResponse('user has been suspended', $data);
    }
    public function unSuspend(Request $request)
    {

        User::where('id', $request->id)->update([
            'active' => '1'
        ]);

        $data = [];
        return ApiResponser::successResponse('Unsuspend success', $data);
    }

    public function changeRole(Request $request)
    {
        User::where('id', $request->id)->update([
            'role' => $request->role
        ]);
        $data = [];
        return ApiResponser::successResponse('role has been changed', $data);
    }

    public function delete(Request $request)
    {
        User::where('id', $request->id)->delete();
        toast('success!', 'success');
        $data = [];
        return ApiResponser::successResponse('User Has Been deleted', $data);
    }


    public function setting()
    {
        $data = User::find(auth()->user()->id);
        return ApiResponser::successResponse('data found', $data);
    }
}
