<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pemasukan;

class PemasukanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dtPemasukan = Pemasukan::all();
        $jumlah = 0;
        foreach($dtPemasukan as $total)
        {
            $jumlah = $jumlah + $total -> jumlah_pemasukan; //tabel yang akan dijumlahkan
        }
        // dd($jumlah);
        return view('pemasukan.halaman-pemasukan', compact('dtPemasukan','jumlah'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pemasukan.create-pemasukan');
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
        Pemasukan::create([
            'tgl_pemasukan'=>$request->tgl_pemasukan,
            'jenis_pemasukan'=>$request->jenis_pemasukan,
            'detail_pemasukan'=>$request->detail_pemasukan,
            'jumlah_pemasukan'=>$request->jumlah_pemasukan,
            'total'=>$request->total,
        ]);
        return redirect('halaman-pemasukan');
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
        $pem = Pemasukan::find($id);
        return view('pemasukan.edit-pemasukan', compact('pem'));
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
        $pem = Pemasukan::find($id);
        $pem->tgl_pemasukan = $request->input('tgl_pemasukan');
        $pem->jenis_pemasukan = $request->input('jenis_pemasukan');
        $pem->detail_pemasukan = $request->input('detail_pemasukan');
        $pem->jumlah_pemasukan = $request->input('jumlah_pemasukan');
        // $pem->gender = $request->input('gender');
        $pem->save();
        return redirect('halaman-pemasukan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pemasukan::destroy($id);
        return redirect('halaman-pemasukan');
    }
}
