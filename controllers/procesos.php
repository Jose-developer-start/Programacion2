<?php
    function AccesoLogin($user,$passw){
        $consultas = new Login();
        $data = $consultas->getDataUser($user);
        if($data)
        {
            foreach($data as $result){
                $hash = $result['passw'];
                $tipo = $result['tipo'];
                $estado = $result['estado'];
            }
            if ($estado == 1){
                if(password_verify($passw,$hash)){
                    if($tipo == 1){ //Vista administrador
                        $_SESSION['usuario'] = $user;
                        $_SESSION['tipo'] = $tipo;
                        header("Location:../views/admin/index.php");
                    }else{ //Vista de la tienda
                        $_SESSION['usuario'] = $user;
                        $_SESSION['tipo'] = $tipo;
                        header("Location:../views/store/index.php");
                    }
                }else{
                    header("location:../index.php?mensaje=".base64_encode("Contraseña incorrecta.."));
                }
            }else{
                header("location:../index.php?mensaje=".base64_encode("El usuario no tiene permisos de acceso"));
            }
            
        }
        else
        {
            header("location:../index.php?mensaje=".base64_encode("El usuario no se encuentra en la base de datos..."));
        }
    }

    function Token($len){
        $key = '';
        $cadena = "1234567890abcdefghijklmnopqrstuvwxyz";
        for ($i=0; $i < $len; $i++){
            $key .=$cadena[rand(0,35)];

        }
        return $key;
    }
    function Email($email,$token){
        $desde = "ayuda_progra";
        $cabeceras = "From: Soporte <".$desde.">"."\r\n".'Reply-To:'.$desde.' '."\r\n";
        $cabeceras .= 'Content-type: text/html;charset=utf-8'."\r\n";

        $sms = "<b>Token:</b>".$token;

        mail($email,"Solicitud ", $sms,$cabeceras);
    }
    function OlvideClave($user){
        $consultas = new Login();
        $data = $consultas->getDataUser($user);

        if($data)
        {
            foreach($data as $result){
                
                $tipo = $result['tipo'];
                $email= $result['email'];
            }
            $token = Token(10);
            Email($email,$token);

            $updateUser = $consultas->modificarUser('token',$token,$user);
            if ($updateUser == 1) {
                echo'<script type="text/javascript">
                    alert("Token Generado revisar correo (spam)");
                    window.location.href="../cambio_clave.php";
                </script>';
            }else{
                echo'<script type="text/javascript">
                    alert("Error al generar Token intente de nuevo");
                    window.location.href="../index.php";
                </script>';
            }
        }else{
            header('Location:../index.php');
        }
    }


    function cambioClave($user, $token, $clave1, $clave2){
        $consultas = new Login();
        $data = $consultas->getDataUser($user);

        if($data){
            foreach($data as $result){
                $tokenBD = $result['token'];

            }

            if($token == $tokenBD){
                if($clave1 == $clave2){
                    $passwd = password_hash($clave1, PASSWORD_DEFAULT);
                    $updateUser = $consultas->modificarUser('passw',$passwd,$user);
                    $updateUser = $consultas->modificarUser('token', "",$user);
                    if($updateUser){
                        echo "<script>
                            alert('Modificado');
                            window.location.href='../index.php'
                        </script>";
                    }else{
                        echo "<script>
                            alert('Error');
                            window.location.href='../index.php'
                        </script>";
                    }
                }else{
                    echo "<script>
                            alert('Las constraseñas no coinciden');
                            window.location.href='../index.php'
                        </script>";
                }
            }else{
                echo "<script>
                            alert('Toekn invalido');
                            window.location.href='../cambio_clave.php'
                        </script>";
            }
        }else{
            echo "<script>
                alert('Usuario invalido');
                window.location.href='../cambio_clave.php'
            </script>";
        }

    }

    function vistas(){
        if(isset($_POST['vista_inventario'])){
            include "./inventario/principal.php";
        }elseif(isset($_POST['vista_usuario'])){
            include "./usuario/principal.php";
        }else{
            echo '<div class="alert alert-primary"><i class="fas fa-user"></i> Bienvenido/a: '.$_SESSION["usuario"].'</div>';
        }
    }
    //Funcion para consutar datos de cualquier tabla
    //Optimizar
    function SelectData($query){
        $consultas = new CRUD();
        $data = $consultas->select($query);
        return $data;
    }
    function UpdateInsertDeleteData($query){
        $objetConsulta = new CRUD();
        $data = $objetConsulta->consultasUpdateInsertDelete($query);
        return $data;
    }

?>