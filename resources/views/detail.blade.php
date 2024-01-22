@extends('template.html')
@section('title','home')
@section('body')
<div class="container mt-5">
        <div class="row ">
                <div class="col-6">
                    <div class="card">
                            <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner">
                                      <div class="carousel-item active">
                                        <img class="d-block w-100" src="img/tanjungputing.jpg" alt="First slide">
                                      </div>
                                      <div class="carousel-item">
                                        <img class="d-block w-100" src="img/labuanbajo.jpg" alt="Second slide">
                                      </div>
                                      <div class="carousel-item">
                                        <img class="d-block w-100" src="img/borobudur.jpg" alt="Third slide">
                                      </div>
                                    </div>
                                  </div>
                        </div>
                    </div>
                </div>
            </div>
</div>
@endsection