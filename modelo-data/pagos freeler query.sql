    SELECT 
    a.freeler_id freeler_id,
    b.usuario_nombre nombre,
    b.usuario_apellidoPa apellido_paterno,
    b.usuario_apellidoMa apellido_materno,
    b.usuario_email email,
    e.producto_nombre,
    d.cantidad cantidad,
    e.producto_precio precio,
    d.cantidad  * e.producto_precio precio_total
    FROM freeler a 
    inner join usuario b on a.usuario_id=b.usuario_id
    inner join pedido c on a.freeler_id=c.freeler_shared_id and c.pagado=1 and c.eliminado=0
    inner join detalle_pedido d on c.pedido_id=d.pedido_id
    inner join producto e on d.producto_id=e.producto_id and producto_es_tercerizable=1
    inner join empresa f on e.empresa_id=f.empresa_id
    where a.freeler_id<>f.freeler_id;


    SELECT 
    a.freeler_id freeler_que_ha_vendido,
    f.freeler_id freeler_propietario_del_producto,
    sum(d.cantidad  * e.producto_precio) venta_total,
    round(sum(d.cantidad  * e.producto_precio)*0.9,2) al_propietario_90_porciento,
    round(sum(d.cantidad  * e.producto_precio)*0.05,2) pagar_a_freeler_app_5_porciento,
    round(sum(d.cantidad  * e.producto_precio)*0.05,2) para_vendedor_5_porciento
    FROM freeler a 
    inner join usuario b on a.usuario_id=b.usuario_id
    inner join pedido c on a.freeler_id=c.freeler_shared_id and c.pagado=1 and c.eliminado=0
    inner join detalle_pedido d on c.pedido_id=d.pedido_id
    inner join producto e on d.producto_id=e.producto_id and producto_es_tercerizable=1
    inner join empresa f on e.empresa_id=f.empresa_id
    where a.freeler_id<>f.freeler_id
    group by f.freeler_id  ;