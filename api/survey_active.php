<?php
include_once "../base.php";

$subject=find("survey_subject",$_GET['id']);
$subject['active']=($subject['active']+1)%2;
update("survey_subject",$subject,$_GET['id']);

header("location:../admin_center.php?do=survey");

?>