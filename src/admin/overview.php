<?php require "../common/auth.php"; ?>

<!DOCTYPE html>
<html lang="zh-cn">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin</title>
  <link href="../static/lib/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
  <script src="../static/lib/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="../static/lib/github-calendar/dist/github-calendar-responsive.css"/>
  <link rel="stylesheet" type="text/css" href="../static/css/style-link1.css"/>
  <script src="../static/lib/github-calendar/dist/github-calendar.min.js"></script>
</head>

<body>

  <?php 
    $currentPage = "overview";
    require "../compoments/adminheader.php"; 
  ?>
  
  <div class="container">
    <div class="row">
      <h1 class="m-3 ps-0">Welcome !</h1>
      <hr>
    </div>

    <div class="row mx-2" style="width:100%">
      <div class="calendar">
        Loading the data just for you.
      </div>
    </div>

  </div>

  <script>
    GitHubCalendar(".calendar", "1771991075", { responsive: true });
  </script>
</body>
</html>