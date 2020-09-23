@extends('layouts.appadmin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    @include('admin.aside')
        <div class="col-md-8">
            <a class="btn btn-success" href="{{route('admin.publicaciones.create')}}">NUEVO</a>
            @if(count($publicaciones))
            <table class="table">
                <thead>
                <th>N</th><th>Nombre</th><th>Accion</th>
                </thead>
                <tbody>
                
                @foreach($publicaciones as $r)
                <tr>
                    <td>{{$r->id}}</td>
                    <td>{{$r->nombre}}</td>
                    <td>
                     
                    <a class="btn btn-success" href="{{route('admin.publicaciones.edit',$r->id)}}">Editar</a>
                    

                    {!!Form::open(['method'=>'DELETE','route'=>['admin.publicaciones.destroy',$r->id],'style'=>'display:inline'])!!}
                    {!!Form::submit('ELIMINAR',['class'=>'btn btn-success'])!!}
                    {!!Form::close()!!}
                    </td>
                </tr>
                @endforeach
                
                </tbody>
            </table>
            @else
                <p>No hay registros</p>
                    @endif
        </div>
    </div>
</div>
@endsection