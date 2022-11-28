<?php
include "base.php";
if(!isset($_SESSION['login'])){
    header("location:index.php");
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>後台管理系統</title>
  <?php include "./layouts/link_css.php";?>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <?php
  include "./layouts/header.php";
  ?>
  <main class="container">
    <?php
      $do=$_GET['do']??'main';
      $file="./back/".$do.".php";

      if(file_exists($file)){
        include $file;
      }else{
        include "./back/main.php";
      }
    ?>
    </main>
    <?php include "./layouts/scripts.php";?>
</body>
</html>