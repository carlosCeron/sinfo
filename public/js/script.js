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

/* add Btn Pedidos */

$("#addBtn").click(function(){

    var itemsCount = parseInt($("#countItems").val());

    console.log(itemsCount);

    var newItemList = itemsCount + 1;
    var element = $("#item").clone(true)
    .attr('id', 'item' + newItemList)
    .attr('name', 'pedido' + newItemList)
    .appendTo("#items");

    $(element).find('select').attr('name',"articulo" + newItemList);
    $(element).find('input[type=text]').attr("name", "cantidad" + newItemList);


    $("#countItems").val(newItemList);
});

$(".removeBtn").click(function(){

    var elemens = parseInt($("#countItems").val());
    
    if(elemens > 1) {
        $(this).parent().parent().remove();
        $("#countItems").val(elemens - 1);
    }
});

$("#btnProvFil").click(function(){

    var artD = $("#idArticulo").val();
    var token = $("input[name=_token]").val();

    $.ajax({
        type: 'POST',
        url: '/compras/filter',
        data: {_token:token, artD: artD},
        success: function(data){
            $("#proveedoresId").html(data);
        },
        error: function(err){
            console.log(err);
        }
    });

});

$(".btnSelProv").click(function(){

    var idPedido = $("#idPedido").val();
    var proveedorId = $(this).parent().siblings(":first").text();
    var proveedorName = $(this).parent().siblings(":nth-child(2)").text();
    var proveedorPrecio = $(this).parent().siblings(":nth-child(3)").text();

    var idProv = "proveedor_"+idPedido;
    var precioProv = "precio_"+idPedido;

    $("input[name="+idProv+"]").val(proveedorName);
    $("input[name="+precioProv+"]").val(proveedorPrecio);
    $("input[name=provID_"+ idPedido).val(proveedorId);

    $('.bd-example-modal-lg').modal('hide');


});


$('.bd-example-modal-lg').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var idPedido = button.data('whatever') // Extract info from data-* attributes
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    modal.find('#idPedido').val(idPedido)
  })