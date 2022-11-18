<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>學生管理系統</title>
  <link rel="stylesheet" href="style.css">
  <?php
  $dsn="mysql:host=localhost;charset=utf8;dbname=school";
  // $db=mysqli_connect('localhost','root','','school');
  // mysqli_set_charset($db,'utf8');

  $pdo= new PDO($dsn,'root','');
  //固定語法 new PDO(  ,'帳號(預設為root)'.'密碼');

  $sql="SELECT * FROM `students` LIMIT 10";
  // $result=mysqli_query($db,$sql);
  // $rows= mysqli_fetch_all($result);

  $rows=$pdo ->query($sql)->fetchAll(PDO::FETCH_ASSOC);
  //query() 查詢 fetch調資料 All為全部   (FETCH_NAMED ASSOC)

  // echo "<pre>";
  // print_r($rows);
  // echo "</pre>";
  ?>
</head>
<body>
  <h1>學生管理系統</h1>
  <nav>
    <a href="add.php">新增學生</a>
    <a href="reg.php">教師註冊</a>
    <a href="login.php">教師登入</a>
  </nav>
  <?php
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
  ?>
  <table class='list-students'>
    <tr>
      <td>學號</td>
      <td>姓名</td>
      <td>生日</td>
      <td>畢業國中代碼</td>
      <td>年齡</td>
      <td>操作</td>
    </tr>
  <?php
  foreach ($rows as $row) {
    $age=round((strtotime('now')-strtotime($row['birthday']))/(60*60*24*365),1);
    echo "<tr>";
    echo "<td>{$row['school_num']}</td>";
    echo "<td>{$row['name']}</td>";
    echo "<td>{$row['birthday']}</td>";
    echo "<td>{$row['graduate_at']}</td>";
    echo "<td>{$age}</td>";
    echo "<td>";
    echo "<a href='edit.php'?id={$row['id']}>編輯</a>";
    echo "<a href='del.php'?id={$row['id']}>刪除</a>";
    echo "</td>";
    echo "</tr>";
  }
  ?>
  </table>
</body>
</html>