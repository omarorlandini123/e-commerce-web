<nav class="navbar navbar-expand-lg navbar-light " style="background-color: #6f00ff;">
  <a class="navbar-brand" href="#" style="
    color: white;
">Freeler</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText"
    aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      
    </ul>
    @if(Session::has('comprador_id'))

    <span class="navbar-text">
      @inject('Comprador', 'App\Comprador')
      
      <label style="margin-right:15px;color:white">{{$Comprador::where('comprador_id',Session::get('comprador_id'))->first()->usuario->nombre_completo()}}</label>

      <a href="/logout" style="color:white;">Cerrar Sesión</a>
    </span>
    @elseif(Session::has('administrador_id'))
    <span class="navbar-text">
      @inject('Administrador', 'App\Administrador')
      
      <label style="margin-right:15px;color:white">{{$Administrador::where('administrador_id',Session::get('administrador_id'))->first()->usuario->nombre_completo()}}</label>

      <a href="/logout" style="color:white;">Cerrar Sesión</a>
    </span>
    @else
      <span class="navbar-text">
                
        <a href="/login" style="color:white;">Ingresar</a>
      </span>
    @endif
  </div>
</nav>