@extends('template.html')
@section('title','home')
@section('body')
@include('template.navbar')
<div class="container mt-5">
    <div class="card mt-3">
        <div class="row">
            <div class="col-3">
                <img src="{{asset($item->fotos)}}" alt="" class="img-card-top" width="250" height="200">
            </div>
            <div class="col-6">
                <div class="card mt-3">
                    <div class="card-body">
                       <h3 class="card-title text-center">{{$item->nama}}</h3> 
                       <p class="card-title">Hotel Horison Sukabumi merupakan hotel bintang 3 dengan 100 kamar berdesain modern minimalis yang nyaman dan elegan</p>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card mt-5">
                    <h3 class="card-title text-center">Rp.750.000</h3>
                <button type="submit" class="btn btn"  style="background-color: orangered">Booking Sekarang</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection