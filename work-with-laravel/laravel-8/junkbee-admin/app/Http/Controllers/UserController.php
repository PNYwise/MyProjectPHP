<?php

namespace App\Http\Controllers;

use App\Models\FinalOrder;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function userData()
    {
        $data = User::where('role', 'user')->orWhere('role', 'beever')->orderBy('created_at', 'desc')->get();
        return view('user.userData', [
            'users' => $data
        ]);
    }
    public function detailUser($id)
    {
        $user = User::find($id);
        // dd($cenceledOrderBeever);

        $role = ['beever', 'manager', 'customer rep', 'user', 'waste collector'];
        return view('user.userDetail', [
            'user' => $user,
            'role' => $role,
            // 'suceedOrder' => $suceedOrder,
            // 'cenceledOrder' => $cenceledOrder,
            // 'suceedOrderBeever' => $suceedOrderBeever,
            // 'cenceledOrderBeever' => $cenceledOrderBeever,
        ]);
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

        return response()->json([
            'suceedOrder' => $suceedOrder,
            'cenceledOrder' => $cenceledOrder,
            'suceedOrderBeever' => $suceedOrderBeever,
            'cenceledOrderBeever' => $cenceledOrderBeever,
        ], 200);
    }

    public function suspend(Request $request)
    {

        User::where('id', $request->id)->update([
            'active' => '0'
        ]);
        return back();
    }
    public function unSuspend(Request $request)
    {

        User::where('id', $request->id)->update([
            'active' => '1'
        ]);
        return back();
    }

    public function changeRole(Request $request)
    {
        User::where('id', $request->id)->update([
            'role' => $request->role
        ]);
        return back();
    }

    public function delete(Request $request)
    {
        User::where('id', $request->id)->delete();
        toast('success!', 'success');
        return redirect('dashboard/userdata');
    }


    public function setting()
    {
        $data = User::find(auth()->user()->id);

        return view('account.setting', [
            'user' => $data
        ]);
    }
}
