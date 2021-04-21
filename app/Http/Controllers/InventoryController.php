<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inventory;
use Illuminate\Support\Facades\DB;
class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $pembelian = DB::table('pembelian')->get(); // cara ngambil data pada tabel pembelian dari database .
        $dtInventory = DB::table('inventory')
            ->join('pembelian', 'inventory.id_pembelian', '=', 'pembelian.id')
            ->select('inventory.*', 'pembelian.id AS pemid',)
            ->get();
            // dd($dtInventory);
            
        return view('inventory.halaman-inventory', compact('dtInventory','pembelian'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $map = inventory::all();
        return view('inventory.halaman-inventory', compact('map'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Inventory::create([
            'id' => $request->id,
            'id_pembelian' => $request->id_pembelian,
            'jenis_inventory' => $request->jenis_inventory,
            'detail' => $request->detail,
        ]);
        return redirect('halaman-inventory');
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
        $pembelian = DB::table('pembelian')->get(); // cara ngambil data pada tabel pembelian dari database .
        $dtInventory = DB::table('inventory')
            ->join('pembelian', 'inventory.id_pembelian', '=', 'pembelian.id')
            ->select('inventory.*')
            ->where('inventory.id','=',$id)->first();
            return view('inventory.edit-inventory', compact('dtInventory','pembelian'));
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
        $dtInventory = Inventory::find($id);
        $dtInventory->id_pembelian = $request->input('id_pembelian');
        $dtInventory->jenis_inventory = $request->input('jenis_inventory');
        $dtInventory->detail = $request->input('detail');
        $dtInventory->save();
        return redirect('halaman-inventory');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Inventory::destroy($id);
        return redirect('halaman-inventory');
    }
}