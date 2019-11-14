<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Fibertex</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="{{ asset('/css/ie10-viewport-bug-workaround.css')}}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('/css/dashboard.css')}}" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="{{ asset('/js/ie-emulation-modes-warning.js')}}"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    @include('Layouts.nav')   

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            @include('Layouts.menu')             
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Stock de productos</h1>

          <h2 class="sub-header">Productos</h2>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Código de registro</th>
                  <th>Código de producto</th>
                  <th>Cantidad (libras)</th>
                  <th>Fecha de entrada</th>
                  <th>Última modificación</th>
                  <th>Detalles</th>
                </tr>
              </thead>
              <tbody>
              @foreach ($productos as $producto)
                <tr>
                  <td>{{ $producto->cod_producto }}</td>
                  <td>{{ $producto->cod_producto }}</td>
                  <td>{{ $producto->num_cantidad }}</td>
                  <td>{{ $producto->created_at }}</td>
                  <td>{{ $producto->updated_at }}</td>
                  <td><a type="button" class="btn btn-primary" data-toggle="modal" data-target="#{{ $producto->cod_producto }}">...</a></td>
                </tr>
              @endforeach
              </tbody>
            </table>              
          </div>

          <!--Espacio para el modal-->
          @foreach ($productos as $producto)
          <div class="modal fade" id="{{ $producto->cod_producto }}" tabindex="-1" role="dialog" aria-labelledby="{{ $producto->cod_producto }}">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="{{ $producto->cod_producto }}">{{ $producto->cod_producto }} - {{ $producto->nbr_producto }}</h4>
                </div>
                <div class="modal-body">
                  <p>
                  Descripción: {{ $producto->str_descripcion }}
                  <p>
                  Peso por lote: {{ $producto->num_peso }} en libras.
                  <p>
                  Unidades: {{ $producto->num_cantidad }} en lotes.
                  <p> 
                  Color: {{ $producto->str_color }}.
                  <p>
                  Etiquetado: {{ $producto->str_etiquetado }}.
                  <p>
                  Ubicación: {{ $producto->str_ubicacion }}.
                  <p>
                  Estado: 
                </div>
                <div class="modal-footer">
                  @if(Auth::User()->cod_tipo_usuario == 'TU004')
                  <a href="{{ route('nueva_produccion', ['id' => $producto->cod_producto]) }}" type="button" class="btn btn-primary">Crear orden de produccion</a>
                  @endif
                  @if(Auth::User()->cod_tipo_usuario == 'TU002' || Auth::User()->cod_tipo_usuario == 'TU003')
                  <a href="{{ route('nueva_compra', ['id' => $producto->cod_producto]) }}" type="button" class="btn btn-primary">Crear orden de compra</a>
                  @endif
                  <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div>
              </div>
            </div>
          </div>
          @endforeach

        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="{{ asset('/js/bootstrap.min.js') }}"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="{{ asset('/js/vendor/holder.min.js') }}"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="{{ asset('/js/ie10-viewport-bug-workaround.js') }}"></script>
  </body>
</html>