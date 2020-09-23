@extends('layouts.app')
@section('content')
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="https://i.ytimg.com/vi/J_5pQQHEJgY/maxresdefault.jpg" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="https://i.ytimg.com/vi/psB5hMlBQig/maxresdefault.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="https://i.ytimg.com/vi/5Ct8LhW0wf0/maxresdefault.jpg" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<div class="container pb-5">
    <div class="row justify-content-center">
        <div class="col-sm-12 mt-5 mb-5"><h1 class = "text-center">Delivery de abarrotes</h1></div>
        <div class="col-sm-4">
            <div class="card shadow">
                <img src="https://th.bing.com/th/id/OIP.zLiX546tpWeqiyEgXMT4_gHaFs?pid=Api&rs=1" class="card-img-top">
                <div class="card-body">Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe aspernatur minus, dicta perspiciatis nesciunt velit odit. Modi nihil quia provident nam fugiat eum fuga, maiores ratione explicabo illum quisquam commodi?</div>
                <div class="div-card-footer">
                    <a href="/" class="btn btn-outline-success rounded-pill btn-block">Producto</a>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card shadow">
                <img src="https://th.bing.com/th/id/OIP.zLiX546tpWeqiyEgXMT4_gHaFs?pid=Api&rs=1" class="card-img-top">
                <div class="card-body">Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe aspernatur minus, dicta perspiciatis nesciunt velit odit. Modi nihil quia provident nam fugiat eum fuga, maiores ratione explicabo illum quisquam commodi?</div>
                <div class="div-card-footer">
                    <a href="/" class="btn btn-outline-success rounded-pill btn-block">Producto</a>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card shadow">
                <img src="https://th.bing.com/th/id/OIP.zLiX546tpWeqiyEgXMT4_gHaFs?pid=Api&rs=1" class="card-img-top">
                <div class="card-body">Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe aspernatur minus, dicta perspiciatis nesciunt velit odit. Modi nihil quia provident nam fugiat eum fuga, maiores ratione explicabo illum quisquam commodi?</div>
                <div class="div-card-footer">
                    <a href="/" class="btn btn-outline-success rounded-pill btn-block">Producto</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
