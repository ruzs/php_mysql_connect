<?php
include_once "../base.php";
if (isset($_POST['option'])) {
  $option_id=$_POST['option'];
  $option= find('survey_options',$option_id);
  $subject= find('survey_subject',$option['subject_id']);

  // dd($_POST['subject_id']);
  dd($_POST['option']);
  dd($option);
  dd($subject);
  $subject['vote']++;
  $option['vote']++;
  
  dd($option);
  dd($subject);
  update("survey_subject",$subject,$subject['id']);
  update("survey_options",$option,$option['id']);

  to("../index.php?do=survey_result&id={$subject['id']}");
}else{
  $suv=$_POST['sur_id'];
  to("../index.php?do=survey_item&id={$suv}&error=choose");
}
?>