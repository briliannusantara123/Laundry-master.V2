<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DaftarcustomerController extends Controller
{
	 public function index()
    {
   $data_daftar=\App\Daftarcustomer::all();
        
        
        return view('daftarcustomer.index',['data_daftar' => $data_daftar]);
    }
    public function create(Request $request)
    {
        $customer = new \App\Customer;
        $customer->email= $request->email;
        $customer->nama= $request->nama;
        $customer->no_hp= $request->no_hp;
        $customer->alamat= $request->alamat;
        $customer->save();
        $this->validate($request,[
            'email' => 'required',
            'nama' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required'
        ]);
        \App\Daftarcustomer::create($request->all());
        return redirect('/daftarcustomer')->with('sukses','data berhasil disimpan');
    }
}
