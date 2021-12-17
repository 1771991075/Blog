<?php 
    session_start();

    $settings = json_decode(file_get_contents("../../settings.json"));

    if ($_SESSION["account"] != $settings->account && $_SESSION["password"] != $settings->password) {
        header("Location: /admin");
    }
?>