<script src="../../public/js/js_funciones.js"></script>
<?php 
    session_start();
    include '../../../models/conexion.php';
    include '../../../models/procesos.php';
	include '../../../controllers/procesos.php';

   
?>
<?php //if ($update == 1):?>
<!-- script>
    $(document).ready(function() 
    {
        alertify.alert("Modificar Contraseña","Contraseña modificada...");
        $("#capa").load("usuarios/principal.php");
        event.preventDefault();
    });
</script>
<?php //else: ?>    
    <script>
    $(document).ready(function() 
    {
        alertify.alert("Modificar Contraseña","Error al modificar contraseña...");
        $("#capa").load("usuarios/principal.php");
        event.preventDefault();
    });
</script-->
<?php //endif ?>