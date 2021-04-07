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
    $queryCate = "SELECT * FROM categorias ORDER BY id_categorias";

    $DataCategorias = SelectData($queryCate,"i");

    include "tabla_categorias.php";

?>
