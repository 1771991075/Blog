<!DOCTYPE html>
<html lang="zh-cn">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bloglist</title>
  <link href="../static/lib/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
  <script src="../static/lib/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../static/css/style-link1.css"/>
</head>

<body>

<?php

    require "../models/model.php";

    $redis = new Redis();
    $redis->connect('127.0.0.1', 6379);

    $familyName = $_GET["family"];
    $archiveDate = $_GET["archiveDate"];

    $keyWord = "All Blogs";
    
    if ($familyName != "") {
      $keyWord = $familyName;
      $blogs = $redis->lrange("family-" . $familyName,0,-1);
    }
    else if($archiveDate != "") {
      $keyWord = $archiveDate;
      $blogs = $redis->lrange("archive-" . $archiveDate,0,-1);
    }
    else {
      $blogs = $redis->lrange('bloglist',0,-1);
    }

    $familys = $redis->smembers("familylist");
?>

  <?php require "../compoments/header.php"; ?>

  <!-- 内容 -->
  <div class="container mt-5 pt-4">

  <div class="row">

    <div class="col-3-md" style="max-width: 18rem;">
      <?php require "../compoments/family.php" ?>
      <?php require "../compoments/archiveDate.php" ?>
    </div>

    <!-- $blogs  -->

    <div class="col-lg">

      <h1 class="mb-3"><?php echo $keyWord; ?></h1>
      <hr>

      <?php for ($i = 0; $i < count($blogs); $i++) { ?>
        <?php $blog = json_decode($redis->get($blogs[$i])); ?>

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
              <a href="/home/blog.php?id=<?php echo $blogs[$i] ?>" class="btn btn-primary">Read more</a>
            </div>
          </div>
        </div>

      <?php } ?>


    </div>

  </div>

  </div>

  <?php require "../compoments/footer.php"; ?>

</body>

</html>