
@extends('layouts.master')
 
@section('content')
<br>
<br>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Status Pembayaran</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('pembayarans.create') }}"> Create</a>
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
          
            <th>Nama</th>
            <th>Urutan</th>
          
            <th width="280px">Action</th>
        </tr>
        @foreach ($pembayarans as $pembayaran)
        <tr>
        
            <td>{{ $pembayaran-> nama}}</td>
            <td>{{ $pembayaran-> urutan}}</td>
           
          
            <td>
                <form action="{{ route('pembayarans.destroy',$pembayaran->id) }}" method="POST">
   
                    
                    <a class="btn btn-primary" href="{{ route('pembayarans.edit',$pembayaran->id) }}">Edit</a>
      @csrf
      @method('DELETE')
     <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    
@endsection