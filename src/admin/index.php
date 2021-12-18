<?php
  $request_method = $_SERVER['REQUEST_METHOD'];
  $isWarning = false;

  session_start();

  if ($request_method == "POST") {
    $account = $_POST["email"];
    $password = $_POST["password"];
    
    $settings = json_decode(file_get_contents("../../settings.json"));

    if ($account == $settings->account && $password == $settings->password) {
        $_SESSION['account'] = $account;
        $_SESSION['password'] = $password;
        header("Location: /admin/overview.php");
        exit();
    } 
    else {
        $isWarning = true;
    }
  }
?>

<!DOCTYPE html>
<html lang="zh-cn">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

  <?php require "../compoments/header.php"; ?>

  <!-- 背景图 -->
  <div class="container-fulid">
    <div class="row m-0" style="height: 100vh; background-image: url(/static/images/caihong.jpg);">
      <h1 class="mt-5"></h1>
      <div class="col">

      </div>
      <div class="col-md-3">
        <div class="row">

        </div>
        <div class="row" style="background-color: rgba(0, 0, 0, 0.4); border: none;padding-left: 15px; padding-right: 15px;">
          <div class="col text-center" style="margin-top: 15px; margin-bottom: 30px;">
            <img class="mx-auto" src="../static/images/avatar.png" style="height: 100px; width: 100px; border-radius:100%; ">
          </div>
          <!-- 表单 -->
          <form method="post">
            <div class="form-floating" style="margin-bottom: 10px;">
              <input name="email" type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
              <label for="floatingInput">
              <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
              </svg>&nbsp;Username</label>
            </div>
            <div class="form-floating">
              <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password">
              <label for="floatingPassword">
              <svg xmlns="http://www.w3.org/2000/svg" width="23" height="20" fill="currentColor" class="bi bi-lock" viewBox="0 0 16 16">
                <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2zM5 8h6a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1z"/>
              </svg>&nbsp;Password</label>
            </div>

            <div class="checkbox mb-3">
              <label class="mt-2">
                <input type="checkbox" value="remember-me"> Remember me
              </label>
            </div>
            <input class="w-100 btn btn-lg btn-primary mb-3" type="submit" />
            <!-- 警告框 -->
            <?php if ($isWarning) { ?>

              <div class="alert alert-danger d-flex align-items-center mt-2" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
                  <use xlink:href="#exclamation-triangle-fill" />
                </svg>
                <div>
                  Password input error!
                </div>
              </div>
            <?php } ?>

          </form>
        </div>
        <div class="row">

        </div>
      </div>
      <div class="col">

      </div>
    </div>
  </div>