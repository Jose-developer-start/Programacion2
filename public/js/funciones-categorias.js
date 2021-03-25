$(document).ready(function(){
    //Funcion para cargar la vista de principal categorias
    $("a.categorias").click(function(event){
        $("#contenido-procesos").load("procesos_varios/categorias/principal_categorias.php");
        event.preventDefault();
    });
});
//Categoria
//id_categoria INT(5) auto_ not null
//categoria Varchar(50)