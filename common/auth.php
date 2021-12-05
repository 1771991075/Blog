<?php 
    session_start();

    if ($_SESSION["account"] != "1771991075@qq.com" && $_SESSION["password"] != "lzcblog") {
        header("Location: /admin");
    }
?>