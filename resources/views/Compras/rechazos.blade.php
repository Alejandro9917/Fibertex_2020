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
          <h1 class="page-header">Rechazo de compras</h1>

          <h2 class="sub-header">Compras</h2>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Código de rechazo</th>
                  <th>Producto</th>
                  <th>Cantidad rechazada(lotes)</th>
                  <th>Fecha de rechazo</th>
                  <th>Detalles</th>
                </tr>
              </thead>
              <tbody>
              @foreach ($denegados as $denegado)
                <tr>
                  <td>{{ $denegado->cod_producto_denagado }}</td>
                  <td>{{ $denegado->producto->nbr_producto }}</td>
                  <td>{{ $denegado->num_producto_denegado }}</td>
                  <td>{{ $denegado->updated_at }}</td>
                  <td><a type="button" class="btn btn-primary" data-toggle="modal" data-target="#{{ $denegado->cod_producto_denagado }}">...</a></td>
                </tr>
              @endforeach
              </tbody>
            </table>              
          </div>

          <!--Espacio para el modal-->
          @foreach ($denegados as $denegado)
          <div class="modal fade" id="{{ $denegado->cod_producto_denagado }}" tabindex="-1" role="dialog" aria-labelledby="{{ $denegado->cod_producto_denagado }}">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="{{ $denegado->cod_producto_denagado }}">{{ $denegado->cod_producto_denagado }} - {{ $denegado->producto->nbr_producto }}</h4>
                </div>
                <div class="modal-body">
                  <p> 
                  Codigo de produccion: {{ $denegado->cod_orden_compra }}
                  <p>
                  Usuario que solicitó: {{ $denegado->compra->usuario_s->str_nombres }} {{ $denegado->compra->usuario_s->str_apellidos }}.
                  <p>
                  Usuario que aprobó: {{ $denegado->compra->usuario_a->str_nombres }} {{ $denegado->compra->usuario_a->str_apellidos }}.
                  <p>
                  Empresa: {{ $denegado->compra->empresa->str_nombre }}.
                  <p>
                  Unidades: {{ $denegado->num_producto_denegado }} (lotes).
                  <p>
                  Motivos: {{ $denegado->str_motivos }}
                </div>
                <div class="modal-footer">
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