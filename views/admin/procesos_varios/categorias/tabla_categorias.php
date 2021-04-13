<style>
    td{
        text-align: center;
        vertical-align: middle;
    }
</style>
<table class="table table-bordered table-resposive-md table-sm" >

    <thead>
        <tr>
            <th>N°</th>
            <th>ID</th>
            <th>Categoria</th>
            <th colspan="2">Procesos</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($DataCategorias AS $result): ?>
        <tr>
            <td><?php echo $cont += 1; ?></td>
            <td><?php echo $result['id_categorias']?></td>
            <td><?php echo $result['categoria']?></td>
            <td><a href="" class="btn btn-success" id-categoria="<?php echo $result['id_categorias']?>">
                <i class="fas fa-edit"></i>
            </a></td>
            <td>
            <a href="" class="btn btn-danger" id-categoria="<?php echo $result['id_categorias']?>">
                <i class="fas fa-trash-alt"></i>
            </a>
            </td>
        </tr>
        <?php endforeach ?>
    </tbody>
    
</table>