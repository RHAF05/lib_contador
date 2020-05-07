@extends('backoffice.template')

@section('titulo','Productos')

@section('tituloseccion','Productos')

@section('ruta')
	<li class="breadcrumb-item"><a href="#">Inicio</a></li>
    <li class="breadcrumb-item active">Productos</li>
@endsection

@section('contenido')

    @if (session('status'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
            {{ session('status') }}
        </div>
    @endif

	<div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
              	<div class="text-right">
                    <a class="btn btn-success" href="{{ route('productos.create') }}"><i class="fas fa-plus"></i></a>
                    <a class="btn btn-danger" href="{{ route('productos.exportarPdf') }}" target="_blank"><i class="fas fa-file-pdf"></i></a>
                    <a class="btn btn-success" href="{{ route('productos.exportarExcel') }}" target="_blank"><i class="fas fa-file-excel"></i></a>

                    {{-- filtros --}}
                    <form action="{{ route('productos.index') }}" method="GET" class="form-inline">
                        <input type="text" name="nombre" id="nombre" class="form-control" placeholder="nombre..." value="{{$request->nombre ?? ''}}">
                        <select name="categoria_id" id="categoria_id" class="form-control">
                            <option value="">Seleccione categoria...</option>
                            @foreach ($categorias as $categoria)
                                <option value="{{$categoria->id}}" @if ($categoria->id==$request->categoria_id) selected @endif>{{$categoria->nombre}}</option>
                            @endforeach
                        </select>
                        <input type="number" name="desde" id="desde" class="form-control" placeholder="Precio desde..." value="{{$request->desde}}">
                        <input type="number" name="hasta" id="hasta" class="form-control" placeholder="Precio hasta..." value="{{$request->hasta}}">
                        <button type="submit" class="btn btn-info"><i class="fas fa-search"></i></button>
                        <a class="btn btn-primary" href="{{ route('productos.index') }}"><i class="fas fa-sync"></i></a>
                    </form>
                    {{-- fin filtros --}}
                  </div>

                <div id="table_data">
                    @include('backoffice.productos.listado')
                </div>


              </div>
            </div>
          </div>

        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->

      <script>
        $(document).ready(function(){

            $(document).on('click', '.pagination a', function(event){
                event.preventDefault();
                var page = $(this).attr('href').split('page=')[1];
                fetch_data(page);
            });

            function fetch_data(page)
            {
                $.ajax({
                    url:"http://127.0.0.1:8081/lib_contador/public/productos/fetch_data?page="+page,
                    success:function(data)
                    {
                        $('#table_data').html(data);
                    }
                });
            }

        });
    </script>


@endsection

