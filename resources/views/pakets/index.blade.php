
@extends('layouts.master')
 
@section('content')
<br>
<br>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Jenis Paket</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('pakets.create') }}"> Create</a>
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
          
            <th>Nama Paket</th>
            <th>Harga</th>
          
            <th width="280px">Action</th>
        </tr>
        @foreach ($pakets as $paket)
        <tr>
        
            <td>{{ $paket-> nama}}</td>
            <td>{{ $paket-> harga}}</td>
           
          
            <td>
                <form action="{{ route('pakets.destroy',$paket->id) }}" method="POST">
   
                    
                    <a class="btn btn-primary" href="{{ route('pakets.edit',$paket->id) }}">Edit</a>
      @csrf
      @method('DELETE')
     <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    
@endsection