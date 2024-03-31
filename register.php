<?php
include 'db-connect.php';

if (isset($_POST["submit"])) {
    $acc = $_POST["acc"];
    $pass = $_POST["pass"];

        $sql = "INSERT INTO user (acc, pass, prio) VALUES ('$acc', '$pass', 2)";
        $result = mysqli_query($db, $sql);

        if ($result) {
            header("Location: login.php"); // 重定向到登录页面
            exit(); // 确保立即结束脚本以避免不必要的输出
        } else {
            echo "一般用戶註冊失敗，請重新嘗試";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Register Form</title>
    <style>
        /* 自定义样式 */
        .form-signin label {
            font-size: 18px; /* 设置字体大小为18像素 */
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <h1 style="font-weight: bold;">帳號注册</h1>
    <form method="post" action="" class="form-signin">
        <div class="form-group">
            <label for="acc" class="font-weight-bold text-uppercase">帳號</label>
            <input type="text" name="acc" class="form-control" placeholder="username" required>
        </div>
        <div class="form-group">
            <label for="pass" class="font-weight-bold text-uppercase">密碼</label>
            <input type="password" name="pass" class="form-control" placeholder="password" required>
        </div>
        <button type="submit" name="submit" class="btn btn-primary btn-block">註冊</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0C
