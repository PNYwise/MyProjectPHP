<?php

namespace App\Http\Controllers;

use DateTime;
use App\detail;
use App\barang;
use App\transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use UxWeb\SweetAlert\SweetAlert;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = Date('dmY');
        $tanggal = Date('d-m-Y');
        $mulai = Date('H:i');
        $barang = barang::all();

        $transaksi = DB::table('transaksis')->select(DB::raw('MAX(id) as nomornota'));
        //dd($transaction);
        if ($transaksi->count() > 0) {
            foreach ($transaksi->get() as $no) {
                $tmp = ((int)$no->nomornota) + 1;
                $nota = "N" . $tgl . sprintf('%04s', $tmp);
            }
        } else {
            $nota = "N" . $tgl . "0001";
        }

        $total = DB::table('details')->select(DB::raw('SUM(subtotal) as grantot, nota'))->where('nota', $nota)->groupBy('nota')->first();
        if ($total) {
            $grantot = $total->grantot;
        } else {
            $grantot = '0';
        }

        $lama = DB::table('details')->select(DB::raw('SUM(lama) as lamanya, nota'))->where('nota', $nota)->groupBy('nota')->first();
        if ($lama) {
            $selesai = $lama->lamanya;
        } else {
            $selesai = 0;
        }
        $jam = date('H');
        $menit = date('i');
        $hasil = $jam + $selesai;
        if ($hasil > 23) {
            $hasil = $hasil - 24;
        }
        if ($hasil < 10) {
            $hasil = '0' . $hasil;
        }
        if ($lama) {
            $selesai = $hasil . ':' . $menit;
        } else {
            $selesai = "0";
        }
        return view('transaksi.transaksi', compact('tanggal','mulai','nota','selesai', 'grantot', 'barang'));
    }
    public function getdetail(Request $request)
    {
        $detail = DB::select("SELECT * FROM barangs, details WHERE barangs.id = details.id AND details.nota='" . $request->nota . "'");
        return response()->json($detail);
    }

    public function simpandetail(Request $req)
    {
        $same = DB::table('details')->where('id', $req->get('jenis'))
        ->where('nota', $req->get('nota'))->first();
        if ($same) {
            $lama1 = $same->lama;
            $qty1 = $same->qty;
            $subtot1 = $same->subtotal;
            $finallama = $lama1 + $req->get('lama');
            $finalsubtot = $subtot1 + $req->get('subtotal');
            $finalqty = $qty1 + $req->get('qty');
            DB::table('details')->where('id', $req->get('jenis'))
            ->where('nota', $req->get('nota'))
            ->update(['lama' => $finallama, 'subtotal' => $finalsubtot ,'qty' => $finalqty]);
        } else {
            $detail = new detail;
            $detail->nota = $req->get('nota');
            $detail->id = $req->get('jenis');
            $detail->lama = $req->get('lama');
            $detail->qty = $req->get('qty');
            $detail->subtotal = $req->get('subtotal');
            $detail->save();
        }
        return back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tanggal = Date('Y-m-d', strtotime($request->get('tanggal')));
        $nota = $request->get('nota');
        $transaction = new transaksi;
        $transaction->nota = $request->get('nota');
        $transaction->kasir = $request->get('kasir');
        $transaction->tanggal = $tanggal;
        $transaction->mulai = $request->get('mulai');
        $transaction->ahir = $request->get('selesai');
        $transaction->total = $request->get('total');
        // dd($request);
        $transaction->save();
        $result = [
            "status" => 200,
            "notatrans" => $nota
        ];
        return redirect()->back()->with($result);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transaksi = transaksi::all();
        return view('record.record', compact('transaksi'));
    }

    public function showdet()
    {
        $detail = DB::select("SELECT * FROM details,barangs WHERE details.id = barangs.id");
        return view('record.recorddetail', compact('detail'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(request $request,$id)
    {
        $detail = DB::table('details')->where('idx', '=', $request->kodeid)->delete();
        return back();
    }
    public function cetaknotaku($notatrans)
    {
        return $this->cetaknota($notatrans);
    }
}
