<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BerandaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.beranda');
    }
    public function halamandashboard()
    {
        return view('halaman.halaman-dashboard');
    }
    public function halamancustomer()
    {
        return view('customer.halaman-customer');
    }
    public function halamansupplier()
    {
        return view('supplier.halaman-supplier');
    }
    public function halamanpembelian()
    {
        return view('pembelian.halaman-pembelian');
    }
    public function halamanpenjualan()
    {
        return view('penjualan.halaman-penjualan');
    }
    public function halamanprofile()
    {
        return view('profil.halaman-profile');
    }
    public function halamaninventory()
    {
        return view('inventory.halaman-inventory');
    }
    public function halamanpemasukan()
    {
        return view('pemasukan.halaman-pemasukan');
    }
    public function halamanpengeluaran()
    {
        return view('pengeluaran.halaman-pengeluaran');
    }
    public function halamanbukubesar()
    {
        return view('bukubesar.halaman-bukubesar');
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
        //
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
