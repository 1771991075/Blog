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
    require "../common/pagination.php";

    global $redis;
    $redis = new Redis();
    $redis->connect('127.0.0.1', 6379);

    $familyName = $_GET["family"];
    $archiveDate = $_GET["archiveDate"];
    $pageIndex = $_GET["page"];
    $search = $_GET['search'];
    $link = "/home/link.php?";
    $pageTag = "bloglist";

    global $pageCount;
    $pageCount = 2;

    if ($pageIndex == "") {
      $pageIndex = 1;
    }

    $keyWord = "All Blogs";
    
    if ($familyName != "") {
      $keyWord = $familyName;
      $pageTag = "family-" . $familyName;
      $startIndex = (correctPageIndex($pageIndex, $pageTag) - 1) * $pageCount;
      $blogs = $redis->lrange("family-" . $familyName, $startIndex, $startIndex + $pageCount - 1);
      $link = "/home/link.php?family=".$familyName."&";
    }
    else if($search != ""){
      $blogs = [];

      $keyWord = $search;
      $allBlogs = $redis->lrange('bloglist',0,-1);

      for ($i=0; $i < count($allBlogs); $i++) { 
        $currentBlog = json_decode($redis->get($allBlogs[$i]));

        if(stripos($currentBlog->title, $search) !== FALSE) {
          array_push($blogs, $allBlogs[$i]);
        }
      }

      $startIndex = (correctSearchIndex($pageIndex, count($blogs)) - 1) * $pageCount;
      $link = "/home/link.php?search=".$search."&";
      $isSearch = TRUE;
    }
    else if($archiveDate != "") {
      $keyWord = $archiveDate;
      $pageTag = "archive-" . $archiveDate;
      $startIndex = (correctPageIndex($pageIndex, $pageTag) - 1) * $pageCount;
      $blogs = $redis->lrange("archive-" . $archiveDate, $startIndex, $startIndex + $pageCount - 1);
      $link = "/home/link.php?archiveDate=".$archiveDate."&";
    }
    else {
      $startIndex = (correctPageIndex($pageIndex, "bloglist") - 1) * $pageCount;
      $blogs = $redis->lrange('bloglist', $startIndex, $startIndex + $pageCount - 1);
    }

    $familys = $redis->smembers("familylist");
?>

  <?php require "../compoments/header.php"; ?>

  <!-- 内容 -->
  <div class="container mt-5 pt-4">

    <div class="row">

      <div class="col-3-md" style="max-width: 19rem;">
        <?php require "../compoments/family.php" ?>
        <?php require "../compoments/archiveDate.php" ?>
      </div>

      <!-- $blogs  -->

      <div class="col-lg px-4">

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

        <?php 
          $nowPageIndex = correctPageIndex($pageIndex, $pageTag); 
          $pageLength = getIndexCount($pageTag);

          if($isSearch) {
            $nowPageIndex = correctSearchIndex($pageIndex, count($blogs));
            $pageLength = ceil(count($blogs) / $GLOBALS["pageCount"]);
          }
        ?>

        <div class="row-lg" style="float:right">
          <nav aria-label="Page navigation example">
            <ul class="pagination">
              <li class="page-item" <?php if($nowPageIndex < 2){echo "hidden='hidden'";}?>>
                <a class="page-link" href="<?php echo $link ?>page=<?php echo $nowPageIndex - 1 ?>" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
                </a>
              </li>
              <?php for ($i=1; $i <= $pageLength; $i++) { ?>
                <li class="page-item <?php if ($i == $nowPageIndex) { echo "active"; } ?>"><a class="page-link" href="<?php echo $link ?>page=<?php echo $i ?>"><?php echo $i ?></a></li>
              <?php } ?>
              <li class="page-item" <?php if($nowPageIndex >= $pageLength){echo "hidden='hidden'";}?>>
                <a class="page-link" href="<?php echo $link ?>page=<?php echo $nowPageIndex + 1 ?>" aria-label="Next">
                  <span aria-hidden="true">&raquo;</span>
                </a>
              </li>
            </ul>
          </nav>
        </div>

      </div>

    </div>

  </div>

  <?php require "../compoments/footer.php"; ?>

</body>

</html>