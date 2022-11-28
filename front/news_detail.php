<?php
$sql="SELECT * FROM `news` WHERE `id`='{$_GET['id']}'";
$news=$pdo->query($sql)->fetch();

?>
<h3 class="text-left font-weight-bolder"><?=$news['subject'];?></h3>
<div class="text-right text-secondary">
    發佈時間：<?=$news['created_at'];?>
</div>
<div class="text-left">[<?=$news['type'];?>]</div>
<div style='font-size:1.2rem'><?=nl2br($news['content']);?></div>