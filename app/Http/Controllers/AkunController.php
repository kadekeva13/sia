<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Akun;
use App\JenisAkun;
use Illuminate\Support\Facades\DB;

class AkunController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jenisakun = DB::table('jenisakun')->get();
        $dtAkun = DB::table('akun')->join('jenisakun', 'akun.jenis_akun', '=', 'jenisakun.id')
        ->select('akun.*', 'jenisakun.jenis_akun')
        ->get();
        return view('akun.halaman-akun', compact('dtAkun','jenisakun'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $map = Jenisakun::all();
        return view('akun.create-akun', compact('map'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Akun::create([
            'id' => $request->id,
            'jenis_akun' => $request->jenis_akun,
            'nama' => $request->nama,
            'detail' => $request->detail,
          
        ]);
        return redirect('halaman-akun');
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
        $jenisakun = JenisAkun::all();
        $akun = Akun::with('jenisakun')->find($id);
        return view('akun.edit-akun',compact('akun', 'jenisakun'));
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
        $akun = Akun::find($id);
        $akun->nama = $request->input('nama');
        $akun->jenis_akun = $request->input('jenis_akun');
        $akun->detail = $request->input('detail');
        $akun->save();
        return redirect('halaman-akun');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Akun::destroy($id);
        return redirect('halaman-akun');
    }
}