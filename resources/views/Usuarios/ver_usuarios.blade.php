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
          <h1 class="page-header">Lista de usuarios</h1>

          <h2 class="sub-header">Usuarios</h2>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Código de usuario</th>
                  <th>Nombre</th>
                  <th>Telefono</th>
                  <th>Documento de Id.</th>
                  <th>Detalles</th>
                </tr>
              </thead>
              <tbody>
              @foreach($usuarios as $usuario)
                <tr>
                  <td>{{ $usuario->cod_usuario }}</td>
                  <td>{{ $usuario->str_nombres}} {{$usuario->str_apellidos }}</td>
                  <td>{{ $usuario->str_telefono }}</td>
                  <td>{{ $usuario->str_doc_id }}</td>
                  <td><a type="button" class="btn btn-primary" data-toggle="modal" data-target="#{{ $usuario->cod_usuario }}">...</a></td>
                </tr>
              @endforeach
              </tbody>
            </table>              
          </div>

          <!--Espacio para el modal-->
          @foreach($usuarios as $usuario)
          <div class="modal fade" id="{{ $usuario->cod_usuario }}" tabindex="-1" role="dialog" aria-labelledby="{{ $usuario->cod_usuario }}">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="{{ $usuario->cod_usuario }}">{{ $usuario->cod_usuario }}</h4>
                </div>
                <div class="modal-body">
                  <p>
                  Cargo de usuario: 
                  @if($usuario->cod_tipo_usuario == 'TU001')
                  Administrador
                  @endif

                  @if($usuario->cod_tipo_usuario == 'TU002')
                  Gerente general
                  @endif

                  @if($usuario->cod_tipo_usuario == 'TU003')
                  Gerente
                  @endif

                  @if($usuario->cod_tipo_usuario == 'TU004')
                  Jefe de producción
                  @endif

                  @if($usuario->cod_tipo_usuario == 'TU005')
                  Jefe de calidad
                  @endif
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-primary">Ok</button>
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