<style>
    td,th{
        text-align: center;
        vertical-align: middle;
    }
</style>
<table class="table table-bordered table-resposive-md table-sm" >

    <thead>
        <tr>
            <th>N°</th>
            <th>Código Inventario</th>
            <th>Producto</th>
            <th>categoria</th>
            <th>Stock</th>
            <th>Imagen</th>
            <th colspan="2">Procesos</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($DataCategorias AS $result): ?>
        <tr>
            <td><?php echo $cont += 1; ?></td>
            <td><?php echo $result['id_inventario']?></td>
            <td><?php echo $result['nombre_productos']?></td>
            <td><?php echo $result['categoria']?></td>
            <td><?php echo $result['stock']?></td>
            <td><img src="../../public/img/<?php echo $result['imagen']?>" width="70px" alt=""></td>
            <td><a href="" class="btn btn-success edit-stock" id-stock="<?php echo $result['id_inventario']?>">
                <i class="fas fa-edit"></i>
            </a></td>
            <td>
            <a href="" class="btn btn-danger delete-stock" id-stock="<?php echo $result['id_inventario']?>">
                <i class="fas fa-trash-alt"></i>
            </a>
            </td>
        </tr>
        <?php endforeach ?>
    </tbody>
    
</table>