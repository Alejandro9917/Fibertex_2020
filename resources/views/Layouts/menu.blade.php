<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

  @if(Auth::User()->cod_tipo_usuario == 'TU001' || Auth::User()->cod_tipo_usuario == 'TU002' || Auth::User()->cod_tipo_usuario == 'TU003')
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Controles de Personal
        </a>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
        <div class="list-group">
            <li class="list-group-item"><a href="{{ route('ver_empleados') }}">Ver operarios</a></li>
            @if(Auth::User()->cod_tipo_usuario == 'TU001')
            <li class="list-group-item"><a href="{{ route('nuevo_empleado') }}">Nuevo operario</a></li>
            @endif
            <li class="list-group-item"><a href="{{ route('ver_usuarios') }}">Ver usuarios</a></li>
            @if(Auth::User()->cod_tipo_usuario == 'TU001')
            <li class="list-group-item"><a href="#">Nuevo usuario</a></li>
            @endif
            <!--<li class="list-group-item"><a href="#">Ver auditores</a></li>
            <li class="list-group-item"><a href="#">Nuevo auditor</a></li>-->
            <li class="list-group-item"><a href="{{ route('ver_empresas') }}">Ver empresas</a></li>
            @if(Auth::User()->cod_tipo_usuario == 'TU001')
            <li class="list-group-item"><a href="{{ route('nueva_empresa') }}">Agregar empresa</a></li>
            @endif
        </div>
    </div>
  </div>
  @endif

  @if(Auth::User()->cod_tipo_usuario != 'TU001') 
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingTwo">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Controles de Producto
        </a>
      </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo">
        <div class="list-group">
            @if(Auth::User()->cod_tipo_usuario != 'TU001') 
            <li class="list-group-item"><a href="{{ route('ver_productos') }}">Stock de Productos</a></li>
            @endif
            @if(Auth::User()->cod_tipo_usuario == 'TU002' || Auth::User()->cod_tipo_usuario == 'TU003')
            <li class="list-group-item"><a href="{{ route('nuevo_producto') }}">Nuevo Producto</a></li>
            @endif
            @if(Auth::User()->cod_tipo_usuario == 'TU004') 
            <li class="list-group-item"><a href="{{ route('ver_produccion') }}">Ordenes de produccion</a></li>
            @endif
            @if(Auth::User()->cod_tipo_usuario == 'TU005') 
            <li class="list-group-item"><a href="{{ route('rechazos_produccion') }}">Rechazo de producción</a></li>
            @endif
        </div>
    </div>
  </div>
  @endif

  @if(Auth::User()->cod_tipo_usuario == 'TU002' || Auth::User()->cod_tipo_usuario == 'TU003' || Auth::User()->cod_tipo_usuario == 'TU005') 
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingThree">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          Controles de Compra
        </a>
      </h4>
    </div>
    <div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThree">
        <div class="list-group">
            @if(Auth::User()->cod_tipo_usuario == 'TU002' || Auth::User()->cod_tipo_usuario == 'TU003') 
            <li class="list-group-item"><a href="{{ route('ver_compras') }}">Ordenes de compras</a></li>
            @endif
            @if(Auth::User()->cod_tipo_usuario == 'TU005') 
            <li class="list-group-item"><a href="{{ route('rechazos_compra') }}">Rechazo de compras</a></li>
            @endif
        </div>
    </div>
  </div>
  @endif

  <!--<div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingFour">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
          Reportes
        </a>
      </h4>
    </div>
    <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
        <div class="list-group">
            <li class="list-group-item"><a href="#">Bihorales</a></li>
            <li class="list-group-item"><a href="#">Stock</a></li>
            <li class="list-group-item"><a href="#">Empleados</a></li>    
            <li class="list-group-item"><a href="#">Auditorias</a></li>   
        </div>
    </div>
  </div>-->
</div>