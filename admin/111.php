<!DOCTYPE html>
<html lang="zh-cn">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="//cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
</head>
<body>
  <!-- 内容 -->
  <div class="container mt-5">
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
    if ($_POST["title"] == "" || $_POST["family"] == "" ||  $_POST["summary"] == "" || $_POST["content"] == "") {
      echo "<script>
                alert('数据不完善。')
                </script>";
      return;
    }
    $redis->set($guid, json_encode($blog));
    $redis->sadd("bloglist", $guid);
    $redis->sadd("familylist", $blog->family);
    $redis->sadd("family-" . $blog->family, $guid);
    echo "<script>
                alert('提交成功!')
              </script>";
  }
  ?>
</body>

</html>