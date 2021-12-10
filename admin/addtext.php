<?php require "../common/auth.php"; ?>

<!DOCTYPE html>
<html lang="zh-cn">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Publish Blog</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="//cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>

  <style>
    .link_1:hover {
      color: rgb(6, 156, 206);
    }

    .link_1:hover {
      text-decoration-line: underline;
    }

    .link_1 {
      text-decoration-line: none;
      color: rgb(0, 0, 0);
    }
  </style>
</head>

<body>

  <?php require "../compoments/adminheader.php"; ?>

  <!-- 内容 -->
  <div class="container mt-5 ">
    <div class="row">
      <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">
          <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
            <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
          </svg>
            AddText
          </a>
        </div>
      </nav>
    </div>
    <div class="row">
      <form method="post" enctype="multipart/form-data">
        <div class="col-2">
          <div class="mb-2">
            <label class="form-label">title</label>
            <input name="title" type="text" class="form-control">
          </div>
          <div class="mb-2">
            <label class="form-label">family</label>
            <input name="family" type="text" class="form-control">
          </div>
          <div class="mb-2">
            <label class="form-label">summary</label>
            <input name="summary" type="text" class="form-control">
          </div>
        </div>
        <div class="row-12">
          <textarea name="content"></textarea>
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

  <?php require "../compoments/adminfooter.php"; ?>

  <?php
  require "../models/model.php";

  function create_guid()
  {
    $charid = strtoupper(md5(uniqid(mt_rand(), true)));
    $hyphen = chr(45);
    $uuid = substr($charid, 6, 2) . substr($charid, 4, 2) .
      substr($charid, 2, 2) . substr($charid, 0, 2) . $hyphen
      . substr($charid, 10, 2) . substr($charid, 8, 2) . $hyphen
      . substr($charid, 14, 2) . substr($charid, 12, 2) . $hyphen
      . substr($charid, 16, 4) . $hyphen . substr($charid, 20, 12);
    return $uuid;
  }

  $request_method = $_SERVER['REQUEST_METHOD'];

  if ($request_method == "POST") {

    $redis = new Redis();
    $redis->connect('127.0.0.1', 6379);

    $guid = create_guid();

    $blog = new blog;
    $blog->title = $_POST["title"];
    $blog->family = $_POST["family"];
    $blog->summary = $_POST["summary"];
    $blog->content = $_POST["content"];
    $blog->time = date("Y/m/d H:i:s");

    $archiveDate = date("Y-m");

    if ($_POST["title"] == "" || $_POST["family"] == "" ||  $_POST["summary"] == "" || $_POST["content"] == "") {
      echo "<script>
                alert('数据不完善。')
                </script>";
      return;
    }

    $redis->set($guid, json_encode($blog));
    $redis->lpush("bloglist",$guid);

    $redis->sadd("familylist", $blog->family);
    $redis->lpush("family-" . $blog->family,$guid);

    $redis->sadd("archivelist",$archiveDate);
    $redis->lpush("archive-" . $archiveDate,$guid);

    echo "<script>
                alert('提交成功!')
              </script>";
  }

  ?>
</body>

</html>