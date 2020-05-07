@extends('frontoffice.template')

@section('titulo','Inicio')

@section('contenido')
    <h1>NUESTROS LIBROS</h1>
    <div class="container">
        <div class="row">
            @foreach ($productos as $producto)
                <div class="col-md-4">
                    <div class="card" >
                        @if($producto->imagen=="")
                            <img src="imgproductos/caratula.jpg" class="card-img-top" alt="{{$producto->nombre}}">
                        @else
                            <img src="imgproductos/{{ $producto->imagen ?? 'caratula.jpg' }}" class="card-img-top" alt="{{$producto->nombre}}">
                        @endif

                        <div class="card-body">
                            <h5 class="card-title">{{$producto->nombre}}</h5>
                            <p class="card-text text-right">${{number_format($producto->precio,2,',','.')}}</p>
                            <a href="{{route('producto.detalle',$producto->id)}}" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                            <a href="{{ route('carrito-agregar',$producto->id) }}" class="btn btn-success"><i class="fas fa-shopping-cart"></i></a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
