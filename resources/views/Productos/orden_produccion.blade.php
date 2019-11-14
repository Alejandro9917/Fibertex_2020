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
          <h1 class="page-header">Nueva orden de producción</h1>

          <form method="POST" action="{{ route('crear_produccion') }}"> 
          {{ csrf_field() }}
            <div class="form-group col-sm-4">
                <label for="formGroupExampleInput">Código de orden de producción</label>
                <input type="text" class="form-control" id="cod_orden_produccion" name="cod_orden_produccion" placeholder="Código de orden de producción">
            </div>
            <div class="form-group col-sm-4">
                <label for="formGroupExampleInput">Código de producto</label>
                <input type="text" class="form-control" id="cod_producto" name="cod_producto" value="{{ $dato['cod_producto'] }}" placeholder="{{ $dato['cod_producto'] }}">
            </div>    
            <div class="form-group col-sm-4">
                <label for="formGroupExampleInput">Usuario de epleado de cumplimiento</label>
                <select id="cod_usuario_cumplimiento" name="cod_usuario_cumplimiento" class="form-control">
                @foreach($usuarios as $usuario)
                  <option value="{{ $usuario->cod_usuario }}">{{ $usuario->str_nombres }} {{ $usuario->str_apellidos }} ({{ $usuario->cod_usuario }})</option>
                @endforeach
                </select>
            </div>     
            <div class="form-group col-sm-9">
                <label for="formGroupExampleInput2">Especificaciones</label>
                <input type="text" class="form-control" id="str_especificaciones" name="str_especificaciones" placeholder="Ingrese especificaciones de la orden">
            </div>       
            <div class="form-group col-sm-3">
                <label for="formGroupExampleInput2">Operario</label>
                <select id="cod_empleado" name="cod_empleado" class="form-control">
                @foreach($operarios as $operario)
                  <option value="{{ $operario->cod_empleado }}">{{ $operario->str_nombres }} {{ $operario->str_apellidos }} ({{ $operario->cod_empleado }})</option>
                @endforeach
                </select>
            </div>  
            <div class="form-group col-sm-4">
                <label for="formGroupExampleInput2">Gastos directos</label>
                <div class="input-group">
                    <span class="input-group-addon">$</span>
                    <input type="text" class="form-control" id="num_gatos_directos" name="num_gatos_directos" placeholder="Ingrese el monto de gastos directos">              
                </div>
            </div>
            <div class="form-group col-sm-4">
                <label for="formGroupExampleInput2">Gastos indirectos</label>
                <div class="input-group">
                    <span class="input-group-addon">$</span>
                    <input type="text" class="form-control" id="num_gastos_indirectos" name="num_gastos_indirectos" placeholder="Ingrese el monto de gastos indirectos">                  
                </div>
            </div>
            <div class="form-group col-sm-4">
                <label for="formGroupExampleInput2">Costo total de producción</label>
                <div class="input-group">
                    <span class="input-group-addon">$</span>
                    <input type="text" class="form-control" id="str_costo_total_produccion" name="str_costo_total_produccion" placeholder="Ingrese el monto total de producción">                  
                </div>
            </div>
            <div class="form-group col-sm-4">
                <label for="formGroupExampleInput">Cantidad de producción</label>
                <input type="text" class="form-control" id="num_cantidad" name="num_cantidad" placeholder="Ingreso lotes a producir">
            </div>    
            <div class="form-group col-sm-8">
                <label for="formGroupExampleInput2">Materiales</label>
                <input type="text" class="form-control" id="str_materiales" name="str_materiales" placeholder="Ingrese materiales">
            </div>   
            <div class="form-group col-sm-4 ">
            <button class="btn btn-lg btn-primary btn-block" type="submit">Nueva orden de producción</button>
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