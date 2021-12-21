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
  <title>My Blog</title>
  <link href="../static/lib/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
  <script src="../static/lib/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../static/lib/valine/dist/Valine.min.js"></script>

  <link rel="stylesheet" type="text/css" href="../static/css/style-link1.css"/>
  <link rel="stylesheet" type="text/css" href="../static/css/image.css"/>
</head>

<body>

  <?php require "../compoments/header.php"; ?>

  <!-- 内容 -->
<div class="container mt-5 pt-4">
  <div class="row">
    <div class="col-lg-3" style="max-width:19rem;">
      <?php require "../compoments/family.php" ?>
      <?php require "../compoments/archiveDate.php" ?>
    </div>
    <!-- $blogs  -->

    <div class="col" style="flex-wrap: wrap;">
      <div class="row mb-2 px-2">
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
              appKey: 'Ic3ysGI0sGTkSrxsNVr3NdVg',
              path: "<?php echo $id; ?>"
          });
      </script>
      <script src="../static/js/display.js"></script>
    </div>

  </div>

</div>

<?php require "../compoments/footer.php"; ?>

</body>

</html>