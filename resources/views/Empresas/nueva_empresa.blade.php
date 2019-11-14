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
        <div class="col-sm-9 col-sm-offset-3 col-md-8 col-md-offset-3 main">
          <h1 class="page-header">Ingreso de nuevos productos</h1>

          <form method="POST" action="{{ route('empresa_crear') }}"> 
          {{ csrf_field() }}
            <div class="form-group col-sm-4">
                <label for="formGroupExampleInput">Código de empresa</label>
                <input type="text" class="form-control" id="cod_empresa" name="cod_empresa" placeholder="Ingrese código de empresa">
            </div>
            <div class="form-group col-sm-4">
                <label for="formGroupExampleInput">Nombre de empresa</label>
                <input type="text" class="form-control" id="str_nombre" name="str_nombre" placeholder="Ingrese nombre de la empresa">
            </div>            
            <div class="form-group col-sm-4">
                <label for="formGroupExampleInput2">Telefono de la empresa</label>
                <input type="text" class="form-control" id="str_telefono" name="str_telefono" placeholder="Ingrese el telefono de la empresa">
            </div>
            <div class="form-group col-sm-8">
                <label for="formGroupExampleInput">Rubro de la empresa</label>
                <input type="text" class="form-control" id="str_rubro" name="str_rubro" placeholder="Ingrese el rubro de la empresa">
            </div>                                             
            <div class="form-group col-sm-4">
                <label for="formGroupExampleInput2">Nit de la empresa</label>
                <input type="text" class="form-control" id="str_nit" name="str_nit" placeholder="Ingrese el nit de la empresa">
            </div>
            <div class="form-group col-sm-12">
                <label for="formGroupExampleInput2">Dirección de la empresa</label>
                <input type="text" class="form-control" id="str_direccion" name="str_direccion" placeholder="Ingrese la dirección de la empresa">
            </div>
            <div class="form-group col-sm-4">
              <button class="btn btn-lg btn-primary btn-block" type="submit">Agregar nueva empresa</button>
            </div>
            @if ($errors->any())
              <div class="alert alert-danger">
                <ul>
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif
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