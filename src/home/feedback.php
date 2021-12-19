<!DOCTYPE html>
<html lang="zh-cn">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Feedback</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../static/css/style-link1.css"/>
</head>

<body>
  <?php
  class feedback
  {
    var $email;
    var $opinion;
    var $time;
  }

  $request_method = $_SERVER['REQUEST_METHOD'];

  $redis = new Redis();
  $redis->connect('127.0.0.1', 6379);

  if ($request_method == "POST") {

    $feedback = new feedback;
    $feedback->email = $_POST["email"];
    $feedback->opinion = $_POST["opinion"];
    $feedback->time = date("Y/m/d H:i:s");

    if ($_POST["email"] == "" || $_POST["opinion"] == "") {
      echo "<script>
              alert('内容不完善。')
              </script>";
    }

    $redis->lpush("feedbacklist", json_encode($feedback));
  }

  $feedbacks = $redis->lrange('feedbacklist', 0, -1);

  ?>

  <?php require "../compoments/header.php"; ?>

  <!-- 内容 -->
  <div class="container" style="margin-bottom: 128px;">
    <div class="row mt-5">
      <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">
          <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-terminal-plus" viewBox="0 0 16 16">
            <path d="M2 3a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h5.5a.5.5 0 0 1 0 1H2a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h11a2 2 0 0 1 2 2v4a.5.5 0 0 1-1 0V4a1 1 0 0 0-1-1H2Z"/>
            <path d="M3.146 5.146a.5.5 0 0 1 .708 0L5.177 6.47a.75.75 0 0 1 0 1.06L3.854 8.854a.5.5 0 1 1-.708-.708L4.293 7 3.146 5.854a.5.5 0 0 1 0-.708ZM5.5 9a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1H6a.5.5 0 0 1-.5-.5ZM16 12.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Zm-3.5-2a.5.5 0 0 0-.5.5v1h-1a.5.5 0 0 0 0 1h1v1a.5.5 0 0 0 1 0v-1h1a.5.5 0 0 0 0-1h-1v-1a.5.5 0 0 0-.5-.5Z"/>
          </svg>
            Feedback
          </a>
        </div>
      </nav>
    </div>

    <div class="row mt-5">
      <div class="col">

      </div>

      <div class="col-md">
        <form method="post">
          <div class="row mt-1 mb-4">
            <input class="form-control" type="email" placeholder="E-mail" aria-label="E-mail example" name="email">
          </div>
          <div class="row">
            <div class="mb-3 p-0">
              <label for="exampleFormControlTextarea1" class="form-label"></label>
              <textarea type="text" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Opinions" aria-label="Opinions example" name="opinion"></textarea>
            </div>
          </div>
          <div class="row">
            <div class="d-grid gap-2 d-md-flex justify-content-md-end float-end">
              <button class="btn btn-primary" type="sumbit">Submit</button>
            </div>
          </div>
        </form>
      </div>

      <div class="col">

      </div>

    </div>
    <hr>
  </div>

  <?php require "../compoments/footer.php"; ?>

</body>

</html>