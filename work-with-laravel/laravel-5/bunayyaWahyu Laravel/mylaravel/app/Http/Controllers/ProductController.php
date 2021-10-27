<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\product;
use RealRashid\SweetAlert\Facades\Alert;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $no = 1;
        $product = product::all();
        return view('product.index', compact('product','no'));
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
        // dd($request);
        $product = new product;
        $product->nm_product = $request->get('nm_product');
        $product->type = $request->get('type');
        $product->jumlah = $request->get('jumlah');
        $product->harga = $request->get('harga');
        $product->foto = $request->get('foto');
        $product->save();
        // Alert::success('Success', 'Your Update has been saved.');
        toast('Your Update has been saved!','success');



        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $product = product::findOrfail($request->kodeid);
        $product->nm_product = $request->get('nm_product');
        $product->type = $request->get('type');
        $product->jumlah = $request->get('jumlah');
        $product->harga = $request->get('harga');

        $product->update();
        toast('Your Update has been saved!','success'); 
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $product = product::findOrfail($request->kodeid);
        if($product){
            $product->delete();
            toast('Your Update has been saved!','success');
        }
        return back();

    }
}
