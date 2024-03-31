<?php
  include 'db-connect.php';
  session_start();
  if (!isset($_SESSION['prio'])) header("Location: login.php");
  if ($_SESSION['prio'] != 2) header("Location: login.php");
  if (isset($_SESSION["acc"]) ) { 
    $acc = $_SESSION["acc"];
  }else{
    header("Location: login.php");
  }
?>
<!DOCTYPE html>
<html lang="zh-TW">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <title>Login Form</title>
  <title>一般使用者</title>
  <style>
    /* 自定义样式 */
    .welcome-container {
      text-align: center; /* 设置文本水平居中 */
      margin-top: 20px; /* 设置上边距 */
    }

    .welcome-text {
      font-size: 36px; /* 设置字体大小为24像素 */
      font-weight: bold; /* 设置字体加粗 */
    }
    .form-signin label {
      font-size: 18px; /* 设置字体大小为18像素 */
    }
  </style>
</head>
<body>
  <div class="welcome-container">
    <?php
      echo '<span class="welcome-text">歡迎一般使用者<span class="text-primary">'.$acc.'</span>登入</span><br>';

      echo '<span class="font-weight-bold text-uppercase" style="font-size: 24px;">功能：<br>';
      echo '<a href="article.php" class="btn btn-primary" style="font-size: 16px;">發文與回覆</a><br>';
      echo '<a href="logout.php" class="btn btn-warning" style="font-size: 16px;">登出</a><br>';
    ?>
  </div>
</body>
</html>
