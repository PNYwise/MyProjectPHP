<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class WasteCollectorController extends Controller
{
    public function wasteCollerctorList()
    {
        $data = User::where('role', 'waste collector')->orderBy('created_at', 'desc')->get();
        return view('wasteCollector.wasteCollector', [
            'wasteCollectors' => $data
        ]);
    }
}
