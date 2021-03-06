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
    <link href="{{ asset('/css/signin.css')}}" rel="stylesheet">

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

    <div class="container">

    <form class="form-signin" method="POST" action="{{ route('clave_act') }}">
        {{ csrf_field() }}
        <h2 class="form-signin-heading">Cambiar clave</h2>
        <label for="inputPassword" class="sr-only">Nueva clave</label>
        <input type="password" id="clave1" name="clave1" class="form-control" placeholder="Clave" value="" required autofocus>
        <div class="checkbox">
        @foreach ($errors->all() as $error)
            <span class="label label-danger">{{ $error }}</span>
            <p></p>
        @endforeach
        <label for="inputPassword" class="sr-only">Repetir nueva clave</label>
        <input type="password" id="clave2" name="clave2" class="form-control" placeholder="Clave" required>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Actualizar clave</button>
      </form>

    </div> <!-- /container -->

    <script src="{{ asset('/js/ie10-viewport-bug-workaround.js')}}"></script>
  </body>
</html>