<?php
    session_start();
    $_SESSION["account"] = "";
    $_SESSION["password"] = "";
    header("Location: /admin");
?>