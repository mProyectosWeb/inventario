<?php
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
    
    #Conexion a la base de datos
    function conexion(){
        return $pdo = new PDO('mysql:host=localhost;dbname=inventaro','mie','2605');
        #return $pdo;
    }

    /**Prueba de que esta agregando datos en BD */
    //$pdo->query("INSERT INTO categoria(categoria_nombre,categoria_ubicación) VALUES('prueba','prueba ubicacion')");

    #Verificar los datos
    function verificar_datos($filtro,$cadena){
        if(preg_match("/^".$filtro."$/",$cadena)){
            return false;
        }else{
            return true;
        }
    }

    /*Prueba verificar datos
    $nombre="Carlos7";

    if(verificar_datos("[a-zA-Z]{6,10}",$nombre)){
        echo "Los datos no coinciden";
    }else{
        echo "Los datos coinciden";
    }
    */

    #Sirve para limpiar cadena de texto
    function limpiar_cadena($cadena){
        $cadena=trim($cadena); /** Quitamos los espacios en blanco */
        $cadena=stripslashes($cadena); /** quita las barras agregadas \ */
        $cadena=str_ireplace($cadena); /** remplazar un texto mediante una busqueda \ */

    }