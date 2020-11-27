<?php

namespace App\Http\Controllers;

use App\Transaction;
use App\Customer;
use App\Paket;
use App\Pesanan;
use App\Pembayaran;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions = Transaction::all();
        return view('transactions.index',compact('transactions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pakets=Paket::all(); 
        $customers = Customer::all();
        $pesanans=Pesanan::all(); 
        $pembayarans=Pembayaran::all(); 
        return view('transactions.create',compact('pakets','customers','pesanans','pembayarans',$pakets,$customers,$pesanans,$pembayarans));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
          'customer' => 'required',
          'paket' => 'required',
          'berat' => 'required',
          'pesanan' => 'required',
          'pembayaran' => 'required',
          'total' => 'required'
        ]);
            Transaction::create($request->all());
            return redirect()->route('transactions.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        $pakets=Paket::get(); 
        $customer= Customer::get();
        $pesanans=Pesanan::get(); 
        $pembayarans=Pembayaran::get(); 
        return view('transactions.edit', compact('pakets','customers','pesanans','pembayarans','transaction'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        $transaction->update($request->all());
  
        return redirect()->route('transactions.index')
                        ->with('success','Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        $transaction->delete();
  
        return redirect()->route('transactions.index')
                        ->with('success','Deleted successfully');
    }
}
