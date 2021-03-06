@extends('layouts.app')
@section('content')
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    
    @forelse ($portadas as $r)
      
      <div class="carousel-item @if ($loop->index == 0) active @endif">
        <img src="/img/portadas/{{$r->urlfoto}}" class="d-block w-100" alt="{{$r->frase}}">
      </div>
        
    @empty
    @endforelse
    
    

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
        
        @forelse ($productos as $pr)
        <div class="col-sm-3">
          <div class="card shadow">
            <a href="/{{$pr->slug}}" title="{{$pr->nombre}}">
              <img src="/img/productos/{{$pr->urlfoto}}" class="card-img-top" alt="Comprar {{$pr->nombre}}">
            </a> 
              <div class="card-body"> 
                <p class="text-center">$. {{$pr->precio}}</p>
              </div>
              <div class="div-card-footer bg-warning">
                <a href="/{{$pr->slug}}" class="btn btn-success rounded-pill btn-block">{{$pr->nombre}}</a>
              </div>
          </div>
        </div> 
      
        @empty
          <p>Productos vacios</p>
        @endforelse
        
        <div class="col-sm-10 mt-5">
          <h2>Novedades</h2>
          
            @forelse ($blog as $r)
            <div class="row mt-3 mb-3">
              <div class="col-sm-4">
                <a href="/blog/{{$r->slug}}"><img src="/img/publicaciones/{{$r->urlfoto}}" alt="{{$r->nombre}}" class="img-fluid"></a>
              </div>
              <div class="col-sm-8">
                <h3><a href="/blog/{{$r->slug}}">{{$r->nombre}}</a></h3>
                <p>{{$r->description}}</p>
                <p class="small">{{$r->created_at->diffForHumans()}}</p>
              </div>
            </div>
            @empty
              <p>...</p>
            @endforelse
          
        </div>
        
    </div>
</div>
@endsection
