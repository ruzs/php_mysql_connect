<?php 
include_once "../base.php";
$subject_id=find("survey_options",$_GET['id'])['subject_id'];
del("survey_options",$_GET['id']);
header("location:../admin_center.php?do=survey_edit&id=$subject_id");
?>