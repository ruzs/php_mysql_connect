<?php
include_once "../db/base.php";

$sql="UPDATE `news`
         SET `subject`='{$_POST['subject']}',
             `content`='{$_POST['content']}',
             `type`='{$_POST['type']}',
             `top`='{$_POST['top']}',
             `readed`='{$_POST['readed']}'
       WHERE `id`='{$_POST['id']}'";


$pdo->exec($sql);

header("location:../admin_center.php?do=news");

?>