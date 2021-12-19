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
    
    <div class="row">
        <h1 class="mb-3 pt-3">Feedback</h1>
        <hr>
        <div class="textbox" style="border: 1px;color: black; border-radius: 100px; margin-bottom: 10px;">
                <?php for ($i = 0; $i < count($feedbacks); $i++) { ?>
                <?php $feedback = json_decode($redis->get($feedbacks[$i])); ?>
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
                    <p class="card-button mb-0">
                        <a href="/common/deletefeedback.php?id=<?php echo $feedbacks[$i] ?>" class="btn btn-danger">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                        </svg>&nbsp;delete</a>
                    </p>
                    </div>
                </div>
                <?php } ?>
        </div>
    </div>

  </div>

</body>

</html>