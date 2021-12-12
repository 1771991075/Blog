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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="//cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
  <link rel="stylesheet" type="text/css" href="../static/css/style-link1.css"/>
</head>

<body>

  <?php require "../compoments/adminheader.php"; ?>

  <!-- 内容 -->
  <div class="container mt-5 ">
    <div class="row">
      <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-journal-medical" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v.634l.549-.317a.5.5 0 1 1 .5.866L9 6l.549.317a.5.5 0 1 1-.5.866L8.5 6.866V7.5a.5.5 0 0 1-1 0v-.634l-.549.317a.5.5 0 1 1-.5-.866L7 6l-.549-.317a.5.5 0 0 1 .5-.866l.549.317V4.5A.5.5 0 0 1 8 4zM5 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/>
            <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z"/>
            <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z"/>
          </svg>
            Alter
          </a>
        </div>
      </nav>
    </div>
    <div class="row">
      <form method="post" enctype="multipart/form-data">
        <div class="col-2">
          <div class="mb-2">
            <input name="id" type="hidden" value="<?php echo $id ?>" />
            <input name="time" type="hidden" value="<?php echo $blog->time ?>" />

            <label class="form-label">title</label>
            <input name="title" type="text" value="<?php echo $blog->title ?>" class="form-control">
          </div>
          <div class="mb-2">
            <label class="form-label">family</label>
            <input name="family" type="text" readonly value="<?php echo $blog->family ?>" class="form-control">
          </div>
          <div class="mb-2">
            <label class="form-label">summary</label>
            <input name="summary" type="text"  value="<?php echo $blog->summary ?>" class="form-control">
          </div>
        </div>
        <div class="row-12">
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