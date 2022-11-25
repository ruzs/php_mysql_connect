<?php
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
  <!-- <pre>
  <?php //print_r($rows);?> ;
</pre> -->
  <h1 style="text-align:center">學生管理系統</h1>
  <nav>
    <a href="reg.php">教師註冊</a>
    <a href="login.php">教師登入</a>
  </nav>
    <?php
      include "./layouts/class_nav.php"
    ?>  
    <?php
      include "./front/main.php";
    ?>
    <?php
/*
      if(isset($_GET['status'])){
    switch($_GET['status']){
        case 'add_success':
            echo "<span style='color:green'>新增學生成功</span>";
        break;
        case 'add_fail';
            echo "<span style='color:red'>新增學生有誤</span>";
        break;
        case 'edit_error':
            echo "<span style='color:red'>無法編輯，請洽管理員，或正確操作</span>";
        break;
    }
}
*/
    ?>
  </table>
</body>
</html>