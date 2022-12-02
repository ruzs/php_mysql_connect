<h1>資料庫常用自訂函式</h1>
<h3>all()-存取指定條件的多筆資料</h3>
<?php
include_once "base.php";

// $rows=all('students',['name'=>'宋時雨']);
// dd($rows);
// $rows=all('students',['id'=>'200']);
// dd($rows);
// $rows=all('students',['dept'=>1,'graduate_at'=>1]," ORDER BY `id` desc");
// dd($rows);

// $row=find('students','100');
// dd($row);
// $row=find('students',['name'=>'李玟玲']);
// dd($row);

// update('students',['name'=>'aaa']);
update('students',['name'=>'王大同']);



function update($table,$col,...$args){
  global $pdo;
  $sql="update $table set ";

  if (is_array($col)) {
    foreach ($col as $key => $value) {
      $tmp[]="`$key` = '$value'";
    }
    $sql=$sql . join(",",$tmp);
  }else{
    echo "錯誤,請提供以陣列形式更新資料";
  }

  echo $sql;
  return $pdo->exec($sql);
}

function find($table,$id){
  global $pdo;
  $sql="select * from `$table` ";
  
  if (is_array($id)) {
    foreach ($id as $key => $value) {
      $tmp[]="`$key` = '$value'";
    }
    $sql=$sql . " where " . join(" && ",$tmp);
  }else{
    $sql=$sql . " where `id`='$id'";
  }
  return $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
}

function dd($array){
  echo "<pre>";
  print_r($array);
  echo "</pre>";
}

function all($table,...$args){
  global $pdo;
  $sql="select * from $table";

  if (isset($args[0])) {
    if (is_array($args[0])) {
      //是陣列 [`acc`=>'mack' , `pw`=>'1234';]
      //是陣列 [`product`=>'PC' , `price`=>'10000']

      // $tmp='';
      foreach ($args[0] as $key => $value) {
        $tmp[]= "`$key`='$value'";
      }
      // $tmp=trim($tmp," && ");

      $sql = $sql ." WHERE " . join(" && ",$tmp);
    }else{
      $sql=$sql . $args[0];
    }
  }

  // echo $sql;
  return $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
}

?>