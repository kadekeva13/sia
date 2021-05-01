<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Pemasukan;



class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function laporan_penjualan()
    {
        $customer = DB::table('customer')->get(); // cara ngambil data pada tabel customer dari database .
        $keuangan = DB::table('keuangan')->get();
        $dtPenjualan = DB::table('penjualan')
            ->join('customer', 'penjualan.id_customer', '=', 'customer.id')
            ->join('keuangan', 'penjualan.id_keuangan', '=', 'keuangan.id')
            ->select('penjualan.*', 'customer.id AS custid', 'keuangan.id AS keuid')
            ->get();

        return view('laporan.cetak-penjualan', compact('customer', 'keuangan','dtPenjualan'));
            

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function laporan_penjualan_print()
    {
        $customer = DB::table('customer')->get(); // cara ngambil data pada tabel customer dari database .
        $keuangan = DB::table('keuangan')->get();
        $dtPenjualan = DB::table('penjualan')
        ->join('customer', 'penjualan.id_customer', '=', 'customer.id')
        ->join('keuangan', 'penjualan.id_keuangan', '=', 'keuangan.id')
        ->select('penjualan.*', 'customer.id AS custid', 'keuangan.id AS keuid')
        ->get();

    return view('laporan.cetak-penjualan-print', compact('customer', 'keuangan','dtPenjualan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function laporan_pembelian()
    {
        $supplier = DB::table('supplier')->get(); // cara ngambil data pada tabel customer dari database .
        $keuangan = DB::table('keuangan')->get();
        $dtPembelian = DB::table('pembelian')
            ->join('supplier', 'pembelian.id_supplier', '=', 'supplier.id')
            ->join('keuangan', 'pembelian.id_keuangan', '=', 'keuangan.id')
            ->select('pembelian.*', 'supplier.id AS supid', 'keuangan.id AS keuid')
            ->get();
            // dd($keuangan);
            
        return view('laporan.cetak-pembelian', compact('dtPembelian','supplier','keuangan'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function laporan_pembelian_print()
    {
        $supplier = DB::table('supplier')->get(); // cara ngambil data pada tabel customer dari database .
        $keuangan = DB::table('keuangan')->get();
        $dtPembelian = DB::table('pembelian')
            ->join('supplier', 'pembelian.id_supplier', '=', 'supplier.id')
            ->join('keuangan', 'pembelian.id_keuangan', '=', 'keuangan.id')
            ->select('pembelian.*', 'supplier.id AS supid', 'keuangan.id AS keuid')
            ->get();
            // dd($keuangan);
            
        return view('laporan.cetak-pembelian-print', compact('dtPembelian','supplier','keuangan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function laporan_pemasukan()
    {
        $dtPemasukan = Pemasukan::all();
        $jumlah = 0;
        foreach($dtPemasukan as $total)
        {
            $jumlah = $jumlah + $total -> jumlah_pemasukan; //tabel yang akan dijumlahkan
        }
        // dd($jumlah);
        return view('laporan.cetak-pemasukan', compact('dtPemasukan','jumlah'));
    }

    public function laporan_pemasukan_print()
    {
        $dtPemasukan = Pemasukan::all();
        $jumlah = 0;
        foreach($dtPemasukan as $total)
        {
            $jumlah = $jumlah + $total -> jumlah_pemasukan; //tabel yang akan dijumlahkan
        }
        // dd($jumlah);
        return view('laporan.cetak-pemasukan-print', compact('dtPemasukan','jumlah'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function laporan_bukubesar()
    {
        $keuangan = DB::table('keuangan')->get();
        $akun = DB::table('akun')->get(); // cara ngambil data pada tabel customer dari database .
        $laporan = DB::table('laporan')->get();
        $dtBubes = DB::table('bukubesar')->join('akun', 'bukubesar.jenis_akun', '=', 'akun.id')->select('bukubesar.*', 'akun.*')->get();
        //dd($dtBubes);
        $jumlah = 0;
        foreach($dtBubes as $total)
        {
            $jumlah = $jumlah + $total -> debit; //tabel yang akan dijumlahkan
        }
        //dd($jumlah);
        $jumlah1 = 0;
        foreach($dtBubes as $total1)
        {
            $jumlah1 = $jumlah1 + $total1-> kredit; //tabel yang akan dijumlahkan
        }
        //dd($jumlah1);
        return view('laporan.cetak-bukubesar', compact('dtBubes','keuangan', 'akun', 'laporan', 'jumlah', 'jumlah1'));
 
    }
    public function laporan_bukubesar_print()
    {
        $keuangan = DB::table('keuangan')->get();
        $akun = DB::table('akun')->get(); // cara ngambil data pada tabel customer dari database .
        $laporan = DB::table('laporan')->get();
        $dtBubes = DB::table('bukubesar')->join('akun', 'bukubesar.jenis_akun', '=', 'akun.id')->select('bukubesar.*', 'akun.*')->get();
        //dd($dtBubes);
        $jumlah = 0;
        foreach($dtBubes as $total)
        {
            $jumlah = $jumlah + $total -> debit; //tabel yang akan dijumlahkan
        }
        //dd($jumlah);
        $jumlah1 = 0;
        foreach($dtBubes as $total1)
        {
            $jumlah1 = $jumlah1 + $total1-> kredit; //tabel yang akan dijumlahkan
        }
        //dd($jumlah1);
        return view('laporan.cetak-bukubesar-print', compact('dtBubes','keuangan', 'akun', 'laporan', 'jumlah', 'jumlah1'));
 
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
