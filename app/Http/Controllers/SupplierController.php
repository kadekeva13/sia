<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Supplier;
use App\JenisSupplier;
use Illuminate\Support\Facades\DB;
class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $supplier = DB::table('supplier')->join('jenissupplier', 'supplier.jenis_supplier', '=', 'jenissupplier.id')
        ->select('supplier.*', 'jenissupplier.jenis_supplier')
        ->get();
        return view('supplier.halaman-supplier', compact('supplier'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $map = Jenissupplier::all();
        return view('supplier.create-supplier', compact('map'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       //dd($request -> all());
       $this->validate($request, [
        //'email' => 'required|email|unique::customer',
        'no_telp' => 'required|min:6', // field_confirmation
    ]);
       Supplier::create([
           'nama' => $request->nama,
           'jenis_supplier' => $request->jenis_supplier,
           'alamat' =>$request->alamat,
           'no_telp' => $request->no_telp,
           'detail' => $request->detail,
    ]);
    return redirect('halaman-supplier');
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
        $map = JenisSupplier::all();
        $supplier = Supplier::with('jenissupplier')->find($id);
        return view('supplier.edit-supplier',compact('supplier', 'map'));
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
        $supplier = Supplier::find($id);
        $supplier->nama = $request->input('nama');
        $supplier->jenis_supplier = $request->input('jenis_supplier');
        $supplier->alamat = $request->input('alamat');
        $supplier->no_telp = $request->input('no_telp');
        $supplier->detail = $request->input('detail');
        $supplier->save();
        return redirect('halaman-supplier');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Supplier::destroy($id);
        return redirect('halaman-supplier');
    }
}
