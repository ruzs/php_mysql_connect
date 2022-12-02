<h1>資料庫常用自訂函式</h1>
<h3>del()-刪除資料</h3>
<!-- <h3>insert()-增加資料</h3> -->
<!-- <h3>update()-更新指定條件的資料</h3> -->
<!-- <h3>find()-存取指定條件的單筆資料</h3> -->
<!-- <h3>all()-存取指定條件的多筆資料</h3> -->
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
// update('students',['name'=>'王大同']);
//update('students',['name'=>'王大同','dept'=>'4'],['id'=>19]);
//update students set name='王大同',dept='4' where id='19'

//$num=update('class_student',['class_code'=>102],['class_code'=>101]);
//echo "一供有".$num."筆資料更新成功";

// update('class_student',['class_code'=>101],18);

// insert('class_student',['school_num'=>'911799',
//                         'class_code'=>'101',
//                         'seat_num'=>50,
//                         'year'=>2000]);

//del('students',18);
//del('students',21);

echo del('students',['dept'=>4]);

function del($table,$id){
  global $pdo;
  $sql="delete from `$table` ";

  if(is_array($id)){
      foreach($id as $key => $value){
          $tmp[]="`$key`='$value'";
      }

      $sql = $sql . " where " . join(" && ",$tmp);

  }else{

      $sql=$sql . " where `id`='$id'";
  }

  echo $sql;
  return $pdo->exec($sql);
}

function insert($table,$cols){
  global $pdo;

  $keys= array_keys($cols);
  // dd(join("','",$keys));

  $sql="insert into $table (`" . join("`,`",$keys) . "`) values('" . join("','",$cols) ."')";

  echo $sql;
  return $pdo->exec($sql);
}

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
  if(isset($args[0])){
    if(is_array($args[0])){
        $tmp=[];
        foreach($args[0] as $key => $value){
            $tmp[]="`$key`='$value'";
        }

        $sql = $sql . " where " . join(" && ",$tmp);

    }else{

        $sql=$sql . " where `id`='{$args[0]}'";
    }
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

function dd($array){
  echo "<pre>";
  print_r($array);
  echo "</pre>";
}

?>