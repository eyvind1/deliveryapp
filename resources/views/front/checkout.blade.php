@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center">
        <h1>Carrito de Compras</h1>
        @if (Cart::getContent()->count()>0)
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <th>Cantidad/Unidad</th>
                        <th>Producto</th>
                        <th>Precio Unitario</th>
                        <th>Importe</th>
                        <th>Eliminar</th>
                    </thead>
                    <tbody>
                        @foreach (Cart::getContent() as $item)
                            <tr>
                                <td>{{$item->quantity}} / {{$item->attributes->unidad}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{number_format($item->price,2)}}</td>
                                <td>{{number_format($item->price*$item->quantity,2)}}</td>
                                <td>
                                    <form action="{{route('carrito.remover')}}" method="post">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$item->id}}">
                                        <button type="submit">x</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="2"></td>
                            <td>Subtotal</td>
                            <td>{{number_format(Cart::getSubTotal(),2)}}</td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-sm-6 p-4">
                <form action="{{route('carrito.vaciar')}}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-success rounded-pill mx-auto d-block">Vaciar Carrito</button>
                </form>
            </div>
            <div class="col-sm-6 p-4">
                <a href="/login" class="btn btn-success"> Procesar Pedido</a>
            </div>
        @else
            <div class="jumbotron text-center w-100">
                <p>Carrito Vacio</p>
                <p><a href="/" class="btn btn-success">Comprar</a></p>
            </div>
        @endif
        
    </div>
</div>
@endsection
