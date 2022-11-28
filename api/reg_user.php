<?php
include "../base.php";

$acc=trim($_POST['acc']);
$pw=trim($_POST['pw']);
$name=trim($_POST['name']);
$email=trim($_POST['email']);
$last_login=null;

$sql="insert into `users`(`acc`,`pw`,`name`,`email`,`last_login`)
values('$acc','$pw','$name','$email','$last_login')";
echo "acc=>".$acc;
echo "<br>";
echo "pw=>".$pw;
echo "<br>";
echo "name=>".$name;
echo "<br>";
echo "email=>".$email;
echo "<br>";
$pdo->exec($sql);
//註冊完成後，將使用者導向登入頁
header("location:../?do=login")

?>