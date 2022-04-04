<?php

namespace App\Http\Controllers;

use App\Models\FinalOrder;
use App\Models\FinalOrderDetail;
use App\Models\Image;
use Illuminate\Http\Request;

class CollectionController extends Controller
{
    public function allCollection()
    {
        $collection =  FinalOrder::Where('status', 'on going')
            ->orWhere('status', 'completed')
            ->orderBy('date', 'desc')->get();
        return view('collections.allCollection', [
            'collections' => $collection
        ]);
    }

    public function disputeCollection()
    {
        $collection =  FinalOrder::where('status', 'requested')
            ->orWhere('status', 'beever_requested')
            ->orWhere('status', 'cenceled')
            ->orWhere('status', 'beever_cenceled')
            ->orderBy('date', 'desc')->get();
        return view('collections.disputeCollection', [
            'collections' => $collection
        ]);
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
        return back();
    }

    public function cencel(Request $request)
    {
        FinalOrder::where('order_code', $request->cencel)->update([
            'status' => 'on going',
        ]);
        return back();
    }


    public function allCollectionDetail($order_code)
    {
        $collection =  FinalOrder::where('order_code', $order_code)->get();
        $detailCollection =  FinalOrderDetail::where('order_code', $order_code)->get();
        return view('collections.detailCollection', [
            'collections' => $collection,
            'detailCollection' => $detailCollection,
        ]);
    }
}
