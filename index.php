<?php
$isBackend=(isset($_GET['do']) && $_GET['do']=='back')?true:false;
if($isBackend){
    session_start();
    if(!isset($_SESSION['login'])){
        header("location:index.php");
        exit();
    }   
}

include "base.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?=($isBackend)?"後台管理系統":"學生管理系統";?></title>
  <link rel="stylesheet" href="style.css">

</head>
<body>
  <?php
  include "./layouts/header.php";
  ?>
  <h1 style="text-align:center">學生管理系統</h1>
  <nav>
  <?php
    if($isBackend){
      echo "<a href='add.php'>新增學生</a>";
      echo "<a href='logout.php'>教師登出</a>";
    }else{
      echo "<a href='reg.php'>教師註冊</a>";
      echo "<a href='login.php'>教師登入</a>";
    }
?>
  </nav>
    <?php
      include "./layouts/class_nav.php"
    ?>  
    <?php
      if($isBackend){
        include "./back/main.php";
      }else{
        include "./front/main.php";
      }
    ?>
  </table>
</body>
</html>