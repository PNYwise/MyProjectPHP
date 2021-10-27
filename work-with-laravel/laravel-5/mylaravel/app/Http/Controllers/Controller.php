<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


use Illuminate\Support\Facades\DB;
use PDF;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function cetaknota($notatrans)
    {
        $transaction = DB::table('transactions')->select('transactions.*')->where('transactions.nota', $notatrans)->get();
        
        $nt = DB::table('transactions')->join('details', 'transactions.nota', '=' , 'details.nota')->join('products' , 'products.id', '=', 'details.id')->where('transactions.nota', $notatrans)->select('transactions.*', 'details.lama', 'details.subtotal' , 'products.nm_product','products.harga')->get();
        $pdf = PDF::loadView("nota.nota",compact('nt','transaction'));
        return $pdf->stream("nota.pdf");
        // return view('nota.nota');
    }
}
