<?php
$dsn="mysql:host=localhost;charset=utf8;dbname=school";
$pdo= new PDO($dsn,'root','');

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
header("location:../login.php")

?>