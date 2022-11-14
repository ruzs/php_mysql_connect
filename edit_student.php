<?php
$dsn="mysql:host=localhost;charset=utf8;dbname=school";
$pdo=new PDO($dsn,'root','');

$sql="UPDATE `students` SET `name`='丁于穎',`birthday`='1988-07-14' WHERE `id`='1'";

//$pdo->query($sql);
$res=$pdo->exec($sql);
echo "編輯成功:".$res;


?>