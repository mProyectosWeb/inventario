<?php
    
    function conexion(){
        $pdo = new PDO('mysql:host=localhost;dbname=inventario','root','');
        return $pdo;
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
        $cadena=str_ireplace("<script>","",$cadena); /** remplazar un texto mediante una busqueda \ */
        $cadena=str_ireplace("</script>","",$cadena); /** remplazar un texto mediante una busqueda \ */
        $cadena=str_ireplace("<script src>","",$cadena); /** remplazar un texto mediante una busqueda \ */
        $cadena=str_ireplace("<script type=>","",$cadena); /** remplazar un texto mediante una busqueda \ */
        $cadena=str_ireplace("SELECT * FROM","",$cadena); /** remplazar un texto mediante una busqueda \ */
        $cadena=str_ireplace("DELETE FROM","",$cadena); /** remplazar un texto mediante una busqueda \ */
        $cadena=str_ireplace("INSERT INTO","",$cadena); /** remplazar un texto mediante una busqueda \ */
        $cadena=str_ireplace("DROP TABLE","",$cadena); /** remplazar un texto mediante una busqueda \ */
        $cadena=str_ireplace("DROP DATABASE","",$cadena); /** remplazar un texto mediante una busqueda \ */
        $cadena=str_ireplace("TRUNCATE TABLE","",$cadena); /** remplazar un texto mediante una busqueda \ */
        $cadena=str_ireplace("SHOW TABLE","",$cadena); /** remplazar un texto mediante una busqueda \ */
        $cadena=str_ireplace("SHOW DATABASES","",$cadena); /** remplazar un texto mediante una busqueda \ */
        $cadena=str_ireplace("<?php","",$cadena); /** remplazar un texto mediante una busqueda \ */
        $cadena=str_ireplace("?>","",$cadena); /** remplazar un texto mediante una busqueda \ */
        $cadena=str_ireplace("--","",$cadena); /** remplazar un texto mediante una busqueda \ */
        $cadena=str_ireplace("^","",$cadena); /** remplazar un texto mediante una busqueda \ */
        $cadena=str_ireplace("<","",$cadena); /** remplazar un texto mediante una busqueda \ */
        $cadena=str_ireplace("[","",$cadena); /** remplazar un texto mediante una busqueda \ */
        $cadena=str_ireplace("]","",$cadena); /** remplazar un texto mediante una busqueda \ */
        $cadena=str_ireplace("==","",$cadena); /** remplazar un texto mediante una busqueda \ */
        $cadena=str_ireplace(";","",$cadena); /** remplazar un texto mediante una busqueda \ */
        $cadena=str_ireplace("::","",$cadena); /** remplazar un texto mediante una busqueda \ */
        $cadena=trim($cadena);
        $cadena=stripslashes($cadena);
        return $cadena;
    }

    $texto = "<script>Hola mundo<script>";
    echo limpiar_cadena($texto);
?>