<!DOCTYPE html>
<html lang="zh-cn">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>index</title>
  <link href="../static/lib/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
  <script src="../static/lib/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="../static/lib/animate.css/animate.min.css"/>
  <link rel="stylesheet" type="text/css" href="../static/css/style-link1.css"/>
</head>

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
        <svg onclick="$('html,body').animate({scrollTop: $('#content').offset().top }, 500);" xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="white" class="bi bi-chevron-compact-down animate__animated animate__bounce animate__slow animate__infinite" viewBox="0 0 16 16">
          <path fill-rule="evenodd" d="M1.553 6.776a.5.5 0 0 1 .67-.223L8 9.44l5.776-2.888a.5.5 0 1 1 .448.894l-6 3a.5.5 0 0 1-.448 0l-6-3a.5.5 0 0 1-.223-.67z"/>
        </svg>
      </span>
    </a>

    <div id="background" class="row m-0" style="height: 100vh;">
      <?php require "../compoments/background.php"; ?>
    </div>
  </div>

  <!-- 内容 -->
  <div id="content" class="container pt-5">

    <div class="row px-3 mt-3 pt-3">
      <div class="col-lg">
        <div class="row">
          <?php $blog = json_decode($redis->get($blogs[0])); ?>
          <div class="card mb-3 shadow p-3 bg-body rounded">
            <div class="card-body">
              <h5 class="card-title"><?php echo $blog->title ?></h5>
              <p class="card-text"><?php echo $blog->summary ?></p>
              <p class="card-text"><small class="text-muted"><?php echo $blog->time ?></small></p>
            </div>
          </div>
        </div>

        <div class="row">
          <?php $blog = json_decode($redis->get($blogs[1])); ?>
          <div class="card mb-3 shadow p-3 bg-body rounded">
            <div class="card-body">
              <h5 class="card-title"><?php echo $blog->title ?></h5>
              <p class="card-text"><?php echo $blog->summary ?></p>
              <p class="card-text"><small class="text-muted"><?php echo $blog->time ?></small></p>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg">
        <div class="row">
        <?php $blog = json_decode($redis->get($blogs[2])); ?>
          <div class="col-md-6 mb-3">
            <div class="card">
              <img src="../static/images/BootStrap.png" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title"><?php echo $blog->title ?></h5>
                <p class="card-text"><?php echo $blog->summary ?></p>
                <a href="/home/blog.php?id=<?php echo $blogs[2] ?>" class="btn btn-primary">Read more</a>
              </div>
            </div>
          </div>

          <?php $blog = json_decode($redis->get($blogs[3])); ?>
          <div class="col-md-6 mb-3">
            <div class="card">
              <img src="../static/images/login.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title"><?php echo $blog->title ?></h5>
                <p class="card-text"><?php echo $blog->summary ?></p>
                <a href="/home/blog.php?id=<?php echo $blogs[3] ?>" class="btn btn-primary">Read more</a>
              </div>
            </div>
          </div>

          <?php $blog = json_decode($redis->get($blogs[4])); ?>
          <div class="col-md-6 mb-3">
            <div class="card">
              <img src="../static/images/CKEditor4.png" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title"><?php echo $blog->title ?></h5>
                <p class="card-text"><?php echo $blog->summary ?></p>
                <a href="/home/blog.php?id=<?php echo $blogs[4] ?>" class="btn btn-primary">Read more</a>
              </div>
            </div>
          </div>

          <?php $blog = json_decode($redis->get($blogs[5])); ?>
          <div class="col-md-6 mb-3">
            <div class="card">
              <img src="../static/images/Animate.png" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title"><?php echo $blog->title ?></h5>
                <p class="card-text"><?php echo $blog->summary ?></p>
                <a href="/home/blog.php?id=<?php echo $blogs[5] ?>" class="btn btn-primary">Read more</a>
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