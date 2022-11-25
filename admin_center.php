<?php
session_start();
if(!isset($_SESSION['login'])){
    header("location:index.php");
    exit();
}
include "base.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>後台管理中心</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <?php
  // include "./layouts/header.php";
  ?>
  <h1 style="text-align:center">學生管理系統</h1>
  <nav>
    <a href="?do=add">新增學生</a>
    <a href="?do=logout">教師登出</a>
  </nav>
    <?php
      $do=$_GET['do']??'main';
      $file="./back/".$do.".php";

      if(file_exists($file)){
        include $file;
      }else{
        include "./back/main.php";
      }
    ?>
</body>
</html>