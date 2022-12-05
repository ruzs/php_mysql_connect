<?php
if(isset($_GET['id'])){
    $subject=find('survey_subject',$_GET['id']);
    // dd($subject);
    $options=all('survey_options',['subject_id'=>$_GET['id']]);
    // dd($option);
}else{
    header("location:../admin_center.php?do=survey&error=沒有指定編輯的調查id");
}
?>
<h3 class="text-center">編輯調查</h3>

<form action="./api/survey_edit.php" class="col-10 mx-auto d-flex flex-wrap justify-content-end" method="post">
    <div class="form-group row col-12">
            <label class="col-2 text-right">主題</label>
            <input type="text" name="subject" value="<?=$subject['subject'];?>" class="form-control col-10">
            <input type="hidden" name="subject_id" value="<?=$subject['id']?>">
    </div> 
        <!--選項區-->
    <?php
    foreach($options as $idx => $option){
    ?>
        <div class="form-group row col-11">
            <label class="col-2 text-right">項目<?=$idx+1?></label>
            <input type="text" name='opt[]'value="<?=$option['opt']?>" class="form-control col-10">
            <input type="hidden" name="subject_id" value="<?=$subject['id']?>">
        </div>      
    <?php
    }
    ?>
        <div class="text-center col-12 mt-3">
        <input class="btn btn-primary mx-1" type="submit" value="修改">
        <input class="btn btn-warning mx-1" type="reset" value="重置">
    </div>
</form>