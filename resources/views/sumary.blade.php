@extends('template.html')
@section('title','home')
@section('body')
@include('template.nav')
<div class="container mt-5">
    <h5>Sumary</h5>
    <hr>
    @foreach ($detailtransaksi as $item)
        <div class="card mt-3">
            <div class="row">
                <div class="col-4">
                    <img src="{{ asset($item->kamar->foto) }}" alt="" class="card-img-top">
                </div>
                <div class="col-8">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">Kamar = {{ $item->kamar->nama }}</h3><br>
                            <h3 class="card-title">Invoice = {{ $item->transaksi->kode }}</h3><br>
                            <p class="card-text">Harga Rp. {{ number_format($item->produk->harga, 0, '.', '.') }}</p>
                            <p class="card-text">Banyak = {{ $item->qty }}</p>
                            <p class="card-text">Total Rp. {{ number_format($item->totalharga, 0, '.', '.') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection