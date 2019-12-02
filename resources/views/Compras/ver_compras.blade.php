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
          <h1 class="page-header">Ordenes de compras</h1>

          <h2 class="sub-header">Compras</h2>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Código de compra</th>
                  <th>Código de producto</th>
                  <th>Empresa</th>
                  <th>Precio total</th>
                  <th>Fecha requerida</th>
                  <th>Estado</th>
                  <th>Detalles</th>
                </tr>
              </thead>
              <tbody>
              @foreach ($compras as $compra)
                <tr>
                  <td>{{ $compra->cod_orden_compra }}</td>
                  <td>{{ $compra->cod_producto }}</td>
                  <td>{{ $compra->empresa->str_nombre }}</td>
                  <td>${{ $compra->num_total}}</td>
                  <td>{{ $compra->fecha_req}}</td>
                  <td>
                  @if($compra->estado == 'P')
                    Pendiente de aprobar.
                  @elseif($compra->estado == 'A')
                    Aprobada.
                  @elseif($compra->estado == 'D')
                    Denegada.
                  @elseif($compra->estado == 'F')
                    Finalizada.
                  @endif
                  </td>
                  <td><a type="button" class="btn btn-primary" data-toggle="modal" data-target="#{{ $compra->cod_orden_compra }}">...</a></td>
                </tr>
              @endforeach
              </tbody>
            </table>              
          </div>

          <!--Espacio para el modal-->
          @foreach ($compras as $compra)
          <div class="modal fade" id="{{ $compra->cod_orden_compra }}" tabindex="-1" role="dialog" aria-labelledby="{{ $compra->cod_orden_compra }}">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="{{ $compra->cod_orden_compra }}">{{ $compra->cod_orden_compra }} - {{ $compra->producto->nbr_producto}}</h4>
                </div>
                <div class="modal-body">
                <p>
                  Producto a comprar: {{ $compra->producto->nbr_producto }}
                  <p>
                  Usuario que solicita: {{ $compra->usuario_s->str_nombres }} {{ $compra->usuario_s->str_apellidos }}
                  <p>
                  Usuario que autoriza: @if($compra->cod_empleado_autoriza != null) {{ $compra->usuario_a->str_nombres }} {{ $compra->usuario_a->str_apellidos }} @endif
                  <p>
                  Empresa a la que se compra: {{ $compra->empresa->str_nombre }}
                  <p>
                  Precio: {{ $compra->num_precio }}
                  <p>
                  Subtotal: {{ $compra->num_subtotal }}
                  <p>
                  Iva: {{ $compra->num_iva }}
                  <p>
                  Total: {{ $compra->num_total }}
                  <p>
                  Cantidad pedida: {{ $compra->num_cantidad_pedida }}
                  <p>
                  Cantidad recibida: {{ $compra->num_cantidad_recibida }}
                </div>
                <div class="modal-footer">
                  @if ($compra->estado == 'P')
                    @if(Auth::User()->cod_tipo_usuario == 'TU002' || Auth::User()->cod_tipo_usuario == 'TU003')
                    <a href="{{ route('evaluar_compra', ['id' => $compra->cod_orden_compra, 'op' => 0]) }}" type="button" class="btn btn-danger">Denegar orden de compra</a>
                    <a href="{{ route('evaluar_compra', ['id' => $compra->cod_orden_compra, 'op' => 1]) }}" type="button" class="btn btn-success">Aceptar orden de compra</a>
                    @endif
                  @endif
                  @if ($compra->estado == 'A')
                    @if(Auth::User()->cod_tipo_usuario == 'TU002' || Auth::User()->cod_tipo_usuario == 'TU003')
                    <a href="{{ route('recibir_compra', ['id' => $compra->cod_orden_compra]) }}" type="button" class="btn btn-success">Recibir orden</a>
                    @endif
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