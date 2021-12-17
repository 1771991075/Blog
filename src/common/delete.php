<?php
    require "../models/model.php";
    $redis = new Redis();
    $redis->connect('127.0.0.1', 6379);

    $id = $_GET['id'];
    $blog = json_decode($redis->get($id));

    // 回收类别
    $familyName = "family-".$blog->family;
    $redis->lrem($familyName, $id);
    
    if ($redis->llen($familyName) == 0) {
        $redis->del($familyName);
        $redis->srem("familylist", $blog->family);
    }

    // 回收归档
    $archiveName = "archive-" . gmdate("Y-m", strtotime($blog->time));
    $redis->lrem($archiveName,$id);
    
    if ($redis->llen($archiveName) == 0) {
        $redis->del($archiveName);
        $redis->srem("archivelist",gmdate("Y-m", strtotime($blog->time)));
    }

    $redis->lrem("bloglist",$id);
    $redis->del($id);

    header("location:/admin/adminlink.php");
?>