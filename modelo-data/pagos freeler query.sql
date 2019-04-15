SELECT 
b.usuario_nombre as 'vender_nombre'
FROM freeler a 
inner join usuario b on a.usuario_id=b.usuario_id
inner join pedido c on a.freeler_id=c.freeler_shared_id and c.pagado=1 and c.eliminado=0
inner join detalle_pedido d on c.pedido_id=d.pedido_id
inner join producto e on d.producto_id=e.producto_id
inner join empresa f on e.empresa_id=f.empresa_id
where a.freeler_id<>f.freeler_id;