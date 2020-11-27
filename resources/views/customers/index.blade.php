
@extends('layouts.master')
 
@section('content')
<br>
<br>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Data Customer</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('customers.create') }}"> Create</a>
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
          
            <th>Email</th>
            <th>Nama</th>
            <th>NO HP</th>
            <th>Alamat</th>
          
            <th width="280px">Action</th>
        </tr>
        @foreach ($customers as $customer)
        <tr>
        
            <td>{{ $customer-> email}}</td>
            <td>{{ $customer-> nama}}</td>
            <td>{{ $customer-> no_hp}}</td>
            <td>{{ $customer-> alamat}}</td>

            <td>
                <form action="{{ route('customers.destroy',$customer->id) }}" method="POST">
   
                    
                    <a class="btn btn-primary" href="{{ route('customers.edit',$customer->id) }}">Edit</a>
      @csrf
      @method('DELETE')
     <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    
@endsection