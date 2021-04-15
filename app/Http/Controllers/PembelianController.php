<?php

namespace App\Http\Controllers;
use App\Pembelian;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class PembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $supplier = DB::table('supplier')->get(); // cara ngambil data pada tabel customer dari database .
        $keuangan = DB::table('keuangan')->get();
        $dtPembelian = DB::table('pembelian')
            ->join('supplier', 'pembelian.id_supplier', '=', 'supplier.id')
            ->join('keuangan', 'pembelian.id_keuangan', '=', 'keuangan.id')
            ->select('pembelian.*', 'supplier.id AS supid', 'keuangan.id AS keuid')
            ->get();
            // dd($keuangan);
            
        return view('pembelian.halaman-pembelian', compact('dtPembelian','supplier','keuangan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $map = pembelian::all();
        return view('pembelian.halaman-pembelian', compact('map'));
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
        Pembelian::create([
            'id' => $request->id,
            'id_supplier' => $request->id_supplier,
            'id_keuangan' => $request->id_keuangan,
            'nama_pembelian' => $request->nama_pembelian,
            'tgl_pembelian' => $request->tgl_pembelian,
        ]);
        return redirect('halaman-pembelian');
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
        $supplier = DB::table('supplier')->get(); // cara ngambil data pada tabel customer dari database .
        $keuangan = DB::table('keuangan')->get();
        $dtPembelian = DB::table('pembelian')
            ->join('supplier', 'pembelian.id_supplier', '=', 'supplier.id')
            ->join('keuangan', 'pembelian.id_keuangan', '=', 'keuangan.id')
            ->select('pembelian.*')
            ->where('pembelian.id','=',$id)->first();
        // dd($dtPenjualan);
        return view('pembelian.edit-pembelian', compact('dtPembelian','supplier','keuangan'));
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
        $dtpembelian = Pembelian::find($id);
        $dtpembelian->id_supplier = $request->input('id_supplier');
        $dtpembelian->id_keuangan = $request->input('id_keuangan');
        $dtpembelian->nama_pembelian = $request->input('nama_pembelian');
        $dtpembelian->tgl_pembelian = $request->input('tgl_pembelian');
        $dtpembelian->save();
        return redirect('halaman-pembelian');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pembelian::destroy($id);
        return redirect('halaman-pembelian');
    }
}
