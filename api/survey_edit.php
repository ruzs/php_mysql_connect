<?php
include_once "../base.php";

dd($_POST['subject']);
dd($_POST['subject_id']);
/* $subject=find('survey_subject',$_POST['subject_id']);
dd($subject);
if($subject['subect']!=$_POST['subject']){
    //update('survey_subject',['subject'=>$_POST['subject']],$_POST['subject_id']);
    
} */
update('survey_subject',['subject'=>$_POST['subject']],$_POST['subject_id']);

dd($_POST['opt']);
dd($_POST['opt_id']);

foreach($_POST['opt_id'] as $idx => $id){
  $option=find('survey_options',$id);
  echo "<div> 原本的選項 $id 資料=>".$option['opt']."<br>";
  echo "表單送過來的編輯後的選項 $id 資料=>".$_POST['opt'][$idx]."</div>";
  update('survey_options',['opt'=>$_POST['opt'][$idx]],$id);
}


header("location:../admin_center.php?do=survey");
?>