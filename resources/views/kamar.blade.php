@extends('template.html')
@section('title','home')
@section('body')
@include('template.nav')
<div class="container mt-5">
    @foreach ($kamars as $kamar)
    <div class="card mt-3">
        <div class="row">
            <div class="col-3">
                <img src="{{asset($kamar->foto_kamar)}}" alt="" class="img-card-top" width="250" height="200">
            </div>
            <div class="col-6">
                <div class="card mt-3">
                    <div class="card-body">
                       <h3 class="card-title text-center">{{ $kamar->nama }}</h3> 
                       <p class="card-title">Fasilitas :</p>
                       <p class="card-title">{{ $kamar->deskripsi }}</p>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card mt-5">
                <h3 class="card-title text-center">{{ number_format($kamar->harga, '0',',','.') }}/malam</h3>
                <form action="{{ route('booking', $kamar->id) }}" method="post">
                    @csrf
                    <button class="btn btn-primary w-100" >Booking</button>
                </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection