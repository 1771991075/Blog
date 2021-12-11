<!DOCTYPE html>
<html lang="zh-cn">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>index</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<link rel="stylesheet" href="./static/css/style-an.css" />
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
    $blogs = $redis->lrange("family-" . $familyName,0,-1);
  } else {
    $blogs = $redis->lrange('bloglist',0,-1);
  }
  ?>

  <?php require "../compoments/header.php"; ?>

  <!-- 背景图 -->
  <div class="container-fulid">
    <a class="an">
      <span>
        <svg onclick="window.scrollTo(0,775);" xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-arrow-bar-down" viewBox="0 0 16 16">
          <path fill-rule="evenodd" d="M1 3.5a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 0 1h-13a.5.5 0 0 1-.5-.5zM8 6a.5.5 0 0 1 .5.5v5.793l2.146-2.147a.5.5 0 0 1 .708.708l-3 3a.5.5 0 0 1-.708 0l-3-3a.5.5 0 0 1 .708-.708L7.5 12.293V6.5A.5.5 0 0 1 8 6z"/>
        </svg>
      </span>
    </a>

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