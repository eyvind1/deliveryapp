@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        
        <div class="col-md-10">
            <div class="row justify-content-center">
            @forelse ($subcategoria->productos as $r)
                <div class="col-sm-3 mt-5 mb-5">
                    <div class="card">
                        <div class="card shadow">
                            <a href="/{{$r->slug}}" title="{{$r->nombre}}">
                              <img src="/img/productos/{{$r->urlfoto}}" class="card-img-top" alt="Comprar {{$r->nombre}}">
                            </a> 
                              <div class="card-body"> 
                                <p class="text-center">$. {{$r->precio}}</p>
                              </div>
                              <div class="div-card-footer bg-warning">
                                <a href="/{{$r->slug}}" class="btn btn-success rounded-pill btn-block">{{$r->nombre}}</a>
                              </div>
                          </div>
                    </div>
                
                </div>
            @empty
                    
            @endforelse
            </div>    
        </div>

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
