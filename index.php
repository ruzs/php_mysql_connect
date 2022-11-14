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
  <h1>學生管理系統</h1>
  <?php
  // $dsn="mysql:host=localhost;charset=utf8;dbname=school";
  $db=mysqli_connect('localhost','root','','school');
  mysqli_set_charset($db,'utf8');

  // $pdo= new PDO($dsn,'root','');
  //固定語法 new PDO(  ,'帳號(預設為root)'.'密碼');

  $sql="SELECT * FROM `students` LIMIT 5";
  $result=mysqli_query($db,$sql);
  $rows= mysqli_fetch_all($result);

  // $rows=$pdo ->query($sql)->fetchAll(PDO::FETCH_NAMED);
  //query() 查詢 fetch調資料 All為全部   (FETCH_NAMED ASSOC)

  echo "<pre>";
  print_r($rows);
  echo "</pre>";
  ?>
</body>
</html>