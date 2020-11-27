
@extends('layouts.master')
 
@section('content')
<br>
<br>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Data Karyawan</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('karyawans.create') }}"> Create</a>
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
            <th>Email</th>
            <th>NO HP</th>
            <th>Alamat</th>
          
            <th width="280px">Action</th>
        </tr>
        @foreach ($karyawans as $karyawan)
        <tr>
        
            <td>{{ $karyawan-> nama}}</td>
            <td>{{ $karyawan-> email}}</td>
            <td>{{ $karyawan-> no_hp}}</td>
            <td>{{ $karyawan-> alamat}}</td>

            <td>
                <form action="{{ route('karyawans.destroy',$karyawan->id) }}" method="POST">
   
                    
                    <a class="btn btn-primary" href="{{ route('karyawans.edit',$karyawan->id) }}">Edit</a>
      @csrf
      @method('DELETE')
     <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    
@endsection