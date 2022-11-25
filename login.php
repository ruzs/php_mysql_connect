<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>教師登入</title>
  <style>
    *{
      text-align: center;
    }
  </style>
</head>
<body>
<?php
    include "./layouts/header.php";
?>
  <h1>教師登入</h1>
  <div>
<?php
session_start();
if(isset($_GET['error'])){
    echo "帳號或密碼錯誤，";
    echo "登入嘗試".$_SESSION['login_try']."次";
}
?>
</div>

<form action="./api/chk_user.php" method="post">
    <div>帳號:<input type="text" name="acc" id=""></div>
    <div>密碼:<input type="password" name="pw" id=""></div>
    <div><input type="submit" value="登入" id=""></div>
</form>
</body>
</html>