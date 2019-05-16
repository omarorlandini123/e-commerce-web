<div class="card" style="margin-bottom: 10px;">
    <div class="card-body">
        <div class="row">
            <div class="col-4">
                <center> <a href="javascript:PreviewProducto({{$detalle->producto->producto_id}},'{{$token}}')" ><img src="/Producto/Preview/{{$detalle->producto->producto_id}}/{{$token}}" width="100" height="100"
                    alt="{{$detalle->producto->producto_nombre}}" class="rounded-circle"></a></center>
                    S/. <span id="prec_{{$detalle->producto->producto_id}}">{{number_format($detalle->producto->producto_precio,2)}}</span>
            </div>
            <div class="col-8" >
                <h5 class="card-title">{{$detalle->producto->producto_nombre}}</h5>
                <div class="form-group">                                
                    <input type="number" onkeyup="calcular4({{$detalle->producto->producto_id}})" class="form-control producto" id_producto="{{$detalle->producto->producto_id}}" name="prod_{{$detalle->producto->producto_id}}" id="prod_{{$detalle->producto->producto_id}}" aria-describedby="cantidad" placeholder="¿Cuántos quieres?">
                    <small id="cantidad" class="form-text text-muted">Coloca la cantidad que deseas</small>
                </div>
                <div class="row">
                    <div class="col-6">
                       Total
                    </div>
                    <div class="col-6">
                        S/. <span class="total_prod" id="prec_total_{{$detalle->producto->producto_id}}">0.00</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 