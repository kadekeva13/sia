<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Penjualan;
use Illuminate\Support\Facades\DB;
class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //SELECT penjualan.id, penjualan.id_customer, penjualan.id_keuangan FROM customer INNER JOIN penjualan ON penjualan.id_customer = customer.id INNER JOIN keuangan ON penjualan.id_keuangan = keuangan.id
        $customer = DB::table('customer')->get(); // cara ngambil data pada tabel customer dari database .
        $keuangan = DB::table('keuangan')->get();
        $dtPenjualan = DB::table('penjualan')
            ->join('customer', 'penjualan.id_customer', '=', 'customer.id')
            ->join('keuangan', 'penjualan.id_keuangan', '=', 'keuangan.id')
            ->select('penjualan.*', 'customer.id AS custid', 'keuangan.id AS keuid')
            ->get();
            // dd($keuangan);
            // dd($dtPenjualan);
        return view('penjualan.halaman-penjualan', compact('dtPenjualan','customer','keuangan'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $map = penjualan::all();
        return view('penjualan.halaman-penjualan', compact('map'));
        // \App\Penjualan::create($request->all());
        // return redirect('penjualan.halaman-penjualan');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Penjualan::create([
            'id' => $request->id,
            'id_customer' => $request->id_customer,
            'id_keuangan' => $request->id_keuangan,
            'nama_penjualan' => $request->nama_penjualan,
            'tgl_penjualan' => $request->tgl_penjualan,
        ]);
        return redirect('halaman-penjualan');
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
        // dd($id);
        $customer = DB::table('customer')->get(); // cara ngambil data pada tabel customer dari database .
        $keuangan = DB::table('keuangan')->get();
        $dtPenjualan = DB::table('penjualan')
            ->join('customer', 'penjualan.id_customer', '=', 'customer.id')
            ->join('keuangan', 'penjualan.id_keuangan', '=', 'keuangan.id')
            ->select('penjualan.*')
            ->where('penjualan.id','=',$id)->first();
        // dd($dtPenjualan);
        return view('penjualan.edit-penjualan', compact('dtPenjualan','customer','keuangan'));
        // $map = penjualan::all();
        // $customer = penjualan::with('customer')->find($id);
        // $keuangan = penjualan::with('keuangan')->find($id);
        // return view('penjualan.edit-penjualan',compact('customer', 'map', 'keuangan'));
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
    
        $dtpenjualan = Penjualan::find($id);
        $dtpenjualan->id_customer = $request->input('id_customer');
        $dtpenjualan->id_keuangan = $request->input('id_keuangan');
        $dtpenjualan->nama_penjualan = $request->input('nama_penjualan');
        $dtpenjualan->tgl_penjualan = $request->input('tgl_penjualan');
        $dtpenjualan->save();
        return redirect('halaman-penjualan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Penjualan::destroy($id);
        return redirect('halaman-penjualan');
    }
}

