<?php
include_once "../base.php";

// $subject=$_POST['subjct'];
// $type=1;
// $vote=0;
// $active=0;
$subject=['subject'=>$_POST['subject'],
          'type'=>1,
          'vote'=>0,
          'active'=>0];

//使用insert 函式，寫入資料
insert('survey_subject',$subject);

$subject_id=find('survey_subject',['subject'=>$_POST['subject']])['id'];
if(isset($_POST['opt'])){
  foreach($_POST['opt'] as $option){
    if($option!=''){
        $tmp=['opt'=>$option,
              'subject_id'=>$subject_id,
              'vote'=>0];
              dd($tmp);
              insert('survey_options',$tmp);
      }
  }
}
//insert('survey_options');
header("location:../admin_center.php?do=survey")
?>