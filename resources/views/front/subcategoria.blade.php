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
    </div>
</div>
@endsection
