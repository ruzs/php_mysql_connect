<?php
include_once "../db/base.php";

$sql="INSERT INTO `news`(`subject`,`content`,`type`) 
           VALUES('{$_POST['subject']}',
                  '{$_POST['content']}',
                  '{$_POST['type']}')";

$pdo->exec($sql);


header("location:../admin_center.php?do=news");