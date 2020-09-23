@extends('layouts.appadmin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    @include('admin.aside')
        <div class="col-md-6">
            {!!Form::open(['route'=>['admin.publicaciones.update',$publicacion], 'method' =>'PUT','files'=>true])!!}
        <div class="row form-group">
            {!!Form::label('slug','SLUG')!!} 
            {!!Form::text('slug',$publicacion->slug,['class'=>'form-control'])!!} 
        </div>
        <div class="row form-group">
            {!!Form::label('title','title')!!} 
            {!!Form::text('title',$publicacion->title,['class'=>'form-control'])!!} 
        </div>
        <div class="row form-group">
            {!!Form::label('description','description')!!} 
            {!!Form::text('description',$publicacion->description,['class'=>'form-control'])!!} 
        </div>
        <div class="row form-group">
            {!!Form::label('nombre','nombre')!!} 
            {!!Form::text('nombre',$publicacion->nombre,['class'=>'form-control','maxlength'=>'50'])!!} 
        </div>
        <div class="row form-group">
            {!!Form::label('descripcion','descripcion')!!} 
            {!!Form::textarea('descripcion',$publicacion->descripcion,['class'=>'form-control'])!!} 
        </div>
        <div class="row form-group">
            {!!Form::label('categorias_id','Categoria')!!} 
            {!!Form::select('categorias_id',$categorias,$publicacion->categorias_id,['class'=>'form-control'])!!} 
        </div>
        <div class="row form-group">
            <img src="/img/publicaciones/{{$publicacion->urlfoto}}">
            {!!Form::file('urlfoto')!!} 
        </div>
        <div class="row form-group"> 
            <div class="col-sm-6">
            {!!Form::submit('GUARDAR',['class'=>'btn btn-success'])!!}
            </div>
        </div>
            {!!Form::close()!!}
        </div>
    </div>
</div>
<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('descripcion');
</script>

@endsection