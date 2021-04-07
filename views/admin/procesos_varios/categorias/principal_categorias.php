<head>
    <script src="../../public/js/funciones-navbar.js"></script>
    <script src="../../public/js/funciones-categorias.js"></script>
</head>


<?php
    session_start();
    include_once "../../../../models/conexion.php";
    include_once "../../../../models/procesos.php";
    include_once "../../../../controllers/procesos.php";

    $cont = 0;
    $pagina = 0;

    if(isset($_GET['num'])){
        $pagina = $_GET['num'];
    }
    //Definir el numero de registro
    if(isset($_GET['n_reg']) || isset($_GET['num'])){
        $registro = $_GET['n_reg'];
    }else{
        $registro = 3;
    }

    //Definir el inicio a la pagina a mostrar
    if(!$pagina){
        $inicio = 0;
        $pagina = 1;
    }else{
        $inicio = ($pagina - 1) * $registro;
    }
    $query = "SELECT * FROM categorias";
    $queryCate = "SELECT * FROM categorias ORDER BY id_categorias LIMIT $inicio, $registro";

    $DataCategorias = SelectData($queryCate,"i");

    include "tabla_categorias.php";

?>
