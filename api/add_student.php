<?php
include "base.php";

$school_num=$_POST['school_num'];
$name=$_POST['name'];
$birthday=$_POST['birthday'];
$uni_id=$_POST['uni_id'];
$addr=$_POST['addr'];
$parents=$_POST['parents'];
$tel=$_POST['tel'];
$dept=$_POST['dept'];
$graduate_at=$_POST['graduate_at'];
$status_code=$_POST['status_code'];

$class_code=$_POST['class_code'];
$year=2000;

$max_num=$pdo->query("SELECT max(`seat_num`) from `class_student` WHERE `class_code`='$class_code'")->fetchColumn();
$seat_num=$max_num+1;
//$seat_num=$pdo->query("SELECT max(`seat_num`) from `class_student` WHERE `class_code`='$class_code'")->fetchColumn()+1;

$sql="INSERT INTO `students` 
(`id`, `school_num`, `name`, 
`birthday`, `uni_id`, `addr`, 
`parents`, `tel`, `dept`, 
`graduate_at`, `status_code`) VALUES 
(NULL, '$school_num', '$name', 
 '$birthday', '$uni_id', '$addr', 
 '$parents', '$tel', $dept, 
 $graduate_at, '$status_code')";

$sql_class="INSERT INTO `class_student`(`school_num`,`class_code`,`seat_num`,`year`) values('$school_num','$class_code','$seat_num','$year')";
echo $sql;
echo $sql_class;
//$pdo->query($sql);
$res1=$pdo->exec($sql);
$res2=$pdo->exec($sql_class);
//echo "新增成功:".$res1;
if($res1 && $res2){
  $status='add_success';
}else{
  $status='add_fail';
}
header("location:../admin_center.php?status=$status");
?>