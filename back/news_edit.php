<?php

$news=$pdo->query("SELECT * FROM `news` WHERE `id`='{$_GET['id']}'")->fetch();

?>

<h2 class="text-center">編輯消息</h2>
<form action="./api/edit_news.php" method="POST">
   <div class="form-group row">
        <label class="col-form-label col-md-2 text-right">主題</label>
        <input  type="text" 
               class="form-control col-md-10" 
                name="subject" 
               value='<?=$news['subject'];?>'>
   </div>
   <div class="d-flex">
    <div class="col-md-6 row">
        <span class="col-md-4 text-right mr-2">置頂</span>
        <div class="form-check mx-2 d-flex align-items-center">
            <input class="form-check-input" type="radio" name="top" <?=($news['top']==1)?'checked':'';?>>
            <label class="col-form-label">Yes</label>
        </div>
        <div class="form-check mx-2 d-flex align-items-center">
            <input class="form-check-input" type="radio" name="top" <?=($news['top']==0)?'checked':'';?>>
            <label class="col-form-label">No</label>
        </div>
    </div>
    <div class="col-md-6 form-group row">
        <label class="col-form-label col-md-4 text-right">觀看數</label>
        <input class="form-control col-md-8" type="number" name="readed" value="<?=$news['readed'];?>">

    </div>
   </div>
   <div class="form-group row">
        <label class="col-form-label col-md-2 text-right">內容</label>
        <textarea class="form-control col-md-10" 
                  name="content" 
                  style="height:200px"><?=$news['content'];?></textarea>
   </div> 
   <div class="form-group row">
        <label class="col-form-label col-md-2 text-right">類別</label>
        <input type="text" 
              class="form-control col-md-10" 
               name="type" 
               value="<?=$news['type'];?>">
   </div>
   <div class="text-right text-secondary">現在時間:<?=date("Y-m-d H:i:s");?></div>
   <div class="text-center">
        <input type="hidden" name="id" value="<?=$news['id'];?>">
        <input class="btn btn-primary mx-2" type="submit" value="確定修改">
        <input class="btn btn-warning mx-2" type="reset" value="重置">
   </div> 
</form>