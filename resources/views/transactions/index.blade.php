
@extends('layouts.master')
 
@section('content')
<br>
<br>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Transaksi</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('transactions.create') }}"> Create</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
          
            <th>Nama Customer</th>
            <th>Paket Laundry</th>
            <th>Berat</th>
            <th>Status Pesanan</th>
            <th>Status Pembayaran</th>
            <th>Total</th>
          
            <th width="280px">Action</th>
        </tr>
        @foreach ($transactions as $transaction)
        <tr>
        
            <td>{{ $transaction-> customer}}</td>
            <td>{{ $transaction-> paket }}</td>
            <td>{{ $transaction-> berat}}</td>
            <td>{{ $transaction-> pesanan}}</td>
            <td>{{ $transaction-> pembayaran}}</td>
            <td>{{ $transaction-> total}}</td>
           
          
            <td>
                <form action="{{ route('transactions.destroy',$transaction->id) }}" method="POST">
   
                    
                    <a class="btn btn-primary" href="{{ route('transactions.edit',$transaction->id) }}"class="btn btn-warning btn-xs btn-edit" id="edit"><i class="fa fa-pencil-square-o"></i></a>
      @csrf
      @method('DELETE')
     <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    
@endsection