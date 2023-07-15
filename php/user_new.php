<?php

    require_once "../php/main.php";
    
    #Almacenando datos
    $nombre = limpiar_cadena($_POST['usuario_nombre']);
    $apellido = limpiar_cadena($_POST['usuario_apellido']);
    $usuario = limpiar_cadena($_POST['usuario_usuario']);
    $email = limpiar_cadena($_POST['usuario_email']);
    $clave_1 = limpiar_cadena($_POST['usuario_clave_1']);
    $clave_2 = limpiar_cadena($_POST['usuario_clave_2']);

    #Verificando campos obligatorios
    if($nombre=="" || $apellido=="" || $usuario=="" || $email=="" || $clave_1=="" || $clave_2==""){
        echo '
        <div class="notification is-danger is-light">
            <strong>¡Ocurrio un error inesperado!</strong><br>
            No has llenado todos los campos que son obligatorios
        </div>
        ';
        exit();
    }

    if(verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}",$nombre)){
        echo '
        <div class="notification is-danger is-light">
            <strong>¡Ocurrio un error inesperado!</strong><br>
            El NOMBRE no coincide con el formato solicitado
        </div>
        ';
        exit();
    }

    if(verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}",$apellido)){
        echo '
        <div class="notification is-danger is-light">
            <strong>¡Ocurrio un error inesperado!</strong><br>
            El APELLIDO no coincide con el formato solicitado
        </div>
        ';
        exit();
    }
    
    if(verificar_datos("[a-zA-Z0-9]{4,20}",$usuario)){
        echo '
        <div class="notification is-danger is-light">
            <strong>¡Ocurrio un error inesperado!</strong><br>
            El USUARIO no coincide con el formato solicitado
        </div>
        ';
        exit();
    }
    
    if(verificar_datos("[a-zA-Z0-9]{4,20}",$usuario)){
        echo '
        <div class="notification is-danger is-light">
            <strong>¡Ocurrio un error inesperado!</strong><br>
            El USUARIO no coincide con el formato solicitado
        </div>
        ';
        exit();
    }
    
    if(verificar_datos("[a-zA-Z0-9$@.-]{7,100}",$clave_1) || verificar_datos("[a-zA-Z0-9$@.-]{7,100}",$clave_2)){
        echo '
        <div class="notification is-danger is-light">
            <strong>¡Ocurrio un error inesperado!</strong><br>
            La CLAVE no coincide con el formato solicitado
        </div>
        ';
        exit();
    }

    #Verificacndo el email
    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
        $check_email=conexion();
        $check_email=$check_email->query("SELECT usuario_email FROM usuario WHERE usuario_email='$email'");
        if($check_email->rowCount()>0){
            echo '
        <div class="notification is-danger is-light">
            <strong>¡Ocurrio un error inesperado!</strong><br>
            El CORREO ya se encuentra registrado, por favor elija otro
        </div>
        ';
        exit();
        }
        $check_email=null;
    }else{
        echo '
        <div class="notification is-danger is-light">
            <strong>¡Ocurrio un error inesperado!</strong><br>
            El CORREO ingresado no es valido
        </div>
        ';
        exit();
    }