<!DOCTYPE html>
<html>
<head>
    <title>Laporan</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }} ">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <style>
p {
  align:justivy;
   padding-top: 20px;
   padding-right: 50px;
   padding-bottom: 800px;
   padding-left: 0px;
}
</style>
</head>
<body onafterprint="redirect()">
    <br>
    @php if(isset($startDate) && isset($endDate)){ @endphp
    <h2 style="margin-left: 1%;">Laporan Transaksi: @php echo $startDate @endphp sampai @php echo $endDate @endphp</h2>
    @php }else{ @endphp
    <h2><center>Laporan Transaksi</center></h2>
    @php } @endphp
    <div class="col-md-12">
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
            <th scope="col">NO</th>
            <th scope="col">Nama Customer</th>
            <th scope="col">Paket Laundry</th>
            <th scope="col">Berat</th>
            <th scope="col">Status Pesanan</th>
            <th scope="col">Status Pembayaran</th>
            <th scope="col">Total</th>
            <th scope="col">Tanggal Transaksi</th>
                </tr>
            </thead>
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
    </div>
</body>
 <br>
 <br>
 
 
 <h6 align="right">
@php $tgl=date('d-m-Y'); @endphp
   Bogor,{{$tgl}} 
   </br>
Manager Laundry Abidinn

</h6>
</br>
</br>
</br>
</br>
</br>

<h6 align="right"> 
Dr.Agisti Setia Putri S.Kom

</h6>
<script type="text/javascript">
    window.print();
</script>


<script type="text/javascript">
    function redirect() {
        window.location.href = '@php echo $redirect; @endphp';
    }
</script>
</html>