<?php require "../common/auth.php"; ?>

<!DOCTYPE html>
<html lang="zh-cn">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Publish Blog</title>
  <link href="../static/lib/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
  <script src="../static/lib/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
  <link rel="stylesheet" type="text/css" href="../static/css/style-link1.css"/>
</head>

<body>

<?php 
  $currentPage = "addtext";
  require "../compoments/adminheader.php"; 
?>

  <!-- 内容 -->
  <div class="container" style="padding-left: 280px;">
    
    <div class="row">
      <h1 class="mb-3 pt-3">New Blog</h1>
      <hr>
      <form method="post" enctype="multipart/form-data">
        <div class="col-2">
          <div class="mb-2">
            <label class="form-label">Title</label>
            <input name="title" type="text" class="form-control" style="width:270px">
          </div>
          <div class="mb-2">
            <label class="form-label">Family</label>
            <input name="family" type="text" class="form-control" style="width:270px">
          </div>
          <div class="mb-2">
            <label class="form-label">Summary</label>
            <input name="summary" type="text" class="form-control" style="width:270px">
          </div>
        </div>
        <div class="row-12 mt-2">
          <label class="form-label">Content</label>
          <textarea name="content"></textarea>
          <script>
            CKEDITOR.replace('content');
          </script>
        </div>
        <div class="row-3 float-end mt-2">
          <div class="col">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </div>
      </form>
    </div>
  </div>

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