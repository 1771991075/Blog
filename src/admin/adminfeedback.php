<?php require "../common/auth.php";

    $redis = new Redis();
    $redis->connect('127.0.0.1', 6379);

    class feedback
  {
    var $email;
    var $opinion;
    var $time;
  }
  $feedbacks = $redis->lrange('feedbacklist', 0, -1);

?>

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
    $currentPage = "adminfeedback";
    require "../compoments/adminheader.php"; 
  ?>
  
  <div class="container" style="padding-left: 280px;">
    <div class="row pt-3">
        <h2>Feedback</h2>
    </div>
    <hr>
    <div class="row">
        <div class="textbox" style="border: 1px;color: black; border-radius: 100px; margin-bottom: 10px;">
            <div class="row">
                <?php for ($i = 0; $i < count($feedbacks); $i++) { ?>
                <?php $feedback = json_decode($feedbacks[$i]); ?>
                <div class="card p-0 mb-2">
                    <h5 class="card-header">
                    <div class="col" style="float: left;">
                        <?php echo $feedback->email ?>
                    </div>
                    <div class="col" style="float: right;">
                        <?php echo $feedback->time ?>
                    </div>
                    </h5>
                    <div class="card-body">
                    <p class="card-text">
                        <?php echo $feedback->opinion ?>
                    </p>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>

  </div>

</body>

</html>