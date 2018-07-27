$(document).ready(function(){
    console.log("Script Funcionando");
});

$("#btn-filter").click(function(){

    var provID = $("#idProv").val();
    var artID = $("#idArticulo").val();
    var token = $("input[name=_token]").val();

    $.ajax({
        type: 'POST',
        url: '/bodegas/filter',
        data: {_token:token, provID: provID, artID: artID},
        success: function(data){
            $("#body-filter-table").html(data);
        },
        error: function(err){
            console.log(err);
        }
    });
});


$("#btn-buscar-sf").click(function(){

    var artId = $("#compraId").val();
    var token = $("input[name=_token]").val();

    $.ajax({
        type: 'POST',
        url: '/compras/buscar',
        data: {_token:token, artId: artId},
        success: function(data){
            $("#body-search-table").html(data);
        },
        error: function(err){
            console.log(err);
        }
    });

});

$("#btn-buscar-sf-em").click(function(){

    var empaqueID = $("#empaqueID").val();
    var token = $("input[name=_token]").val();

    $.ajax({
        type: 'POST',
        url: '/empaques/filter',
        data: {_token:token, empaqueID: empaqueID},
        success: function(data){
            $("#body-search-table").html(data);
        },
        error: function(err){
            console.log(err);
        }
    });

});

$("#btn-buscar-sf-pe").click(function(){

    var pedidoID = $("#search").val();
    var token = $("input[name=_token]").val();

    $.ajax({
        type: 'POST',
        url: '/pedidos/buscar',
        data: {_token:token, pedidoID: pedidoID},
        success: function(data){
            $("#body-search-table").html(data);
        },
        error: function(err){
            console.log(err);
        }
    });

});