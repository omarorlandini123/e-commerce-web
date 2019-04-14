function calcular(var_id_prodcuto) {
    $('#prec_total_' + var_id_prodcuto).html(
        parseFloat(
            Math.round(
                $('#txt_cantidad').val()
                * parseInt($('#prec_' + var_id_prodcuto).html()) * 100) / 100).toFixed(2)

    );
    var_total = 0;

    $('.total_prod').each(function (index) {

        var_total = parseFloat(var_total) + parseFloat($(this).html());

    });
    $('#total_pago').html(parseFloat(var_total).toFixed(2));
}
 
function calcular2(var_id_prodcuto) {
    if ($('#txt_cantidad').val() != "") {
        if ($('#txt_cantidad').val()<0) {
            $('#txt_cantidad').val(Math.abs($('#txt_cantidad').val()));
        } 
        
        if ($('#txt_cantidad').val().toString().includes('-')) {
            $('#txt_cantidad').val('');
        }  

    }else{
        $('#txt_cantidad').val('');
    }

    $('#prec_total_' + var_id_prodcuto).html(
        parseFloat(
            Math.round(
                $('#txt_cantidad').val()
                * parseFloat($('#prec_' + var_id_prodcuto).html()) * 100) / 100).toFixed(2)

    );
    $('#prod_cant_' + var_id_prodcuto).html(parseFloat(
        Math.round(
            $('#txt_cantidad').val() * 100) / 100).toFixed(2));
    var_total = 0;

    $('.total_prod').each(function (index) {

        var_total = parseFloat(var_total) + parseFloat($(this).html());

    });
    $('#total_pago').html(parseFloat(var_total).toFixed(2));
}
 
function calcular3(var_id_prodcuto) {
    if ($('#txt_cantidad').val() != "") {
        if ($('#txt_cantidad').val()<0) {
            $('#txt_cantidad').val(Math.abs($('#txt_cantidad').val()));
        } 
        
        if ($('#txt_cantidad').val().toString().includes('-')) {
            $('#txt_cantidad').val('');
        }  

    }else{
        $('#txt_cantidad').val('');
    }

    $('#prec_total_' + var_id_prodcuto).html(
        parseFloat(
            Math.round(
                $('#txt_cantidad').val()
                * parseFloat($('#prec_' + var_id_prodcuto).html()) * 100) / 100).toFixed(2)

    );
    $('#prod_cant_' + var_id_prodcuto).html(parseFloat(
        Math.round(
            $('#txt_cantidad').val() * 100) / 100).toFixed(2));
    var_total = 0;

    $('.total_prod').each(function (index) {

        var_total = parseFloat(var_total) + parseFloat($(this).html());

    });
    
}

function calcular4(var_id_prodcuto) {
    if ($('#prod_'+var_id_prodcuto).val() != "") {
        if ($('#prod_'+var_id_prodcuto).val()<0) {
            $('#prod_'+var_id_prodcuto).val(Math.abs($('#prod_'+var_id_prodcuto).val()));
        } 
        
        if ($('#prod_'+var_id_prodcuto).val().toString().includes('-')) {
            $('#prod_'+var_id_prodcuto).val('');
        }  

    }else{
        $('#prod_'+var_id_prodcuto).val('');
    }

    $('#prec_total_' + var_id_prodcuto).html(
        parseFloat(
            Math.round(
                $('#prod_'+var_id_prodcuto)
                * parseFloat($('#prec_' + var_id_prodcuto).html()) * 100) / 100).toFixed(2)

    );
    $('#prod_cant_' + var_id_prodcuto).html(parseFloat(
        Math.round(
            $('#prod_'+var_id_prodcuto) * 100) / 100).toFixed(2));
    var_total = 0;

    $('.total_prod').each(function (index) {

        var_total = parseFloat(var_total) + parseFloat($(this).html());

    });
    
}






