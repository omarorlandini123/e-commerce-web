
<div class="modal-dialog" role="document">
        @if ($rpta->tieneError)
        <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Problemas</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                        <h3>{{$rpta->error}}</h3>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">OK</button>
                </div>
              </div>
        
        @else

        <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">{{$rpta->objeto->producto_nombre}}</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                        <div class="card bg-dark text-white">
                                <img class="card-img" src="/Producto/Preview/{{$rpta->objeto->producto_id}}/{{$token}}" alt="Card image">
                                <div class="card-img-overlay">
                                    <h5 class="card-title"></h5>
                                    <p class="card-text"></p>
                                    <p class="card-text"></p>
                                </div>
                            </div>
                            <br><br>
                            
                            <div class="row">
                                
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="formGroupExampleInput">Nombre</label>
                                        <input type="text" disabled class="form-control" id="formGroupExampleInput"  value ="{{$rpta->objeto->producto_nombre}}"placeholder="Example input">
                                      </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Descripción</label>
                                        <textarea class="form-control" disabled id="exampleFormControlTextarea1" rows="3">{{$rpta->objeto->producto_descripcion}}</textarea>
                                      </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="formGroupExampleInput">Precio</label>
                                        <input type="text" class="form-control"  disabled id="formGroupExampleInput"  value ="S/. {{number_format( $rpta->objeto->producto_precio, 2)   }}"placeholder="Example input">
                                      </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="formGroupExampleInput">Válido hasta</label>
                                        <input type="text" class="form-control" disabled id="formGroupExampleInput"  value ="{{$rpta->objeto->producto_hasta !=null? \Carbon\Carbon::parse($rpta->objeto->producto_hasta)->format('d/m/Y'): "Sin límite"}}"placeholder="Example input">
                                      </div>
                                </div>
                                
                               
                                    <br>
                            </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">OK</button>
                </div>
              </div>
        
        @endif
    
    
  </div>



<div class="col-sm-12 align-self-center">
   


</div>
