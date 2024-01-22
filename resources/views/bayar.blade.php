@extends('template.html')
@section('title','home')
@section('body')
@include('template.nav')

<form action="{{route('postbayar',$detailtransaksi->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="container mt-5">
        <h2>Bukti Pembayaran</h2>
        <hr>

        <div class="row">
            <div class="col-4">
                <div class="card">
                    <img src="{{ asset($kamar->foto) }}" alt="Gambar gk muncul :v" class="card-img-top">

                </div>
            </div>
            <div class="col-8">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Kamar = {{ $kamar->name }}</h3><br>
                        <p class="card-text">Harga = {{ number_format($kamar->harga, 0, '.', '.') }}</p>
                        <p class="card-text">Total = {{ number_format($detailtransaksi->totalharga, 0, '.', '.') }}</p>
                        <p class="card-text">QTY = {{ $detailtransaksi->qty }}</p>
                        <hr>
                        <label for="">Bukti Pembayaran</label>
                        <input class="form-control" type="file" name="bukti_transaksi"
                            accept="img/*" required>
                        <hr>
                        <h4>Keterangan</h4>
                        <p>Silahkan melakukan Pembayaran</p>
                        <button type="submit" class="btn btn-info">Upload</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>



<script src="js/bootstrap.min.js"></script>
@endsection