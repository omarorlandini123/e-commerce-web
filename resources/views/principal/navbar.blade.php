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
    @if(Session::has('usuarioLogin'))

    <span class="navbar-text">
      @inject('Comprador', 'App\Comprador')
      
      <label style="margin-right:15px;">{{$Comprador::where('comprador_id',Session::get('comprador_id'))->first()->usuario->nombre_completo()}}</label>

      <a href="/logout">Cerrar Sesión</a>
    </span>
    @endif
  </div>
</nav>