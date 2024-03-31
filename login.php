<?php
include 'db-connect.php';
session_start();
if (isset($_POST["submit"])) { 
    $acc = $_POST["acc"];
    $pass = $_POST["pass"];
    if (!empty($acc) && !empty($pass)){
        $sql = "SELECT prio FROM user WHERE acc='" . $acc . "' and pass='" . $pass . "'";
        $r1 = mysqli_query($db, $sql);
        mysqli_close($db);
        if (mysqli_num_rows($r1) > 0){
            $row = mysqli_fetch_row($r1);
            $_SESSION["acc"] = $acc;
            $_SESSION["prio"] = $row[0];
            if ($_SESSION["prio"] == 0)  header("Location: admin.php"); // 超級管理員
            if ($_SESSION["prio"] == 1)  header("Location: manager.php"); // 管理員
            if ($_SESSION["prio"] == 2)  header("Location: user.php");  // 一般用戶
        }
    }
} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Login Form</title>
    <style>
        /* 自定义样式 */
        .form-signin label {
            font-size: 18px; 
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <h1 style="font-weight: bold;">登入</h1>
    <form method="post" action="" class="form-signin">
        <div class="form-group">
            <label for="acc" class="font-weight-bold text-uppercase">帳號</label>
            <input type="text" name="acc" class="form-control" placeholder="username" required>
        </div>
        <div class="form-group">
            <label for="pass" class="font-weight-bold text-uppercase">密碼</label>
            <input type="password" name="pass" class="form-control" placeholder="password" required>
        </div>
        <button type="submit" name="submit" class="btn btn-primary btn-block">登入</button>
    </form>
    
    <p class="mt-3">還沒有帳戶？<a href="register.php">註冊新帳戶</a></p>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>
