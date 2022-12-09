<?php
include_once "../base.php";
if (isset($_POST['option'])) {
  $option_id=$_POST['option'];
  $option= find('survey_options',$option_id);
  $subject= find('survey_subject',$option['subject_id']);

  // dd($_POST['subject_id']);
  // dd($_POST['option']);
  // dd($option);
  // dd($subject);
  $subject['vote']++;
  $option['vote']++;
  
  // dd($option);
  // dd($subject);
  update("survey_subject",$subject,$subject['id']);
  update("survey_options",$option,$option['id']);
  
  if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
    {
      $ip=$_SERVER['HTTP_CLIENT_IP'];
    }
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
    {
      $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else
    {
      $ip=$_SERVER['REMOTE_ADDR'];
    }
$log=[
    'user'=>(isset($_SESSION['login']))?$_SESSION['login']['id']:0,
    'ip'=>$ip,
    'subject_id'=>$subject['id'],
    'option_id'=>$option['id']
];
insert("survey_log",$log);

  to("../index.php?do=survey_result&id={$subject['id']}");
}else{
  $suv=$_POST['sur_id'];
  to("../index.php?do=survey_item&id={$suv}&error=choose");
}
?>