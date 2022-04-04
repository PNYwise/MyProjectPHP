<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ManagerController extends Controller
{
    public function managerList()
    {
        $data = User::where('role', 'manager')->orderBy('created_at', 'desc')->get();
        return view('manager.managerData', [
            'managers' => $data
        ]);
    }

    public function addmanager(Request $request)
    {
        $validateData = Validator::make($request->all(), [
            'full_name' => 'required',
            'email' => 'required|unique:users|email',
            'phone' => 'required',
            'address' => 'required|max:255',
        ]);

        if ($validateData->fails()) {
            foreach ($validateData->errors()->getMessages() as $data) {
                toast($data, 'error');
            }
            return back();
        }
        User::create([
            'full_name' => $request->full_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'role' => 'manager',
            'active' => 1,
            'verified' => 1,
            'password' => bcrypt('password'),
        ]);
        toast("add data success! default password is 'password'", 'success');
        return back();
    }
}
