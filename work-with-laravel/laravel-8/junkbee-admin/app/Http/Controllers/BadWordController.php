<?php

namespace App\Http\Controllers;

use App\Models\BadWord;
use Illuminate\Http\Request;

class BadWordController extends Controller
{
    public function list()
    {
        $data = BadWord::all();
        return view('badword.badwordList', ['data' => $data]);
    }
    public function add(Request $request)
    {
        BadWord::create([
            'word' => $request->word
        ]);
        return back();
    }
    public function delete(Request $request)
    {
        BadWord::find($request->id)->delete();
        return back();
    }
}
