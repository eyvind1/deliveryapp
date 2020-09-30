<div class="col-sm-2 bg-light">
    <h2>Resumen</h2>
    @if (count(Cart::getContent()))
        @foreach (Cart::getContent() as $item)
            {{$item->name}}...{{$item->price}}
        @endforeach
        Total S/. {{number_format(Cart::getSubTotal(),2)}}
        <a href="/carrito/checkout" class="btn btn-success"> Ver Carrito</a>
    @else
        <p>Carrito vacio</p>        
    @endif
</div>