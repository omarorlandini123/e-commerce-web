
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <meta property="og:image" content="http://test.exac-tic.com/Producto/PreviewTiny/{{$rpta->objeto->producto_id}}/{{$token}}" />
    <meta name="description" content="{{$rpta->objeto->producto_nombre}}  {{$rpta->objeto->producto_descripcion}} ">
    <meta name="author" content="Freeler ">
    <title>{{$rpta->objeto->empresa->empresa_nombre}}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="/css/app.css" >
    <link href="/open-iconic/font/css/open-iconic.css" rel="stylesheet">
  </head>

  <body >

    @include('principal.navbar')

    
    <div id="app" class="container" style="margin-top:50px;">
      
      <div class="row">
          @yield('contenido')      
       
      </div>

      

      
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>Modal body text goes here.</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

    <script src="/js/app.js"></script>
    <script src="/js/funciones.js"></script>
    

   
  </body>
</html>
