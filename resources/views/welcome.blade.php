@extends('template.html')
@section('title','home')
@section('body')
@include('template.nav')
<div class="container mt-5">
    <div class="row">
        @foreach ($hotel as $item)
        <div class="col-3">
            <div class="card shadow" style="height: 350px">
            <img src="{{asset($item->foto)}}" alt="" class="card-img-top">
                <div class="card-body">
                    <h3 class="card-title text-center">{{$item->nama}}</h3>
                    <p class="card-text">{{$item->alamat}}</p>
                    <a href="{{ route('kamar', $item->id) }}" class="btn btn-outline-success">View</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection