@extends('layouts.appadmin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    @include('admin.aside')
        <div class="col-md-8">
            
            @if(count($pedidos))
            <table class="table">
                <thead>
                <th>N</th><th>Codigo</th><th>Fecha pedido</th><th>entregado</th><th>Accion</th>
                </thead>
                <tbody>
                
                @foreach($pedidos->sortByDesc('created_at') as $r)
                <tr>
                    <td>{{$r->id}}</td>
                    <td>{{$r->codigo}}</td>
                    <td>{{$r->created_at}}</td>
                    <td>{{$r->estado}}</td>
                    <td>
                    <a class="btn btn-success" href="{{route('admin.pedidos.show',$r->id)}}"> Ver Detalle</a>
                    @if(!$r->estado)    
                        <a class="btn btn-success" href="{{route('admin.pedidos.edit',$r->id)}}">Entregar</a>
                    @endif

                    </td>
                </tr>
                @endforeach
                
                </tbody>
            </table>
            @else
                <p>No hay pedidos</p>
                    @endif
        </div>
    </div>
</div>
@endsection