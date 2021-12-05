<?php
    require "../models/model.php";
    $redis = new Redis();
    $redis->connect('127.0.0.1', 6379);

    $id = $_GET['id'];
    $blog = json_decode($redis->get($id));

    $familyName = "family-".$blog->family;
    $redis->srem($familyName, $id);
    
    if ($redis->scard($familyName) == 0) {
        $redis->del($familyName);
        $redis->srem("familylist", $blog->family);
    }

    $redis->srem("bloglist",$id);
    $redis->del($id);

    header("location:/admin/adminlink.php");
?>