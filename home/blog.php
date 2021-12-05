<?php
require "../models/model.php";

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
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://unpkg.com/valine@1.4.16/dist/Valine.min.js"></script>
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

  <?php require "../compoments/header.php"; ?>

  <!-- 内容 -->
  <div class="container mt-5 pt-3">

    <?php require "../compoments/family.php" ?>

    <!-- $blogs  -->

    <div class="col">
      <div class="row mb-2">
        <div class="card p-0">
          <h5 class="card-header">
            <?php echo $blog->title ?>
          </h5>
          <div class="card-body">
            <p class="card-title">
              <?php echo $blog->time ?> | <?php echo $blog->family ?>
            </p>
            <p class="card-text">
              <?php echo $blog->summary ?>
            </p>
            <hr>
            <p class="card-text">
              <?php echo $blog->content ?>
            </p>
          </div>
        </div>
      </div>

      <div id="vcomments" class="mt-3"></div>
      <script>
          new Valine({
              el: '#vcomments',
              appId: 'sc2cstLjwuGgaSQg13jSL8uw-gzGzoHsz',
              appKey: 'Ic3ysGI0sGTkSrxsNVr3NdVg'
          })
      </script>
    </div>

  </div>

  </div>

  <?php require "../compoments/footer.php"; ?>

</body>

</html>