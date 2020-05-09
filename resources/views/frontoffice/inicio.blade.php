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

@section('productos')

    <div class="new_arrivals_agile_w3ls_info">
        <div class="container">
            <h3 class="wthree_text_info">Nuestros <span>Libros</span></h3>

            @foreach ($productos as $producto)


                <div class="col-md-3 product-men">
                    <div class="men-pro-item simpleCart_shelfItem">
                        <div class="men-thumb-item">
                            <img src="imgproductos/{{ ($producto->imagen) ? $producto->imagen:'caratula.jpg' }}" alt="" class="pro-image-front">
                            <img src="imgproductos/{{ ($producto->imagen) ? $producto->imagen:'caratula.jpg' }}" alt="" class="pro-image-back">
                                <div class="men-cart-pro">
                                    <div class="inner-men-cart-pro">
                                        <a href="single.html" class="link-product-add-cart">Descripci&oacute;n</a>
                                    </div>
                                </div>
                                <span class="product-new-top">OFF</span>
                        </div>

                        <div class="item-info-product ">
                            <h4><a href="single.html">{{$producto->nombre}}</a></h4>
                            <div class="info-product-price">
                                <span class="item_price">${{number_format($producto->precio,2,',','.')}}</span>
                                {{-- <del>$69.71</del>--}}
                            </div>
                            <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
                                <form action="#" method="post">
                                    <fieldset>
                                        <input type="hidden" name="cmd" value="_cart" />
                                        <input type="hidden" name="add" value="1" />
                                        <input type="hidden" name="business" value=" " />
                                        <input type="hidden" name="item_name" value="{{$producto->nombre}}" />
                                        <input type="hidden" name="amount" value="30.99" />
                                        <input type="hidden" name="discount_amount" value="1.00" />
                                        <input type="hidden" name="currency_code" value="USD" />
                                        <input type="hidden" name="return" value=" " />
                                        <input type="hidden" name="cancel_return" value=" " />
                                        <input type="submit" name="submit" value="Add to cart" class="button" />
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
