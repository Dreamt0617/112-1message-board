<?php
  include 'db-connect.php';
  date_default_timezone_set('Asia/Taipei');
  session_start();
  if (!isset($_SESSION['prio'])) header("Location: login.php");

  if (isset($_SESSION["acc"])) { 
    $acc = $_SESSION["acc"];
  } else {
    header("Location: login.php");
  }

  $sql = "SELECT * FROM article";
  $result = mysqli_query($db, $sql);
  echo '<div class="container mt-3">'; // 添加一个容器并调整上边距
  echo '<div class="article-list p1-0 mt-3">'; // 添加左边距和上边距
  for ($i = 0; $i < mysqli_num_rows($result); $i++) {
    if ($i == 0) {
      // 使用 <strong> 标签加粗标题
      echo "<strong><span class='text-danger'>帳號</span>   <span class='text-warning title-box'>標題</span>  <span class='text-dark'>內容</span>  <span class='text-success'>建立時間</span></strong><br>";
    }
    $row = mysqli_fetch_row($result);
    // 使用 Bootstrap 的文本颜色类和自定义类
    echo '<span class="text-danger">' . $row[1] . '</span>   
    <span class="text-warning title-box">' . $row[2] . '</span>   
    <span class="text-dark">' . $row[3] . '</span>   
    <span class="text-success">' . $row[4] . '</span>   ';
    echo '<a href="article-reply.php?article_id=' . $row[0] . '" class="btn btn-primary btn-sm font-weight-bold reply-link">回覆</a><br>';
  }
  echo '</div>'; // 关闭文章列表容器
  echo '</div>'; // 关闭外层容器

  if (isset($_POST['add_article_btn'])) { //建立文章主題到資料表article
    $acc = $_SESSION['acc'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $ctime = date("Y-m-d H:i:s");
    $sql = "INSERT INTO article(acc, title, content, ctime) VALUES('$acc','$title','$content','$ctime')";
    $result = mysqli_query($db, $sql);
    header('Location: article.php');
  }
?>
  <div class="container mt-5">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <form method="post" action="">
        <label for="acc" class="font-weight-bold text-uppercase">標題</label>
        <div class="title-box-container">
            <input type="text" placeholder="請輸入標題" name="title" class="form-control title-input mb-3"><br>
        </div>
        <label for="acc" class="font-weight-bold text-uppercase">內容</label>
        <textarea name="content" placeholder="請輸入標題" rows="10" cols="80" class="form-control mb-3"></textarea><br>
        <button name="add_article_btn" class="btn btn-primary font-weight-bold">新增</button>
    </form>
</div>
