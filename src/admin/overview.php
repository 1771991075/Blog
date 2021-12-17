<?php require "../common/auth.php"; ?>

<!DOCTYPE html>
<html lang="zh-cn">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://unpkg.com/github-calendar@latest/dist/github-calendar-responsive.css"/>
  <link rel="stylesheet" type="text/css" href="../static/css/style-link1.css"/>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://unpkg.com/github-calendar@latest/dist/github-calendar.min.js"></script>
</head>

<body>

  <?php 
    $currentPage = "overview";
    require "../compoments/adminheader.php"; 
  ?>
  
  <div class="container" style="padding-left: 280px;">
    <div class="row">
      <h2 class="m-3">Welcome</h2>
    </div>

    <div class="row">
      <div class="calendar m-3">
        Loading the data just for you.
      </div>
    </div>

  </div>

  <script>
    GitHubCalendar(".calendar", "1771991075", { responsive: true });
  </script>
</body>

</html>