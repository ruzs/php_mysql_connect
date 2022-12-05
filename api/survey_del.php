<?php
include_once "../base.php";

//調查主題的id
$id=$_GET['id'];

//關聯的選項的id
//$options=all("survey_options",['subject_id'=>$id]);

del("survey_subject",$id);

del("survey_options",['subject_id'=>$id]);

/* foreach($options as $opt){
    del("survey_options",$opt['id']);
} */

header("location:../admin_center.php?do=survey");


?>