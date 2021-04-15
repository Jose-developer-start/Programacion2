$(document).ready(function(){
    //Funcion para cargar la vista de principal categorias
    $("a.categorias").click(function(event){
        $("#contenido-procesos").load("procesos_varios/categorias/principal_categorias.php");
        event.preventDefault();
    });
    /*Envia el numero de paginas*/
    $("a.pagina").click(function(event){
        var num, reg;
        num = $(this).attr("v-num");
        reg = $(this).attr("num-reg");
        $("#contenido-procesos").load("procesos_varios/categorias/principal_categorias.php?num=" + num +"&num_reg="+reg);
        event.preventDefault();
    })
    /*Aumentar el numero de registro tabla categoria*/
    $('#select-reg').on('change', function(event){
        var valor;
        valor = $("#select-reg option:selected").val();
        $("#contenido-procesos").load("procesos_varios/categorias/principal_categorias.php?n_reg=1&num_reg="+valor);
        event.preventDefault();
    })
    /*Buscar categoria*/
    $('#like-categoria').on('change', function(event){
        var valor;
        valor = $("#like-categoria").val();
        $("#contenido-procesos").load("procesos_varios/categorias/principal_categorias.php?like=1&valor="+valor);
        event.preventDefault();
    });
    /*Cargar formulario para nueva categoria*/
    $("#new-cate").click(function(event){
        $("#contenido-procesos").load("procesos_varios/categorias/form_insert.php");
        event.preventDefault();
    });
    $("#save-categoria").click(function(event){
        var categoria = $("#categoria").val();
        if(categoria == ""){
            alertify.alert("Registro","El campo categoria esta vacio")
            event.preventDefault();
        }else{
            $("#contenido-procesos").load("procesos_varios/categorias/IUD_categoria.php?insert_cate=1&categoria="+categoria);
            event.preventDefault();
        }
    })
});
