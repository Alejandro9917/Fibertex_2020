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
          <h1 class="page-header">Mis datos</h1>

          <h2 class="sub-header">{{ Auth::User()->str_nombres }} {{ Auth::User()->str_apellidos }} - 
          @if(Auth::User()->cod_tipo_usuario == 'TU001')
          Administrador
          @endif

          @if(Auth::User()->cod_tipo_usuario == 'TU002')
          Gerente general
          @endif

          @if(Auth::User()->cod_tipo_usuario == 'TU003')
          Gerente
          @endif

          @if(Auth::User()->cod_tipo_usuario == 'TU004')
          Jefe de producción
          @endif

          @if(Auth::User()->cod_tipo_usuario == 'TU005')
          Jefe de calidad
          @endif
          </h2>

          <form method="POST" action=""> 
          {{ csrf_field() }}
            <div class="form-group col-sm-4">
                <label for="formGroupExampleInput">Documento</label>
                <input type="text" class="form-control" id="cod_producto" name="cod_producto" placeholder="DUI: {{ Auth::User()->str_doc_id }}">
            </div>
            <div class="form-group col-sm-4">
                <label for="formGroupExampleInput">Teléfono</label>
                <input type="text" class="form-control" id="nbr_producto" name="nbr_producto" placeholder="Número: {{ Auth::User()->str_telefono }}">
            </div>            
          </form>

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