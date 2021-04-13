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

if (isset($_GET['num'])) {
    $pagina = $_GET['num'];
}
//Definir el numero de registross
if (isset($_GET['num_reg']) || isset($_GET['num'])) {
    $registros = $_GET['num_reg'];
} else {
    $registros = 3;
}

//Definir el inicio a la pagina a mostrar
if (!$pagina) {
    $inicio = 0;
    $pagina = 1;
} else {
    $inicio = ($pagina - 1) * $registros;
}
$query = "SELECT * FROM categorias";
$num_registro = NumReg($query);

$queryCate = "SELECT * FROM categorias ORDER BY id_categorias LIMIT $inicio, $registros";

$DataCategorias = SelectData($queryCate, "i");
$paginas = ceil($num_registro / $registros);
?>
<?php if ($DataCategorias) : ?>
    <?php include "tabla_categorias.php"; ?>
    <?php if ($num_registro > $registros) : ?>
        <?php if ($pagina == 1) : ?>
            <div style="text-align: center;">
                <a class="btn  pagina" href="" v-num="<?php echo ($pagina + 1); ?>" num-reg="<?php echo $registros; ?>"> <i class="fas fa-arrow-alt-circle-right fa-2x"></i></a>
            </div>
        <?php elseif ($pagina == $paginas) : ?>
            <div style="text-align: center;">
                <a class="btn  pagina" href="" v-num="<?php echo ($pagina - 1); ?>" num-reg="<?php echo $registros; ?>"> <i class="fas fa-arrow-alt-circle-left fa-2x"></i> </a>
            </div>
        <?php else : ?>
            <div style="text-align: center;">
                <a class="btn  pagina" href="" v-num="<?php echo ($pagina - 1); ?>" num-reg="<?php echo $registros; ?>"> <i class="fas fa-arrow-alt-circle-left fa-2x"></i> </a> &nbsp;
                <a class="btn  pagina" href="" v-num="<?php echo ($pagina + 1); ?>" num-reg="<?php echo $registros; ?>"> <i class="fas fa-arrow-alt-circle-right fa-2x"></i></a>
            </div>
        <?php endif ?>
    <?php endif ?>
<?php else : ?>
    <div class="alert alert-danger">
        No se encuentran datos
    </div>
<?php endif ?>