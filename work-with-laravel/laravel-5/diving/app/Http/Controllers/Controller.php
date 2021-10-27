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
        $transaction = DB::table('transaksis')->select('transaksis.*')->where('transaksis.nota', $notatrans)->get();
        $nt = DB::table('transaksis')->join('details', 'transaksis.nota', '=', 'details.nota')->join('barangs', 'barangs.id', '=', 'details.id')->where('transaksis.nota', $notatrans)->select('transaksis.*', 'details.*','barangs.*')->get();
        $pdf = PDF::loadView("nota.nota", compact('nt', 'transaction'));
        return $pdf->stream("nota.pdf");
        
    }
}
