<?php
  include 'db-connect.php';
  date_default_timezone_set('Asia/Taipei');
  session_start();
  if (!isset($_SESSION['prio'])) header("Location: login.php");

  if (isset($_SESSION["acc"]) ) { 
    $acc = $_SESSION["acc"];
  }else{
    header("Location: login.php");
  }

  if (empty($_GET['article_id'])) {
    die('缺少文章編號');
  }

  echo '<div class="container mt-3">'; // 添加一个容器并调整上边距
  echo '<div class="article-list p1-0 mt-3">'; // 添加左边距和上边距
  
  $article_id = $_GET['article_id'];
  echo '<strong><span class="welcome-text">已經回覆的內容<br>';
  $sql = "SELECT * FROM article_reply WHERE article_id = '$article_id'";
  $result = mysqli_query($db, $sql);

  for ($i = 0; $i < mysqli_num_rows($result); $i++) {
    if ($i == 0) {
      // 使用 <strong> 标签加粗标题
      echo "<span class='text-danger' style='font-size: 16px'>帳號</span>   
      <span class='text-dark'style='font-size: 16px'>回復內容</span>  
      <span class='text-success'style='font-size: 16px'>建立時間</span></strong><br>";
    }
    $row = mysqli_fetch_row($result);
    // 使用 Bootstrap 的文本颜色类和自定义类
   echo '<span class="text-danger" style="font-size: 16px";>' . $row[1] . '</span>   
    <span class="text-dark" style="font-size: 16px";>' . $row[2] . '</span>   
    <span class="text-success" style="font-size: 16px";>' . $row[3] . '<br>   ';
  }

  if (isset($_POST['add_reply_btn'])) { //建立發文的回覆到資料表article_reply
    $content = $_POST['content'];
    $ctime = date("Y-m-d H:i:s");
    $sql = "INSERT INTO article_reply(article_id, acc, content, ctime) VALUES('$article_id','$acc','$content','$ctime')";
    $result = mysqli_query($db, $sql);
    header('Location: article.php');
  }
?>
<div class="container mt-5">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<form method="post" action=""> 
    <label class="text-dark text-uppercase" style="font-size:18px; font-weight: bold;">內容<br>
    <textarea name="content" placeholder="請輸入標題" rows="10" cols="80" class="form-control mb-3"></textarea><br>
    <button name="add_reply_btn" class="btn btn-primary font-weight-bold">回覆</button>
    <style>
    /* 自定义样式 */


    .welcome-text {
      font-size: 24px; /* 设置字体大小为24像素 */
    }
  </style>

</form>