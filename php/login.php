<?php 

    $usuario = limpiar_cadena($_POST['login_usuario']);
    $clave = limpiar_cadena($_POST['login_clave']);

    if ($usuario == "" || $clave == "" ) {
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                No has llenado todos los campos que son obligatorios
            </div>
            ';
        exit();
    }

    if (verificar_datos("[a-zA-Z0-9]{4,20}", $usuario)) {
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                El Usuario no coincide con el formato solicitado
            </div>
            ';
        exit();
    }

    if (verificar_datos("[a-zA-Z0-9$@.-]{7,100}", $clave)) {
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                La Contraseña no coincide con el formato solicitado
            </div>
            ';
        exit();
    }

    $check_user = conexion();
    $check_user = $check_user->query("SELECT * FROM usuario WHERE usuario_usuario='$usuario'");

    if($check_user->rowCount()==1){
        $check_user=$check_user->fetch();
        if($check_user['usuario_usuario']==$usuario && password_verify($clave,$check_user['usuario_clave'])){
            $_SESSION['id']=$check_user['id_usuario'];
            $_SESSION['nombre']=$check_user['usuario_nombre'];
            $_SESSION['apellido']=$check_user['usuario_apellido'];
            $_SESSION['usuario']=$check_user['usuario_usuario'];
            #$_SESSION['logged_in'] = true;
            if(headers_sent()){
                echo "<script>window.location.href='index.php?views=home';</script>";
                
            }else{
                header("Location: index.php?views=home");
            }
        }else{
            echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                Error al iniciar sesion, usuario y/o contraseña son incorrectos
            </div>
            ';
        }
    }else{
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                Error al iniciar sesion, usuario y/o contraseña son incorrectos
            </div>
            ';
    }
    $check_user=null;