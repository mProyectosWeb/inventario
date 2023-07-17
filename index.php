<?php require_once "./inc/session_start.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once "./inc/head.php"; ?>
</head>

<body>
    <?php
    
    if (!isset($_GET['views']) || $_GET['views'] == "") {
        $_GET['views'] = "login";
    }

    if (is_file("./views/". $_GET['views'].".php") && $_GET['views']!="login" && $_GET['views'] != "404") {
        
        
        if ((!isset($_SESSION['id']) || $_SESSION['id'] == "") || (!isset($_SESSION['usuario']) || $_SESSION['usuario'] == "")) {
            include_once "./views/logout.php";
            exit();
        }

        include_once "./inc/navbar.php";
        include_once "./views/" . $_GET['views'] . ".php";
        include_once "./inc/script.php";
    } else {
        if ($_GET['views'] == "login") {
            include_once "./views/login.php";
        } else {
            include_once "./views/404.php";
        }
    }
    ?>
    
</body>

</html>