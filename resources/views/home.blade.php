@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Historial de Pedidos</div>

                <div class="card-body">
                    <h1>{{Auth::user()->name}}</h1>
                    <p>{{Auth::user()->direccion}}</p>
                    <p>{{Auth::user()->celular}}</p>
                    <hr>
                    

                            @forelse (Auth::user()->pedidos->sortByDesc('created_at') as $item)
                            <h2 class="h4">Codigo Pedido: {{$item->codigo}} | Fecha: {{$item->created_at}}</h2>
                            <table class="table table-bordered">
                                <thead>
                                    <th>Pedido {{$loop->iteration}}</th>
                                    <th>Cantidad</th>
                                    <th>Producto</th>
                                    <th>Precio</th>
                                    <th>Subtotal</th>
                                </thead>
                                <tbody>
                                
                                
                                @foreach ($item->detalles as $d)
                                <tr>  
                                    <td>{{$loop->iteration}}</td>  
                                    <td>{{$d->cantidad}}{{$d->productos->unidad}}</td>
                                    <td>{{$d->productos->nombre}}</td>
                                    <td>{{$d->productos->precio}}</td>
                                    <td>{{$d->productos->precio*$d->cantidad}}</td>
                                </tr>
                                @endforeach 
                                
                                <tr>
                                    <td colspan="3"></td>
                                    <td>Subtotal</td>
                                    <td>{{$item->subtotal}}</td>
                                </tr>
                                <tr>
                                    <td colspan="3"></td>
                                    <td>Impuesto</td>
                                    <td>{{$item->impuesto}}</td>
                                </tr>
                                <tr>
                                    <td colspan="3"></td>
                                    <td>Total</td>
                                    <td>{{$item->total}}</td>
                                </tr>
                                </tbody>
                       
                            </table>
                                                      
                            @empty
                                <p>No tienes pedidos</p>
                            @endforelse
                        
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
