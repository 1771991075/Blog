<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music</title>
    
    <link href="../static/lib/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="../static/lib/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../static/css/style-link1.css"/>
</head>
<body>
    
    <?php 
        require "../compoments/adminheader.php"; 
    ?>

    <div style="padding-left:280px; height: 100vh;">
        <iframe src="<?php echo $subPageHref; ?>" style="height: 100vh; width: 100%"></iframe>
    </div>

</body>
</html>