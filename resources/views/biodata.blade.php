@extends('template.html')
@section('title', 'Data Diri')
@section('body')
@include('template.nav')
<div class="container mt-5">
    <div class="card p-5 w-30">
        <h3 class="fw-bold text-center">Isi Data Diri</h3>
    <form action="{{route('post-biodata', $detailtransaksi->id)}}" method="POST" class="form-group w-50">
        @csrf
        <label for="nama">Nama</label>
        <input type="text" class="form-control" required name="nama" placeholder="Masukan Nama Anda">
        <label for="nama">Email</label>
        <input type="email" class="form-control" required name="email" placeholder="Masukan Nama Anda">
        <label for="notelpon">Nomor Telpon</label>
        <input type="number" class="form-control" required name="no_telp" placeholder="08*********">
        <label for="">Check-in</label>
        <input type="date" name="mulai" id="" required class="form-control">
        <label for="">Check-out</label>
        <input type="date" name="selesai" id="" required class="form-control">
        <button class="btn btn-success">bayar</button>
    </form>
</div>

    
@endsection