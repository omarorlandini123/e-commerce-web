function calcular(var_id_prodcuto){
    $('#prec_total_'+var_id_prodcuto).html(
        parseFloat(
            Math.round(
                $('#prod_'+var_id_prodcuto).val()
                * parseInt($('#prec_'+var_id_prodcuto).html()) * 100) / 100).toFixed(2)
        
        );
    var_total=0;
   
    $('.total_prod').each(function(index){
        
        var_total=parseFloat(var_total)+parseFloat($(this).html()) ;
           
    });
    $('#total_pago').html(parseFloat(var_total).toFixed(2));
}

function calcular2(var_id_prodcuto){
    $('#prec_total_'+var_id_prodcuto).html(
        parseFloat(
            Math.round(
                $('#prod_'+var_id_prodcuto).val()
                * parseInt($('#prec_'+var_id_prodcuto).html()) * 100) / 100).toFixed(2)
        
        );
        $('#prod_cant_'+var_id_prodcuto).html(parseFloat(
            Math.round(
                $('#prod_'+var_id_prodcuto).val()  * 100) / 100).toFixed(2));
    var_total=0;
   
    $('.total_prod').each(function(index){
        
        var_total=parseFloat(var_total)+parseFloat($(this).html()) ;
           
    });
    $('#total_pago').html(parseFloat(var_total).toFixed(2));
}




