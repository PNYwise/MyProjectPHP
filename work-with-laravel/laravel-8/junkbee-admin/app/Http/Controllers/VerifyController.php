<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class VerifyController extends Controller
{
    public function Verifylist()
    {
        $data = User::where('verified', '0')->get();
        return view('verify.verify', [
            'verifylist' => $data
        ]);
    }
    public function verifyDetail($id)
    {
        $data =  User::find($id);

        return view('verify.verifydetail', [
            'user' => $data
        ]);
    }
    public function verifyMember(Request $request)
    {
        User::where('id', $request->user_id)->update([
            'verified' => 1,
            'role' => 'beever'
        ]);
        $user = User::find($request->user_id);
        toast("User $user->full_name has beed verified! ", "success");
        return redirect('/dashboard/verify');
    }
}
