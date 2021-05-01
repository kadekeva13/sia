<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bukubesar;
use Illuminate\Support\Facades\DB;

class BukubesarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
        return view('bukubesar.halaman-bukubesar', compact('dtBubes','keuangan', 'akun', 'laporan', 'jumlah', 'jumlah1'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $keuangan = DB::table('keuangan')->get();
        $akun = DB::table('akun')->get(); // cara ngambil data pada tabel customer dari database .
        $laporan = DB::table('laporan')->get();
        $map = bukubesar::all();
        return view('bukubesar.create-bukubesar', compact('map','keuangan','akun','laporan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        BukuBesar::create([
            'id_keuangan' => $request->keuangan,
            'id_laporan' => $request->laporan,
            'jenis_akun' => $request->nama_akun,
            'keterangan' => $request->keterangan,
            'debit' => $request->debit,
            'kredit' => $request->kredit,
        ]);
        return redirect('halaman-bukubesar');
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
        $keuangan = DB::table('keuangan')->get(); // cara ngambil data pada tabel customer dari database .
        $keuangan = DB::table('akun')->get(); 
        $laporan = DB::table('laporan')->get();
        $dtBubes = DB::table('bukubesar')
            ->join('keuangan', 'bukubesar.id_keuangan', '=', 'keuangan.id')
            ->join('akun', 'bukubesar.jenis_akun', '=', 'akun.jenis_akun')
            ->join('laporan', 'bukubesar.id_laporan', '=', 'laporan.id')
            ->select('bukubesar.*')
            ->where('bukubesar.id','=',$id)->first();
        // dd($dtPenjualan);
        return view('bukubesar.edit-bukubesar', compact('dtBubes','keuangan','laporan'));
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
        $dtBubes = BukuBesar::find($id);
        $dtBubes->id_keuangan = $request->input('id_keuangan');
        $dtBubes->id_laporan = $request->input('id_laporan');
        $dtBubes->jenis_akun = $request->input('jenis_akun');
        $dtBubes->keterangan = $request->input('keterangan');
        $dtBubes->debit = $request->input('debit');
        $dtBubes->kredit = $request->input('kredit');
        $dtBubes->save();
        return redirect('halaman-bukubesar');
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
        return redirect('halaman-bukubesar');
    }
}
