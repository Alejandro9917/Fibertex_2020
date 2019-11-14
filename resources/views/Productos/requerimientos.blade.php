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
          <h1 class="page-header">Requerimientos de calidad</h1>

          <h2 class="sub-header">Requerimientos activos</h2>
          <div class="panel-group" id="accordion2" role="tablist" aria-multiselectable="true">

            <div class="panel panel-default">
              <div class="panel-heading" role="tab" id="headingOne">
                <h4 class="panel-title">
                  <a role="button" data-toggle="collapse" data-parent="#accordion2" href="#Mesa" aria-expanded="true" aria-controls="Mesa">
                    Requerimientos de Mesa
                  </a>
                </h4>
              </div>
              <div id="Mesa" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                  <div class="list-group">
                      <li class="list-group-item">No deben ir medidas de wipper mezcladas</li>
                      <li class="list-group-item">No debe ir blanco en el multicolor</li>
                      <li class="list-group-item">No puede llevar contaminantes igual que en banda</li>
                      <li class="list-group-item">Departamentos</li>
                      <li class="list-group-item">El cutter no puede llevar medidas</li>
                      <li class="list-group-item">No se puede mezclar composicion en el cutter</li>
                  </div>
              </div>
            </div>

            <div class="panel panel-default">
              <div class="panel-heading" role="tab" id="headingTwo">
                <h4 class="panel-title">
                  <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion2" href="#Bayler" aria-expanded="false" aria-controls="Bayler">
                    Requerimientos de Bayler
                  </a>
                </h4>
              </div>
              <div id="Bayler" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo">
                  <div class="list-group">
                      <li class="list-group-item">Altura de paca más 1.20 mts</li>
                      <li class="list-group-item">No tonos drásticos</li>
                      <li class="list-group-item">Peso de 700 lbrs. Mínimo con algunas excepciones q deben ser autorizadas antes</li>
                  </div>
              </div>
            </div>

            <div class="panel panel-default">
              <div class="panel-heading" role="tab" id="headingThree">
                <h4 class="panel-title">
                  <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion2" href="#Banda" aria-expanded="false" aria-controls="Banda">
                    Requerimientos de Banda
                  </a>
                </h4>
              </div>
              <div id="Banda" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThree">
                  <div class="list-group">
                      <li class="list-group-item">No debe llevar contaminante (papel, basura, separadores)</li>
                      <li class="list-group-item">No se pueden mezclar los tonos de color</li> 
                      <li class="list-group-item">No debe llevar medidas de wipper</li> 
                  </div>
              </div>
            </div>
          </div>

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