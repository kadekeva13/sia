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
        $dtPenjualan = DB::table('penjualan')
            ->join('customer', 'penjualan.id_customer', '=', 'customer.id')
            ->join('keuangan', 'penjualan.id_keuangan', '=', 'keuangan.id')
            ->select('penjualan.*', 'customer.id', 'keuangan.id')
            ->get();
        return view('penjualan.halaman-penjualan', compact('dtPenjualan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        \App\Penjualan::create($request->all());
        return redirect('penjualan.halaman-penjualan');
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
    public function destroy($id)
    {
        //
    }
}
