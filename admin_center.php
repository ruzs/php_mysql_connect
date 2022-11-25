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
  <title>學生管理系統</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <?php
  include "./layouts/header.php";
  ?>
  <h1 style="text-align:center">學生管理系統</h1>
  <nav>
    <a href="add.php">新增學生</a>
    <a href="logout.php">教師登出</a>
  </nav>
    <?php
      $do=$_GET['do']??'main';
      switch($do){
          case 'add':
              include "./back/add.php";
          break;
          case 'edit':
              include "./back/edit.php";
          break;
          case 'del':
              include "./back/confirm_del.php";
          break;
          default:
              include "./back/main.php";
          }
    ?>
</body>
</html>