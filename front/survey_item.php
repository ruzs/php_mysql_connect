<?php
// $surveys=all("survey_subject",['active'=>1]);

?>
<?php
if(isset($_GET['id'])){

    $survey=find("survey_subject",$_GET['id']);
    $options=all("survey_options",['subject_id'=>$_GET['id']]);
/*     dd($survey);
    dd($options); */
}else{
    $error="請回到問卷首頁選擇正確的題目來進行";
}


?>
<h3 class="text-center font-weight-bold"><?=$survey['subject'];?></h3>

<form action="./api/survey_vote.php" method="post">
<div class="col-8 mx-auto mt-4">
<?php
    if(isset($error)){
        echo "<span style='color:red'>".$error."</span>";
    }else{
        foreach($options as $option){
?>
<!--列表項目--> 
    <div class="input-group" style="margin-top:-1px">
        <div class="input-group-prepend">
            <div class="input-group-text">
                <input type="radio" name="option" value="<?=$option['id'];?>">
            </div>
        </div>
        <div class="form-control">
            <?=$option['opt'];?>
            <!-- Lorem ipsum dolor sit amet -->
        </div>
    </div>   
    <!-- <div class="input-group" style="margin-top:-1px">
        <div class="input-group-prepend">
            <div class="input-group-text">
                <input type="radio" name="option">
            </div>
        </div>
        <div class="form-control">
            Lorem ipsum dolor sit amet consectetur adipisicing elit.
        </div>
    </div>    -->
<?php
    }}
?>
</div>
<input type="hidden" name="sur_id" value="<?=$survey['id'];?>">
<?php
if(isset($_GET['error'])){
    echo "<div class='text-danger text-center'>";
    echo "請選擇一項";
    echo "</div>";
}
?>
<div class="text-center mt-4">
    <input type="submit" class="btn btn-primary mx-1" value="投票">
    <a href="index.php?do=survey" class="btn btn-warning mx-1">返回</a>
</div>
</form>