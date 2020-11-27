<style type="text/css">
    .pull-left h2{
        color: White;
    }
</style>

@extends('layouts.master')
 
@section('content')
    <div class="row" class="form-control">
        <div class="col-lg-12 margin-tb">
      
            <div class="pull-left">
                <h2>Laporan</h2>
                <form action="/laporans/cari" method="GET">
                @csrf
                <div class="form-row align-items-center">
                    <div class="col-auto">
                        <p>Tanggal Awal</p>
                        <input type="date" ¬ss="form-control @error('startDate') is-invalid @enderror mb-3" name="startDate" id="startDate">
                        @error('starDate')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                    </div>
                    <div class="col-auto">
                        <p> </p>
                        <label class="col-sm-2 mb-3"><b>-</b></label>
                    </div>
                    <div class="col-auto">
                  <p>Tanggal Akhir</p>
                        <input type="date" class="form-contorl @error('endDate')is-invalid @enderror mb-3" name="endDate" id="endDate">
                        @error('endDate')
                        <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary mb-3">Cari</button>
                        @php if(isset($startDate) && isset($endDate)){ @endphp
                        <a href="{{ route('laporans.print', ['startDate' => $startDate, 'endDate' => $endDate]) }}" class="btn btn-info mb-3 ml-2">Cetak</a>
                        @php }else{ @endphp
                        <a href="{{ route('laporans.print') }}" class="btn btn-info mb-3 ml-2">Cetak</a>
                        @php } @endphp
                    </div>
            </div>
        </div>
    </div>
  </form>

</form> 
<table class="table ">
        <tr>
        <th>NO</th>
        <th>Nama Customer</th>
            <th>Paket Laundry</th>
            <th>Berat</th>
            <th>Status Pesanan</th>
            <th>Status Pembayaran</th>
            <th>Total</th>
            <th>Tanggal Transaksi</th>
          
        </tr>
        @foreach ($laporans as $laporan)
        <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $laporan-> customer}}</td>
            <td>{{ $laporan-> paket }}</td>
            <td>{{ $laporan-> berat}}</td>
            <td>{{ $laporan-> pesanan}}</td>
            <td>{{ $laporan-> pembayaran}}</td>
            <td>{{ $laporan-> total}}</td>
            <td>{{ $laporan-> created_at}}</td>                
        </tr>
        @endforeach
   		 </table>
     	
     @endsection
  
