@extends('template.html')
@section('title','home')
@section('body')
    <div class="container mt-5">
        <div class="card mx-auto p-5 w-25">
            <h3 class="text-center fw-bold">Login</h3>
            <form action="{{route('post-login')}}" class="form-group" method="POST">
                @csrf
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password">
                <button class="btn btn-secondary w-100 mt-2">Kirim</button>
            </form>
        </div>
    </div>
@endsection