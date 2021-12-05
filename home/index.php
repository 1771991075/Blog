<!DOCTYPE html>
<html lang="zh-cn">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

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

<body>
  <?php

  require "../models/model.php";

  $redis = new Redis();
  $redis->connect('127.0.0.1', 6379);

  $familyName = $_GET["family"];
  if ($familyName != "") {
    $blogs = $redis->smembers("family-" . $familyName);
  } else {
    $blogs = $redis->smembers('bloglist');
  }
  ?>

  <?php require "../compoments/header.php"; ?>

  <!-- 背景图 -->
  <div class="container-fulid">
    <div class="row m-0" style="height: 100vh; background-image: linear-gradient(to right top, #3d3d3d, #424352, #414b68, #36547f, #0a5f96);">
      <h1 class="mt-5"></h1>
    </div>
  </div>

  <!-- 内容 -->
  <div class="container">

    <div class="row ">
      <nav class="navbar navbar-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Content</a>
        </div>
      </nav>
    </div>
    <div class="row">
      <div class="col">
        <div class="row">
          <?php $blog = json_decode($redis->get($blogs[0])); ?>
          <div class="card mb-3">
            <img src="" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title"><?php echo $blog->title ?></h5>
              <p class="card-text"><?php echo $blog->summary ?></p>
              <p class="card-text"><small class="text-muted"><?php echo $blog->time ?></small></p>
            </div>
          </div>
        </div>

        <div class="row">
          <?php $blog = json_decode($redis->get($blogs[1])); ?>
          <div class="card mb-3">
            <img src="" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title"><?php echo $blog->title ?></h5>
              <p class="card-text"><?php echo $blog->summary ?></p>
              <p class="card-text"><small class="text-muted"><?php echo $blog->time ?></small></p>
            </div>
          </div>
        </div>
      </div>

      <div class="col">
        <div class="row">
        <?php $blog = json_decode($redis->get($blogs[2])); ?>
          <div class="col-6 mb-1">
            <div class="card" style="width: 18rem;">
              <img src="https://v5.bootcss.com/docs/5.1/assets/img/bootstrap-icons.png" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title"><?php echo $blog->title ?></h5>
                <p class="card-text"><?php echo $blog->summary ?></p>
                <a href="/home/blog.php?id=<?php echo $blogs[2] ?>" class="btn btn-primary">Go somewhere</a>
              </div>
            </div>
          </div>

          <?php $blog = json_decode($redis->get($blogs[3])); ?>
          <div class="col-6 mb-1">
            <div class="card" style="width: 18rem;">
              <img src="https://v5.bootcss.com/docs/5.1/assets/img/bootstrap-icons.png" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title"><?php echo $blog->title ?></h5>
                <p class="card-text"><?php echo $blog->summary ?></p>
                <a href="/home/blog.php?id=<?php echo $blogs[3] ?>" class="btn btn-primary">Go somewhere</a>
              </div>
            </div>
          </div>

          <?php $blog = json_decode($redis->get($blogs[4])); ?>
          <div class="col-6 mb-1">
            <div class="card" style="width: 18rem;">
              <img src="https://v5.bootcss.com/docs/5.1/assets/img/bootstrap-icons.png" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title"><?php echo $blog->title ?></h5>
                <p class="card-text"><?php echo $blog->summary ?></p>
                <a href="/home/blog.php?id=<?php echo $blogs[4] ?>" class="btn btn-primary">Go somewhere</a>
              </div>
            </div>
          </div>

          <?php $blog = json_decode($redis->get($blogs[5])); ?>
          <div class="col-6 mb-1">
            <div class="card" style="width: 18rem;">
              <img src="https://v5.bootcss.com/docs/5.1/assets/img/bootstrap-icons.png" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title"><?php echo $blog->title ?></h5>
                <p class="card-text"><?php echo $blog->summary ?></p>
                <a href="/home/blog.php?id=<?php echo $blogs[5] ?>" class="btn btn-primary">Go somewhere</a>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>

  </div>

  <?php require "../compoments/footer.php"; ?>

</body>

</html>