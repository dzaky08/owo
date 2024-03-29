@extends('template.html')
@section('title','home')
<style>
    body {
        background-image: url('https://ik.imagekit.io/tvlk/blog/2022/06/Hotel-di-Jakarta-dengan-Balkon-Somerset-Sudirman-Jakarta-2-1024x683.jpeg?tr=dpr-2,w-675');
        background-repeat: no-repeat;
        background-size: 100%
        
    }
</style>
@section('body')
    <div class="container mt-5">
        <div class="card mx-auto p-5 col-md-4">
            <h3 class="text-center fw-bold">Login</h3>
            <form action="{{route('post-login')}}" class="form-group" method="POST">
                @csrf
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password">
                <button class="btn btn-secondary w-100 mt-2">Login</button>
            </form>
        </div>
    </div>
@endsection