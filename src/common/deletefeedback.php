<?php
    class feedback
    {
        var $email;
        var $opinion;
        var $time;
    }

    $redis = new Redis();
    $redis->connect('127.0.0.1', 6379);

    $id = $_GET['id'];
    $feedback = json_decode($redis->get($id));
    
    if ($redis->llen($feedbacklist) == 0) {
        $redis->del($feedbacklist);
    }
    
    $redis->lrem("feedbacklist",$id);
    $redis->del($id);

    header("location:/admin/adminfeedback.php");
?>