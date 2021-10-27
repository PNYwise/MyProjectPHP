<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\transaction;
use App\product;
use App\detail;
use RealRashid\SweetAlert\Facades\Alert;
use DateTime;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    public function recordtrans(){
        $no = 1;
        $transaction = transaction::all();
        return view('transaction.record', compact('transaction', 'no'));
    }
    public function recorddet(){
        $no = 1;
        $detail = detail::all();
        return view('transaction.recorddetail', compact('detail', 'no'));
    }

    public function tambahtran(){
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date('dmY');
        $tgl_tran = date('d-m-Y');

        $detail = detail::all();
        $transaction = DB::table('transactions')->select(DB::raw('MAX(id) as nomornota'));
        //dd($transaction);
        if($transaction->count()> 0){
            foreach($transaction->get() as $no){
                $tmp = ((int)$no->nomornota) + 1;
                $nota = "N".$tgl.sprintf('%04s',$tmp);
            }
        }else {
            $nota = "N". $tgl. "0001";
        }
        $product = product::all();

        $total = DB::table('details')->select(DB::raw('SUM(subtotal) as grantot, nota'))->where('nota',$nota)->groupBy('nota')->first();
            if($total){
                $grantot = $total->grantot;
            }else{
                $grantot = '0';
            }
        
        $lama = DB::table('details')->select(DB::raw('SUM(lama) as lamanya, nota'))->where('nota', $nota)->groupBy('nota')->first();
        if($lama){
            $selesai = $lama->lamanya;
        }else{
            $selesai = 0;
        }
        $wm = date('H:i');
        $jam = date('H');
        $menit = date('i');
        $hasil = $jam + $selesai;
        if($hasil > 23){
            $hasil = $hasil - 24;
        }
        if($hasil < 10){
            $hasil = '0'.$hasil;
        }
        if($lama){
            $selesai = $hasil.':'.$menit;
        }else{
            $selesai = "0";
        }

        
        return view('transaction.tambah' , compact('nota','tgl_tran','wm','product','grantot','selesai','detail'));
    }

    public function simpandetail(Request $req){
        $same = DB::table('details')->where('id',$req->get('nm_product'))
        ->where('nota',$req->get('nota'))->first();
        if ($same) {
            $lama1 = $same->lama;
            $subtot1 = $same->subtotal;
            $finallama = $lama1 + $req->get('lama');
            $finalsubtot = $subtot1 + $req->get('subtotal');
            DB::table('details')->where('id', $req->get('nm_product'))
            ->where('nota', $req->get('nota'))
            ->update(['lama'=>$finallama,'subtotal'=>$finalsubtot]);
        }else {
            $detail = new detail;
            $detail->nota = $req->get('nota');
            $detail->id = $req->get('nm_product');
            $detail->lama = $req->get('lama');
            $detail->subtotal = $req->get('subtotal');
            $detail->save();
            toast('Your Update has been saved!', 'success');
        }
        return back();
    }
    
    public function getdetail(Request $request){
        $detail = DB::select("SELECT details.nota, details.idx, products.nm_product, products.harga, details.lama, details.subtotal FROM products, details WHERE products.id = details.id AND details.nota='".$request->nota."'");
        return response()->json($detail);
    }
    public function simpantrans(Request $request){
        $tanggal = date('Y-m-d', strtotime($request->get('tgl')));
        $nota = $request->get('nota');
        $transaction = new transaction;
        $transaction->nota = $request->get('nota');
        $transaction->kasir = $request->get('name');
        $transaction->tanggal = $tanggal;
        $transaction->mulai = $request->get('wm');
        $transaction->ahir = $request->get('hasil');
        $transaction->total = $request->get('total');
        //dd($request);
        $transaction->save();
        toast('Your Update has been saved!', 'success');
        $result = [
            "status"=>200,
            "notatrans"=> $nota
        ];
        return redirect()->back()->with($result);
    }
    public function deletedetail(Request $request){
        $detail = DB::table('details')->where('idx','=',$request->kodeid)->delete();
            toast('Your Update has been saved!', 'success');
        return back();

    }

    public function cetaknotaku($notatrans){
        return $this->cetaknota($notatrans);
        
    }

}
