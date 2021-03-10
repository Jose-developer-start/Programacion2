<script src="../../public/js/js_funciones.js"></script>
<?php 
    session_start();
    include '../../../models/conexion.php';
    include '../../../models/procesos.php';
	include '../../../controllers/procesos.php';


    
    $query = "";

    //$insert = InsertData($query)
?>
<?php //if ($insert == 1):?>
<!-- script>
    $(document).ready(function() 
    {
        alertify.alert("Registro Usuario","Usuario registrado");
        $("#capa").load("usuarios/principal.php");
        event.preventDefault();
    });
</script>
<?php //else: ?>    
    <script>
    $(document).ready(function() 
    {
        alertify.alert("Registro Usuario","Error al registrar usuario...");
        $("#contenido-usuario").load("usuarios/form_new_user.php");
        event.preventDefault();
    });
</script>
<?php //endif ?>