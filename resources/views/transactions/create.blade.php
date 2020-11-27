@extends('layouts.master')
  
@section('content')
<br>
<br>
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('transactions.index') }}"> Back</a>
        </div>
    </div>
</div>
   
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   
<form action="{{ route('transactions.store') }}" method="POST">
    @csrf
  
     <div class="row">
     
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Customer</strong>
                <select class="form-control" name="customer" id="customer">
                @foreach($customers as $customer)
                <option value="{{$customer->nama}}">{{$customer->nama}}</option>
                @endforeach
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Paket Laundry</strong>
                <select class="form-control" name="paket" id="paket">
                <option value disable>---Pilih---</option>
                @foreach($pakets as $paket)
                <option value="{{$paket->harga}}" data-harga="{{$paket->harga}}">{{$paket->nama}} - Rp. {{$paket->harga}}</option>
                @endforeach
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Berat</strong>
                <input type ="number" class="form-control" name="berat" id="berat" onkeyup="suma();"/>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Status Pesanan</strong>
                <select class="form-control" name="pesanan" id="pesanan">
                @foreach($pesanans as $pesanan)
                <option value="{{$pesanan->nama}}">{{$pesanan->nama}}</option>
                @endforeach
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Status Pembayaran</strong>
                <select class="form-control" name="pembayaran" id="pembayaran">
                @foreach($pembayarans as $pembayaran)
                <option value="{{$pembayaran->nama}}">{{$pembayaran->nama}}</option>
                @endforeach
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Total Harga</strong>
                <input type ="number" class="form-control" name="total" id= "total" readonly>
            </div>
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Buat</button>
        </div>
    </div>
    <script type="text/javascript" src="{{ URL::asset('js/jquery.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/jquery-ui.js') }}"></script>
    <script type="text/css" src="{{ URL::asset('js/jquery.css') }}"></script>
   <script> 
            
            function suma(){
            var FirstNumberValue = document.getElementById('paket').value;
            var SecondNumberValue = document.getElementById('berat').value;
            var result = SecondNumberValue*FirstNumberValue ;
            document.getElementById('total'). value= result;
        }</script>
   
 
<script>
jQuery(document).ready(function(){
 
    jQuery('select').change(function(){
      let harga = jQuery(this).find(':selected').data('harga');
      
        jQuery('#berat').keyup(function(){
            let berat = jQuery('#berat').val()

            let total = parseInt(harga) * parseInt(berat)
            if (harga == "kosong") {
                total = ""
            }
 
            if (berat == "") {
                total = ""
            }
 
            console.log(total);
            if(!isNaN(total)){
                jQuery('#total').val(total)
            }
      })
  })
});
</script>
</form>
@endsection