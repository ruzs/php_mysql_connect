<h1 class="text-center">新聞管理</h1>
<a class="btn btn-primary" href="admin_center.php?do=add_news">新增消息</a>

<hr>
<ul class="list-group">
<li class='list-group-item list-group-item-action d-flex text-center bg-info text-white'>
        <div class='col-md-6'>標題</div>
        <div class='col-md-1'>置頂</div>
        <div class='col-md-1'>點閱數</div>
        <div class='col-md-2'>發佈時間</div>
        <div class='col-md-2'>操作</div>
    </li>
<?php
$all_news="SELECT * FROM `news` ";
$rows=$pdo->query($all_news)->fetchAll();

foreach($rows as $row){
    echo "<div class='col-md-6'>";
    echo $row['subject'];
    echo "</div>";
    echo "<div class='col-md-1'>";
    echo ($row['top']==1)?"TOP":"";
    echo "</div>";
    echo "<div class='col-md-1'>";
    echo $row['readed'];
    echo "</div>";
    echo "<div class='col-md-2'>";
    echo $row['created_at'];
    echo "</div>";

    echo "<div class='col-md-2 text-center'>";
    echo "<a class='btn btn-info mx-2' href='admin_center.php?do=news_edit&id={$row['id']}'>編輯</a>";
    echo "<a class='btn btn-danger mx-2' href='admin_center.php?do=news_del&id={$row['id']}'>刪除</a>";
    echo "</div>";
    echo "</li>";
}

?>

</ul>