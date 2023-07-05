<?php require_once "./inc/session_start.php"?>

<?php 

    if(!isset($_GET['views']) || $_GET['views']==""){
        $_GET['views']="login";
    }
    
    if(is_file("./views/".$_GET['views'].".php") && $_GET['views'] != "login" && $_GET['views'] != "login"){
        include_once "./inc/navbar.php";
        include_once "./views/".$_GET['views'].".php";
        include_once "./inc/footer.php";     
    }else{
        if($_GET['views']=="login"){
            include_once "./views/login.php";
        }else{
            include_once "./views/404.php";
        }
    }
?>