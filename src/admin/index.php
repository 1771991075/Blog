<?php
  $request_method = $_SERVER['REQUEST_METHOD'];
  $isWarning = false;

  session_start();

  if ($request_method == "POST") {
    // $account = $_POST["email"];
    $password = $_POST["password"];
    
    $settings = json_decode(file_get_contents("../../settings.json"));

    //账号和密码验证
    // if ($account == $settings->account && $password == $settings->password) {
    //     $_SESSION['account'] = $account;
    //     $_SESSION['password'] = $password;
    //     header("Location: /admin/overview.php");
    //     exit();
    // } 

    //密码验证
    if ($password == $settings->password) {
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
  <link href="../static/lib/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
  <script src="../static/lib/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

  <?php require "../compoments/header.php"; ?>

  <!-- 背景图 -->
  <div class="container-fulid">
    <div class="row m-0" style="height: 100vh; background-image: url(/static/images/loginbgimage.jpg);">
      
      <div class="col">

      </div>

      <div class="col-md-3" style="margin:auto;">
        
        <div class="row" style="min-width:280px; background-color: rgba(0, 0, 0, 0.4); border: none;padding-left: 15px; padding-right: 15px;">
          <div class="col text-center" style="margin-top: 15px; margin-bottom: 30px;">
            <img class="mx-auto" src="../static/images/avatar.png" style="height: 70px; width: 70px; border-radius:100%; ">
          </div>
          <!-- 表单 -->
          <form method="post">
            
            <div class="mb-3 mx-3 text-center">
              <label for="exampleInputPassword1" class="form-label mb-4" style="color:white;">lvzicong123@outlook.com</label>
              <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="password">
            </div>

            <!-- <div class="checkbox mb-3">
              <label class="mt-2">
                <input type="checkbox" value="remember-me"> Remember me
              </label>
            </div> -->
            <div class="mb-3 text-center">
              <button type="submit" class="btn btn-primary">Login</button>
            </div>
            
            <!-- 警告框 -->
            <?php if ($isWarning) { ?>

              <div class="alert alert-danger d-flex align-items-center mt-2 mx-3" style="height:38px;" role="alert">
                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
                  <use xlink:href="#exclamation-triangle-fill" />
                </svg>
                <div>
                  Password input error!!!
                </div>
              </div>
            <?php } ?>

          </form>
        </div>
        
      </div>

      <div class="col">

      </div>
    </div>
  </div>