@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body text-center">
                    <h1>Confirmacion</h1>
                    <p>Tu pedido tiene el codigo: {{$pedido}}</p>
                    <p>...</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
