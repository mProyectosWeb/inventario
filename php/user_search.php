<?php

$modulo_buscador = limpiar_cadena($_POST['modulo_buscador']);

$modulo = ["usuario", "cateogoria", "producto"];

if (in_array($modulo_buscador, $modulo)) {
    $modulos_url = [
        "usuario" => "user_search",
        "categoria" => "category_search",
        "producto" => "product_search"
    ];

    $modulos_url = $modulos_url[$modulo_buscador];

    $modulo_buscador = "busqueda_" . $modulo_buscador;

    //Iniciar la busqueda
    if (isset($_POST['txt_buscador'])) {
        $txt = limpiar_cadena($_POST['txt_buscador']);
        if ($txt == "") {
            echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                Introduce un termino de busqueda
            </div>
            ';
        } else {
            if (verificar_datos("[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{1,30}", $txt)) {
                echo '
                    <div class="notification is-danger is-light">
                        <strong>¡Ocurrio un error inesperado!</strong><br>
                        El termino de busqueda no coincide con el formato solicitado
                    </div>
                    ';
            } else {
                $_SESSION[$modulo_buscador]=$txt;
                header("Location: index.php?views=$modulos_url",true,303);
                exit();
            }
        }
    }

    //Eliminar la busqueda
    if (isset($_POST['eliminar_buscador'])) {
        unset($_SESSION[$modulo_buscador]);
    }
} else {
    echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                No podemos procesar la peticion
            </div>
            ';
}
