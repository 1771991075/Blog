<?php
    // if ($_COOKIE["user"] == "") {
    //     echo "qwer";
    // }
    // else{
    //     echo "welcome back";
    // }
    // setcookie("user", "1234", time()+20);
?>

<?php    
    session_start();
    // 存储 session 数据

    if ($_SESSION['pwd'] == "12345") {
        header("Location: /test3.php");
    }

    $account = $_POST["account"];
    $pwd = $_POST["password"];
    
    if($pwd == "12345") {
        $_SESSION['pwd'] = $pwd;
        header("Location: /test3.php");
        exit();
    }
?>

<form method="post">
    <input name="account" type="text" />
    <input name="password" type="password" />
    <input type="submit" value="提交" />
</form>

