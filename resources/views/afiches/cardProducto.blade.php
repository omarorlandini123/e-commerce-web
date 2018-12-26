<div class="card" style="margin-bottom: 10px;">
    <div class="card-body">
        <div class="row">
            <div class="col-4">
                <center> <img src="/Producto/Preview/{{$detalle->producto->producto_id}}/{{$token}}" width="100" height="100"
                    alt="{{$detalle->producto->producto_nombre}}" class="rounded-circle"></center>
            </div>
            <div class="col-8" >
                <h5 class="card-title">{{$detalle->producto->producto_nombre}}</h5>
                <div class="form-group">                                
                    <input type="number" class="form-control" name="prod:{{$detalle->producto->producto_id}}" id="prod:{{$detalle->producto->producto_id}}" aria-describedby="cantidad" placeholder="¿Cuántos quieres?">
                    <small id="cantidad" class="form-text text-muted">Coloca la cantidad que deseas</small>
                </div>
            </div>
        </div>
    </div>
</div> 