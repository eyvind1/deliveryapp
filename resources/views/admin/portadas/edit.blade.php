@extends('layouts.appadmin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    @include('admin.aside')
        <div class="col-md-6">
            {!!Form::open(['route'=>['admin.portadas.update',$portada], 'method' =>'PUT','files'=>true])!!}
        <div class="row form-group">
            {!!Form::label('frase','frase')!!} 
            {!!Form::text('frase',$portada->frase,['class'=>'form-control'])!!} 
        </div>
        <div class="row form-group">
            {!!Form::label('link','link')!!} 
            {!!Form::text('link',$portada->link,['class'=>'form-control'])!!} 
        </div>
        <div class="row form-group">
            <img src="/img/portadas/{{$portada->urlfoto}}" class="img-fluid">
            {!!Form::file('urlfoto')!!} 
        </div>
        <div class="row form-group">
            {!!Form::label('orden','orden')!!} 
            {!!Form::text('orden',$portada->orden,['class'=>'form-control'])!!} 
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