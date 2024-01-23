@extends('template.html')
@section('title', 'Data Diri')
@section('body')
@include('template.nav')
<div class="container mt-5">
    <div class="card p-5 w-30">
        <h3 class="fw-bold text-center">Check In</h3>
    <form action="" class="form-group w-50">
        <label for="nama">Nama</label>
        <input type="text" class="form-control" placeholder="Masukan Nama Anda">
        <label for="notelpon">Nomor Telpon</label>
        <input type="text" class="form-control" placeholder="123*">
        <label for="tipe">Tipe Kamar</label>
        <input type="datetime" name="mulai" id="" required class="form-control">
        <input type="datetime" name="selesai" id="" required class="form-control">
    </form>
</div>

    
@endsection