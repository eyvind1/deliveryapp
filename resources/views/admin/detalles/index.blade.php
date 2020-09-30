@extends('layouts.appadmin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    @include('admin.aside')
        <div class="col-md-8">
            
            @if(count($detalles))
                <ul>
                    <li>Nombre: {{$detalles[0]->pedidos->user->name}}</li>
                    <li>email: {{$detalles[0]->pedidos->user->email}}</li>
                    <li>celular: {{$detalles[0]->pedidos->user->celular}}</li>
                    <li>direccion: {{$detalles[0]->pedidos->user->direccion}}</li>
                    <li>codigo de pedido: {{$detalles[0]->pedidos->codigo}}</li>
                </ul>
                <table class="table">
                    <thead>
                    <th>N</th><th>Cantidad</th><th>producto</th><th>precio</th><th>precio total</th>
                    </thead>
                    <tbody>
                    
                    @foreach($detalles as $r)
                    <tr>
                        <td>{{$r->id}}</td>
                        <td>{{$r->cantidad}}</td>
                        <td>{{$r->productos->nombre}}</td>
                        <td>{{$r->productos->precio}}</td>
                        <td>{{$r->productos->precio*$r->cantidad}}</td>
                        
                    
                    </tr>
                    @endforeach
                    <tr>
                        <td colspan="3"></td>
                        <td>Subtotal: </td>
                        <td>{{$detalles[0]->pedidos->subtotal}}</td>
                    </tr>
                    <tr>
                        <td colspan="3"></td>
                        <td>Impuesto: </td>
                        <td>{{$detalles[0]->pedidos->impuesto}}</td>
                    </tr>
                    <tr>
                        <td colspan="3"></td>
                        <td>Total: </td>
                        <td>{{$detalles[0]->pedidos->total}}</td>
                    </tr>
                    </tbody>
                </table>
            @else
                <p>No hay detalles pedidos</p>
            @endif
        </div>
    </div>
</div>
@endsection