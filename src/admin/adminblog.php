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
  <title>My Blog</title>
  <link href="../static/lib/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
  <script src="../static/lib/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../static/css/style-link1.css"/>
</head>

<body>

<?php 
  $currentPage = "adminblog";
  require "../compoments/adminheader.php"; 
?>

  <!-- 内容 -->
<div class="container pt-3" style="padding-left: 280px;">
  <div class="row">
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

    </div>

  </div>

</div>

</body>

</html>