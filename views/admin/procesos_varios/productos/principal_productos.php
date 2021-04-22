<head>
    <script src="../../public/js/funciones-productos.js"></script>
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
if (isset($_GET['n_reg']) || isset($_GET['num'])) {
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

if (isset($_GET['like'])) {
    $valor = $_GET['valor'];
    $queryCate = "SELECT * FROM producto WHERE nombre_productos LIKE '%$valor%'";
} else {
    $queryCate = "SELECT * FROM producto ORDER BY id_producto LIMIT $inicio, $registros";
}

$DataCategorias = SelectData($queryCate, "i");
$num_registro = NumReg($query);
$paginas = ceil($num_registro / $registros);


?>
<?php if ($DataCategorias) : ?>
    <div class="row" style="margin-bottom: 10px">
        <div class="col-md-6">
            <a href="" class="btn btn-primary" id="new-cate">
                <i class="fas fa-plus-circle"><b> Producto</b></i>
            </a>
        </div>
        <div class="col-md-6">
            <input type="search" class="form-control" id="like-productos" placeholder="Buscar producto">
        </div>
    </div>
    <div>
        <select name="" id="select-reg" class="custom-select" style="width: 150px; margin-bottom:10px;">
            <option value="" disabled selected>N° Registro</option>
            <option value="5">5</option>
            <option value="10">10</option>
            <option value="15">15</option>
            <option value="20">20</option>
            <option value="30">30</option>
            <option value="40">40</option>
            <option value="50">50</option>
        </select>
    </div>
    <style>
        td {
            text-align: center;
            vertical-align: middle;
        }
    </style>
    <table class="table table-bordered table-resposive-md table-sm">

        <thead>
            <tr>
                <th>N°</th>
                <th>Código</th>
                <th>Producto</th>
                <th>Descripción</th>
                <th>Precio de compra</th>
                <th>Precio de venta</th>
                <th>Unidad</th>
                <th>Foto</th>
                <th colspan="2">Procesos</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($DataCategorias as $result) : ?>
                <tr>
                    <td><?php echo $cont += 1; ?></td>
                    <td><?php echo $result['id_producto'] ?></td>
                    <td><?php echo $result['nombre_productos'] ?></td>
                    <td><?php echo $result['descripcion'] ?></td>
                    <td><?php echo $result['precio_compra'] ?></td>
                    <td><?php echo $result['precio_venta'] ?></td>
                    <td><?php echo $result['unidad_medida'] ?></td>
                    <td></td>
                    <td><a href="" class="btn btn-success" id-categoria="<?php echo $result['id_categorias'] ?>">
                            <i class="fas fa-edit"></i>
                        </a></td>
                    <td>
                        <a href="" class="btn btn-danger" id-categoria="<?php echo $result['id_categorias'] ?>">
                            <i class="fas fa-trash-alt"></i>
                        </a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>

    </table>
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