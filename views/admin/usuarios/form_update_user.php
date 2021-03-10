<script src="../../public/js/js_funciones.js"></script>
<?php 
    session_start();
    include '../../../models/conexion.php';
    include '../../../models/procesos.php';
	include '../../../controllers/procesos.php';
    
?>
<style>
    .div-header{
        text-align: center;
        font-weight: bold;
    }

</style>
<div class="row">
    <div class="col-4"></div>
    <div class="col-4">
<?php //if ($_GET['accion'] == 1): ?>
<?php 
    //$iduser = $_GET['id_user'];
    //$query = "";
    //$DataUser = SelectData($query);
?>
<div class="div-header">
    Cambio Contraseña
</div>
<hr>
<?php //foreach ($DataUser AS $result): ?>
<div class="div-body">
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Usuario</span>
        </div>
        <input type="hidden" name="user" id="id-user"  value="<?php echo $iduser; ?>" required="on" readonly />
        <input type="text" name="user" id="user" class="form-control" placeholder="Usuario" value="<?php echo $result['usuario']; ?>" required="on" readonly />
    </div>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1">Contraseña</span>
        </div>
        <input type="password" minlength="8" name="passw" id="n-passw" class="form-control" value="" placeholder="Contraseña" required="on" />
    </div>
    <div>
        <a class="btn btn-primary text-white" id="upd-user"><i class="fas fa-save"></i> Actualizar</a>
        <a class="btn btn-danger text-white usuario"><i class="fas fa-ban"></i> Cancelar</a>
    </div>
</div>
<?php //endforeach ?>
<?php //elseif ($_GET['accion'] == 2): ?>
    <h2>Elimino Usuario</h2>

<?php //elseif ($_GET['accion'] == 3): ?>
<?php 
    ?>
    <?php //if ($update == 1):?>
    <!-- script>
        $(document).ready(function() 
        {
            alertify.alert("Modificar Estado","Estado modificado...");
            $("#capa").load("usuarios/principal.php");
            event.preventDefault();
        });
    </script>
    <?php //else: ?>    
        <script>
        $(document).ready(function() 
        {
            alertify.alert("Modificar Estado","Error al modificar estado...");
            $("#capa").load("usuarios/principal.php");
            event.preventDefault();
        });
    </script-->
    <?php //endif ?>
<?php //else: ?>

<?php //endif?>
</div>
    <div class="col-4"></div>
</div>