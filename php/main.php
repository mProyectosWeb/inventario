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

    //$cadena="<script>Hola mundo</script>";
    //echo limpiar_cadena($cadena);

    #Funion para renombrar fotos
    function renombrar_fotos($nombre){
        $nombre=str_ireplace(" ","_",$nombre);
        $nombre=str_ireplace("/","_",$nombre);
        $nombre=str_ireplace("#","_",$nombre);
        $nombre=str_ireplace("_","_",$nombre);
        $nombre=str_ireplace("$","_",$nombre);
        $nombre=str_ireplace(".","_",$nombre);
        $nombre=str_ireplace(",","_",$nombre);
        $nombre=$nombre."_".rand(0,100);
        return $nombre;
    }

    //$foto="Play Station 5 black/edition";
    //echo renombrar_fotos($foto);


    #Funcion paginador de tablas
    function paginado_table($pagina,$Npaginas,$url,$botones){
        $tabla='<nav class="pagination is-centered is-rounded" role="navigation" aria-label="pagination">';

		if($pagina<=1){
			$tabla.='
			<a class="pagination-previous is-disabled" disabled >Anterior</a>
			    <ul class="pagination-list">
            ';
		}else{
			$tabla.='
			<a class="pagination-previous" href="'.$url.($pagina-1).'" >Anterior</a>
			    <ul class="pagination-list">
				    <li><a class="pagination-link" href="'.$url.'1">1</a></li>
				    <li><span class="pagination-ellipsis">&hellip;</span></li>
			';
		}

		$ci=0;
		for($i=$pagina; $i<=$Npaginas; $i++){
			if($ci>=$botones){
				break;
			}
			if($pagina==$i){
				$tabla.='<li><a class="pagination-link is-current" href="'.$url.$i.'">'.$i.'</a></li>';
			}else{
				$tabla.='<li><a class="pagination-link" href="'.$url.$i.'">'.$i.'</a></li>';
			}
			$ci++;
		}

		if($pagina==$Npaginas){
			$tabla.='
			</ul>
			<a class="pagination-next is-disabled" disabled >Siguiente</a>
			';
		}else{
			$tabla.='
				<li><span class="pagination-ellipsis">&hellip;</span></li>
				<li><a class="pagination-link" href="'.$url.$Npaginas.'">'.$Npaginas.'</a></li>
			</ul>
			<a class="pagination-next" href="'.$url.($pagina+1).'" >Siguiente</a>
			';
		}

		$tabla.='</nav>';
		return $tabla;
    }
?>