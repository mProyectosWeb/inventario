<?php 
    session_destroy();
    #$_SESSION['logged_in'] = false;
    if(headers_sent()){
        echo "<script>window.location.href='index.php?views=login';</script>";
    }else{
        header("Location: index.php?views=login");
    }