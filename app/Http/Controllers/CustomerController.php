<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Gender;
use Illuminate\Support\Facades\DB;
class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $dtCustomer = DB::table('customer')->join('gender', 'customer.gender', '=', 'gender.id')
        // ->select('customer.*', 'gender.gender')
        // ->get();
        $dtCustomer = Customer::with('gender')->simplePaginate(5);
        //dd($dtCustomer);
        return view('customer.halaman-customer',compact('dtCustomer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $map = Gender::all();
        return view('customer.create-customer', compact('map'));
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
        $this->validate($request, [
            'email' => 'required|email|unique:customer',
            'notelp' => 'required|min:6', // field_confirmation
        ]);
        Customer::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'notelp' => $request->notelp,
            'alamat' =>$request->alamat,
            'gender' => $request->gender,
        ]);
        return redirect('halaman-customer');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $map = Gender::all();
        $dtCustomer = Customer::with('gender')->find($id);
        return view('customer.edit-customer',compact('dtCustomer', 'map'));
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
        //dd($id);
        $dtCustomer = Customer::find($id);
        $dtCustomer->nama = $request->input('nama');
        $dtCustomer->email = $request->input('email');
        $dtCustomer->notelp = $request->input('notelp');
        $dtCustomer->alamat = $request->input('alamat');
        $dtCustomer->gender = $request->input('gender');
        $dtCustomer->save();
        return redirect('halaman-customer');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Customer::destroy($id);
        return redirect('halaman-customer');
    }
}
