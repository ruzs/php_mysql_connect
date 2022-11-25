<?php
session_start();
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
  <title>學生管理系統</title>
  <link rel="stylesheet" href="style.css">
  <?php
  $dsn="mysql:host=localhost;charset=utf8;dbname=school";
  // $db=mysqli_connect('localhost','root','','school');
  // mysqli_set_charset($db,'utf8');

  $pdo= new PDO($dsn,'root','');
  //固定語法 new PDO(  ,'帳號(預設為root)'.'密碼');

  if(isset($_GET['code'])){
    $sql="SELECT `students`.`id`,
                `students`.`school_num` as '學號',
                `students`.`name` as '姓名',
                `students`.`birthday` as '生日',
                `students`.`graduate_at` as '畢業國中'
          FROM `class_student`,`students` 
          WHERE `class_student`.`school_num`=`students`.`school_num` && 
                `class_student`.`class_code`='{$_GET['code']}'";
    $sql_total="SELECT count(`students`.`id`)
    FROM `class_student`,`students` 
    WHERE `class_student`.`school_num`=`students`.`school_num` && 
          `class_student`.`class_code`='{$_GET['code']}'";
}else{
    //建立撈取學生資料的語法，限制只撈取前20筆
    $sql="SELECT `students`.`id`,
                `students`.`school_num` as '學號',
                `students`.`name` as '姓名',
                `students`.`birthday` as '生日',
                `students`.`graduate_at` as '畢業國中'
            FROM `students`";
    $sql_total="SELECT count(`students`.`id`)
            FROM `students`";
}
    /**
 * 分頁參數處理中心
 */

    $div=10;
    $total=$pdo->query($sql_total)->fetchColumn();
    echo "總筆數為:".$total;
    $pages=ceil($total/$div);
    echo "總頁數為:".$pages;
     //$now=(isset($_GET['page']))?$_GET['page']:1;
    $now=$_GET['page']??1;
    echo "當前頁為:". $now;
    $start=($now-1)*$div;

    $sql=$sql. " LIMIT $start,$div";
  // $sql="SELECT * FROM `students` LIMIT 20";
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
<?php 
if(isset($_GET['del'])){
    echo "<div class='del-msg'>";
    echo $_GET['del'];
    echo "</div>";
}
?>
  <!-- <pre>
  <?php //print_r($rows);?> ;
</pre> -->
  <h1 style="text-align:center">學生管理系統</h1>
  <nav>
    <a href="add.php">新增學生</a>
    <a href="logout.php">教師登出</a>
  </nav>
  <nav>
    <ul class="class-list">
      <?php
          //從`classes`資料表中撈出所有的班級資料並在網頁上製作成下拉選單的項目
          $sql="SELECT `id`,`code`,`name` FROM `classes`";
          $classes=$pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
          foreach($classes as $class){
              echo "<li><a href='?code={$class['code']}'>{$class['name']}</a></li>";
          }
      ?>  
    </ul>
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
  <div class="pages">
  <?php
    //上一頁
    //當前頁碼-1,可是不能小於0,最小是1,如果是0,不顯示
    if(($now-1)>=1){
      $prev=$now-1;
      if(isset($_GET['code'])){
        echo "<a href='?page=$prev&code={$_GET['code']}'class='FE'> ";
        echo "&lt; ";
        echo " </a>";

      }else{

        echo "<a href='?page=$prev' class='FE'> ";
        echo "&lt; ";
        echo " </a>";
      }
    }else{
        echo "<a class='noshow'>&nbsp;</a>";
    }
    ?>
    <div>
    <?php
        //顯示第一頁
        if ($pages>5) {

          if($now>=4){
              if(isset($_GET['code'])){
                  echo "<a href='?page=1&code={$_GET['code']}'> ";
                  echo "1 ";
                  echo " </a>...";
              }else{
                  echo "<a href='?page=1'> ";
                  echo "1 ";
                  echo " </a>...";
              }
          }
        }
    ?>
    <?php 
    //頁碼區
    //只顯示前後四個頁碼

    if($now>=3 && $now<=($pages-2)){  //判斷頁碼在>=3 及小於最後兩頁的狀況
      $startPage=$now-2;
  }else if($now-2<3){ //判斷頁碼在1,2頁的狀況
      $startPage=1;
  }else{  //判斷頁碼在最後兩頁的狀況
      $startPage=$pages-4;
  }
  if ($pages>4) {
    for($i=$startPage;$i<=($startPage+4);$i++){
        $nowPage=($i==$now)?'now':'';
        if(isset($_GET['code'])){
            echo "<a href='?page=$i&code={$_GET['code']}' class='$nowPage'> ";
            echo $i;
            echo " </a>";
        }else{
            echo "<a href='?page=$i' class='$nowPage'> ";
            echo $i;
            echo " </a>";
        }
    }
  } else {
    for($i=1;$i<=$pages;$i++){
      $nowPage=($i==$now)?'now':'';
        if(isset($_GET['code'])){
            echo "<a href='?page=$i&code={$_GET['code']}'class='$nowPage'> ";
            echo $i;
            echo " </a>";

        }else{

            echo "<a href='?page=$i'class='$nowPage'> ";
            echo $i;
            echo " </a>";
        }
    }
  }
  


//全部頁碼顯示
/*     for($i=1;$i<=$pages;$i++){
      $nowPage=($i==$now)?'now':'';
        if(isset($_GET['code'])){
            echo "<a href='?page=$i&code={$_GET['code']}'class='$nowPage'> ";
            echo $i;
            echo " </a>";

        }else{

            echo "<a href='?page=$i'class='$nowPage'> ";
            echo $i;
            echo " </a>";
        }
    }*/
    ?>
    <?php
    ////顯示最後一頁
    if ($pages>5) {
      if($now<=($pages-3)){
          if(isset($_GET['code'])){
              echo "...<a href='?page=$pages&code={$_GET['code']}'> ";
              echo "$pages";
              echo " </a>";
          }else{
              echo "...<a href='?page=$pages'> ";
              echo "$pages";
              echo " </a>";
          }
      }
    }
    ?>
    </div>
    <?php
    //下一頁
    //當前頁碼+1,可是不能超過總頁數,最大是總頁數,如果超過總頁數,不顯示
    if(($now+1)<=$pages){
      $next=$now+1;
      if(isset($_GET['code'])){
        echo "<a href='?page=$next&code={$_GET['code']}' class='FE'> ";
        //echo "< ";
        echo "&gt; ";
        echo " </a>";
      }else{
        echo "<a href='?page=$next' class='FE'> ";
        //echo " >";
        echo "&gt; ";
        echo " </a>";
      }
    }else{
      echo "<a class='noshow'>&nbsp;</a>";
    }

    ?>
    </div>
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
    $age=round((strtotime('now')-strtotime($row['生日']))/(60*60*24*365),1);
    echo "<tr>";
    echo "<td>{$row['學號']}</td>";
    echo "<td>{$row['姓名']}</td>";
    echo "<td>{$row['生日']}</td>";
    echo "<td>{$row['畢業國中']}</td>";
    echo "<td>{$age}</td>";
    echo "<td>";
    echo "<a href='edit.php?id={$row['id']}'>編輯</a>";
    //echo "<a href='./api/del_student.php?id={$row['id']}'>刪除</a>";
    echo "<a href='./confirm_del.php?id={$row['id']}'>刪除</a>";
    //echo "<a href='del.php?id={$row['id']}'>刪除</a>";
    echo "</td>";
    echo "</tr>";
  }
  ?>
  </table>
</body>
</html>