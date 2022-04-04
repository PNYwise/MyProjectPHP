<?php

namespace App\Http\Controllers;

use App\Models\Waste;
use Illuminate\Http\Request;

class WasteController extends Controller
{
    public function index()
    {
        $data = Waste::all();

        return view('waste.list', ['wastes' => $data]);
    }

    public function create(Request $request)
    {
        Waste::create([
            'type' => $request->type,
            'price' => $request->price
        ]);

        return back();
    }

    public function update(Request $request)
    {
        Waste::find($request->id)->update([
            'type' => $request->type,
            'price' => $request->price
        ]);
        return back();
    }
    public function delete(Request $request)
    {
        Waste::find($request->id)->delete();
        return back();
    }
}
