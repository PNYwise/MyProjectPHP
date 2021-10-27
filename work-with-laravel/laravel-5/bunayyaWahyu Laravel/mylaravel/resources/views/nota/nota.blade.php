<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Transaksi Pembayaran</title>

</head>
<style>
.mg-p1 {
    margin-left:135px;
    margin-bottom:0;
}
.mg-p2{
    margin-left:250px;
    margin-top:0;
    margin-bottom:0;
}
.mg-p3{
    margin-left:180px;
    margin-top:0;
    margin-bottom:0;
}
.mg-p--{
    margin-top:0;
    margin-bottom:0;
}
table{
    width:100%;
}
table td{ 
}
</style>
<body>  
    
    <p class="mg-p1">RENTAL PLAYSTATION GADINGKASRI MALANG / 081933198841 </p>
    <p class="mg-p2">PT.SUMBERKENCANA GROUB</p>
    <p class="mg-p3">JL.GALUNGGUNG No.93 RT/RW :02/03 MALANG</p>
    <p class="mg-p--">===========================================================</p>

    <table>
        <tr>
 @foreach($transaction as $data)
            <td>NOTA</td>
            <td>: {{ $data->nota }}</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>WAKTU MULAI</td>
            <td>: {{ $data->mulai }}</td>

        </tr>
        <tr>
            <td>WAKTU SELESAI</td>
            <td>: {{ $data->ahir }}</td>
        </tr>
        <tr>
            <td>TANGGAL</td>
            <td>: {{ $data->tanggal }}</td>
        </tr>
        <tr>
            <td>KASIR</td>
            <td>: {{ $data->kasir }}</td>
            <td></td>
            <td></td>
            <td></td>
            
        </tr>
         @endforeach
    </table>
<p class="mg-p--">===========================================================</p>
<p class="mg-p--">===========================================================</p>

    <table>
        <tr>
            <td align="center">NAMA PRODUCT</td>
            <td align="center">HARGA</td>
            <td align="center">LAMA</td>
            <td align="center">SUBTOTAL</td>

        </tr>
    @foreach($nt as $data)
        <tr >
            <td align="center">{{ $data->nm_product }}</td>
            <td align="center" >{{ $data->harga }}</td>
            <td align="center" >{{ $data->lama }} Jam</td>
            <td align="center" >{{ $data->subtotal }} </td>

        </tr>
    @endforeach
    </table>
<p class="mg-p--">===========================================================</p>
    <table>
    @foreach($transaction as $data)
        <tr>
            <td align="left">
                <h1>TOTAL</h1>
            </td>
            <td align="right">
                <h1> RP.{{$data->total }} </h1>
            </td>

        </tr>
    @endforeach
    </table>
</body>
</html>