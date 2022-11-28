<h1 class="text-center">最新消息</h1>
<ul class="list-group">
<li class='list-group-item list-group-item-action d-flex text-center bg-info text-white'>
    <div class='col-md-10'>標題</div>
    <div class='col-md-2'>人氣</div>
</li>    
<?php
$all_news="SELECT * FROM `news` ";
$rows=$pdo->query($all_news)->fetchAll();

foreach($rows as $row){
    echo "<li class='list-group-item list-group-item-action d-flex'>";
    echo "<div class='col-md-10'>";
    echo "<a href='index.php?do=news_detail&id={$row['id']}'>";
    echo $row['subject'];
    echo "</a>";
    echo "</div>";
    echo "<div class='col-md-2 text-center'>";
    echo $row['readed'];
    echo "</div>";
    echo "</li>";
}

?>

</ul>