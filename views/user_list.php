<div class="container is-fluid mb-6">
    <h1 class="title">Usuarios</h1>
    <h2 class="subtitle">Lista de usuarios</h2>
</div>

<div class="container pb-6 pt-6">

    <?php
        require_once "./php/main.php";
        if(!isset($_GET['page'])){
            $pagina=1;
        }else{
            $pagina=(int) $_GET['page'];
            if($pagina<=1){
                $pagina=1;
            }
        }
        
        $pagina=limpiar_cadena($pagina);
        $url="index.php?views=user_list&page=";
        $registro=15;
        $busqueda="";

        require_once "./php/user_list.php";
    ?>

</div>