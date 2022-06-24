<?php require "../common/auth.php"; ?>

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
  $link = "/admin/adminlink.php?";
  $pageTag = "bloglist";

  global $pageCount;
  $pageCount = 3;

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

<?php 
  $currentPage = "adminlink";
  require "../compoments/adminheader.php"; 
?>

  <!-- 内容 -->
<div class="container pt-3" style="padding-left: 280px;">

  <div class="row">

    <h1 class="mb-3"><?php echo $keyWord; ?></h1>
    <hr>
    <!-- $blogs  -->
    <div class="col mx-2">

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
              <p class="card-button mb-0">
                <a href="/admin/adminblog.php?id=<?php echo $blogs[$i] ?>" class="btn btn-primary">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-book" viewBox="0 0 16 16">
                  <path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811V2.828zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"/>
                </svg>&nbsp;details</a>
                <a href="/admin/alter.php?id=<?php echo $blogs[$i] ?>" class="btn btn-warning">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-patch-minus" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M5.5 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1H6a.5.5 0 0 1-.5-.5z"/>
                  <path d="m10.273 2.513-.921-.944.715-.698.622.637.89-.011a2.89 2.89 0 0 1 2.924 2.924l-.01.89.636.622a2.89 2.89 0 0 1 0 4.134l-.637.622.011.89a2.89 2.89 0 0 1-2.924 2.924l-.89-.01-.622.636a2.89 2.89 0 0 1-4.134 0l-.622-.637-.89.011a2.89 2.89 0 0 1-2.924-2.924l.01-.89-.636-.622a2.89 2.89 0 0 1 0-4.134l.637-.622-.011-.89a2.89 2.89 0 0 1 2.924-2.924l.89.01.622-.636a2.89 2.89 0 0 1 4.134 0l-.715.698a1.89 1.89 0 0 0-2.704 0l-.92.944-1.32-.016a1.89 1.89 0 0 0-1.911 1.912l.016 1.318-.944.921a1.89 1.89 0 0 0 0 2.704l.944.92-.016 1.32a1.89 1.89 0 0 0 1.912 1.911l1.318-.016.921.944a1.89 1.89 0 0 0 2.704 0l.92-.944 1.32.016a1.89 1.89 0 0 0 1.911-1.912l-.016-1.318.944-.921a1.89 1.89 0 0 0 0-2.704l-.944-.92.016-1.32a1.89 1.89 0 0 0-1.912-1.911l-1.318.016z"/>
                </svg>&nbsp;alter</a>
                <a href="/common/delete.php?id=<?php echo $blogs[$i] ?>" class="btn btn-danger">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                  <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                </svg>&nbsp;delete</a>
              </p>
            </div>
          </div>
        </div>
      <?php } ?>

      <?php $nowPageIndex = correctPageIndex($pageIndex, $pageTag); ?>

        <div class="row-lg" style="float:right">
          <nav aria-label="Page navigation example">
            <ul class="pagination">
              <li class="page-item" <?php if($nowPageIndex < 2){echo "hidden='hidden'";}?>>
                <a class="page-link" href="<?php echo $link ?>page=<?php echo $nowPageIndex - 1 ?>" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
                </a>
              </li>
              <?php for ($i=1; $i <= getIndexCount($pageTag); $i++) { ?>
                <li class="page-item <?php if ($i == $nowPageIndex) { echo "active"; } ?>"><a class="page-link" href="<?php echo $link ?>page=<?php echo $i ?>"><?php echo $i ?></a></li>
              <?php } ?>
              <li class="page-item" <?php if($nowPageIndex >= getIndexCount($pageTag)){echo "hidden='hidden'";}?>>
                <a class="page-link" href="<?php echo $link ?>page=<?php echo $nowPageIndex + 1 ?>" aria-label="Next">
                  <span aria-hidden="true">&raquo;</span>
                </a>
              </li>
            </ul>
          </nav>
        </div>

    </div>

    <div class="col-3-lg" style="max-width: 18rem;">
      <?php require "../compoments/adminfamily.php" ?>
      <?php require "../compoments/adminarchiveDate.php" ?>
    </div>

  </div>
</div>

</body>

</html>