<?php
    session_start();
    include "../../../../models/conexion.php";
    include "../../../../models/procesos.php";
    include "../../../../controllers/procesos.php";

    if(isset($_GET['insert_cate'])){
        $categoria = $_GET['categoria'];
        $query = "INSERT INTO categorias (categoria,imagen_categoria) VALUES('$categoria','')";
        $insertCate = U_I_D($query);
        if($insertCate == 1){
            echo '<script>
                $(document).ready(function(event){
                    alertify.alert("Registro Categoria","Categoria Registrada");
                    $("#contenido-procesos").load("procesos_varios/categorias/principal_categorias.php");
                })
            </script>';
        }else{
            echo '<script>
                $(document).ready(function(event){
                    alertify.alert("Registro Categoria","Error al Registrada Categoria");
                    $("#contenido-procesos").load("procesos_varios/categorias/principal_categorias.php");
                })
            
            
            </script>';
        }
    

    }

?>