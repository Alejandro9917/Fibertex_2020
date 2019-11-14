<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="">{{ Auth::User()->cod_usuario }}</a></li>
            <li><a href="{{ route('datos') }}">{{ Auth::User()->str_nombres }} {{ Auth::User()->str_apellidos }}</a></li>         
            <li><a href="{{ route('logout') }}">Salir </a></li>
          </ul>
        </div>
      </div>
    </nav>