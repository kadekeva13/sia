<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pengeluaran;
class PengeluaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dtPengeluaran = Pengeluaran::all();
        $jumlah1 = 0;
        foreach($dtPengeluaran as $total1)
        {
            $jumlah1 = $jumlah1 + $total1 -> jumlah_pengeluaran; //tabel yang akan dijumlahkan
        }
        return view('pengeluaran.halaman-pengeluaran',compact('dtPengeluaran','jumlah1'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pengeluaran.create-pengeluaran');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         //dd($request->all());
         Pengeluaran::create([
            'tgl_pengeluaran'=>$request->tgl_pengeluaran,
            'jenis_pengeluaran'=>$request->jenis_pengeluaran,
            'detail_pengeluaran'=>$request->detail_pengeluaran,
            'jumlah_pengeluaran'=>$request->jumlah_pengeluaran,
            // 'total'=>$request->total,
        ]);
        return redirect('halaman-pengeluaran');
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
        $peng = Pengeluaran::find($id);
        return view('pengeluaran.edit-pengeluaran', compact('peng'));
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
        //dd($request->all());
        $peng = Pengeluaran::find($id);
        $peng->tgl_pengeluaran = $request->input('tgl_pengeluaran');
        $peng->jenis_pengeluaran = $request->input('jenis_pengeluaran');
        $peng->detail_pengeluaran = $request->input('detail_pengeluaran');
        $peng->jumlah_pengeluaran = $request->input('jumlah_pengeluaran');
        // $pem->gender = $request->input('gender');
        $peng->save();
        return redirect('halaman-pengeluaran');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pengeluaran::destroy($id);
        return redirect('halaman-pengeluaran');
    }
}
