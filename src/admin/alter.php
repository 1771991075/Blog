<?php
    require "../models/model.php";  
    require "../common/auth.php";

    $redis = new Redis();
    $redis->connect('127.0.0.1', 6379);

    $id = $_GET["id"];
    $blog = json_decode($redis->get($id));
?>

<!DOCTYPE html>
<html lang="zh-cn">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>AlterBlog</title>
  <link href="../static/lib/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
  <script src="../static/lib/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../static/lib/ckeditor4/ckeditor.js"></script>
  <link rel="stylesheet" type="text/css" href="../static/css/style-link1.css"/>
</head>

<body>

  <?php 
    $currentPage = "alter";
    require "../compoments/adminheader.php"; 
  ?>

  <!-- 内容 -->
  <div class="container" style="padding-left: 280px;">
    
    <div class="row mx-2">
      <h1 class="mb-3 pt-3">Alter Blog</h1>
      <hr>
      <form method="post" enctype="multipart/form-data">
        <div class="col-2">
          <div class="mb-2">
            <input name="id" type="hidden" value="<?php echo $id ?>" />
            <input name="time" type="hidden" value="<?php echo $blog->time ?>" />

            <label class="form-label">Title</label>
            <input name="title" type="text" value="<?php echo $blog->title ?>" class="form-control">
          </div>
          <div class="mb-2">
            <label class="form-label">Family</label>
            <input name="family" type="text" readonly value="<?php echo $blog->family ?>" class="form-control">
          </div>
          <div class="mb-2">
            <label class="form-label">Summary</label>
            <input name="summary" type="text"  value="<?php echo $blog->summary ?>" class="form-control">
          </div>
        </div>
        <div class="row-12">
          <label class="form-label">Content</label>
          <textarea name="content"><?php echo $blog->content ?></textarea>
          <script>
            CKEDITOR.replace('content');
          </script>
        </div>
        <div class="row-3 float-end mt-2">
          <div class="col">
            <input type="submit" class="btn btn-primary" />
          </div>
        </div>
      </form>
    </div>
  </div>

  <?php

  if ($_SERVER['REQUEST_METHOD'] == "POST") {

    // $redis = new Redis();
    // $redis->connect('127.0.0.1', 6379);

    // $guid = create_guid();

    $id = $_POST["id"];

    $blog = new blog;
    $blog->title = $_POST["title"];
    $blog->family = $_POST["family"];
    $blog->summary = $_POST["summary"];
    $blog->content = $_POST["content"];
    $blog->time = $_POST["time"];

    if ($_POST["id"] == "" || $_POST["title"] == "" || $_POST["family"] == "" ||  $_POST["summary"] == "" || $_POST["content"] == "") {
      echo "<script>alert('数据不完善。')</script>";
      return;
    }

    $redis->set($id, json_encode($blog));
    echo "<script>location.href = '/admin/adminlink.php';</script>";
  }

  ?>
</body>

</html>