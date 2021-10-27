<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\barang;
use Illuminate\Support\Facades\DB;
class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang = DB::select('SELECT * FROM barangs');
        // dd($barang);
        $no=1;
        return view('barang.barang', compact('barang','no'));
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
        $barang = new barang;   
        $barang->jenis = $request->get('jenis');
        $barang->satuan = $request->get('satuan');
        $barang->harga = $request->get('harga');
        if($request->hasFile('foto')) {
            $file = $request->file('foto');
            $extensi = $file->GetClientOriginalExtension();
            $namafoto = $request->get('jenis') . "." . $extensi;
            $file->move(public_path() . '/image/', $namafoto);
            $barang->foto = $namafoto;
        }
        $barang->save();
        return redirect('barang');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('barang.form');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $update = barang::all()->where('id', $id);
        return view('barang.update', compact('update'));   
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
        // dd($request);
        $barang = barang::findOrfail($request->kodeid);
        $barang->jenis = $request->get('jenis');
        $barang->satuan = $request->get('satuan');
        $barang->harga = $request->get('harga');
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $extensi = $file->GetClientOriginalExtension();
            $namafoto = $request->get('jenis') . "." . $extensi;
            $file->move(public_path() . '/image/', $namafoto);
            $barang->foto = $namafoto;            
        }
        $barang->update();
        return redirect('/barang');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(request $request,$id)
    {
        $barang = barang::findOrfail($request->kodeid);
        $barang->delete();
        return redirect('barang');

    }
}
