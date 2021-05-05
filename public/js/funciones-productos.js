$(document).ready(function(){
    //Funcion para cargar la vista de principal productos
    $("a.productos").click(function(event){
        $("#contenido-procesos").load("procesos_varios/productos/principal_productos.php");
        event.preventDefault();
    });
    /*Envia el numero de paginas*/
    $("a.pagina").click(function(event){
        var num, reg;
        num = $(this).attr("v-num");
        reg = $(this).attr("num-reg");
        $("#contenido-procesos").load("procesos_varios/productos/principal_productos.php?num=" + num +"&num_reg="+reg);
        event.preventDefault();
    })
    /*Aumentar el numero de registro tabla producto*/
    $('#select-reg').on('change', function(event){
        var valor;
        valor = $("#select-reg option:selected").val();
        $("#contenido-procesos").load("procesos_varios/productos/principal_productos.php?n_reg=1&num_reg="+valor);
        event.preventDefault();
    })
    /*Buscar producto*/
    $('#like-productos').on('change', function(event){
        var valor;
        valor = $("#like-productos").val();
        $("#contenido-procesos").load("procesos_varios/productos/principal_productos.php?like=1&valor="+valor);
        event.preventDefault();
    });
    /*Cargar formulario para nuevo producto*/
    $("#new-product").click(function(event){
        $("#contenido-procesos").load("procesos_varios/productos/form_insert.php");
        event.preventDefault();
    });
    //Obtener los datos del formulario de registro de nuevo producto
    $("#add-product").on('submit',function(event){
        event.preventDefault();

        var formData = new FormData(document.getElementById('add-product'));
        formData.append("dato","valor");
        $.ajax({
            url: "procesos_varios/productos/save_producto.php",
            type: "post",
            dataType: "html",
            data: formData,
            cache: false,
            contentType: false,
            processData: false
        }).done(function(res){
            $("#contenido-procesos").html(res);
        })
    })
});
