<?php
$dsn="mysql:host=localhost;charset=utf8;dbname=school";
$pdo=new PDO($dsn,'root','');

//echo $_GET['id'];
$student=$pdo->query("SELECT * FROM `students` where `id`='{$_GET['id']}'")
             ->fetch(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>刪除確認</title>
    <style>
        body{
            display: flex;
            height:95vh;
            align-items: center;
            justify-content: center;
        }
        .dialog{
            width: 280px;
            height: 200px;
            border: 1px solid red;
            box-shadow: 1px 1px 10px #f2b4b4;
        }
        .msg{
            font-size: 24px;
        }
        .msg span{
            font-weight: bolder;
        }
    </style>
</head>
<body>
    <div class="dialog">
        <h1>刪除確認</h1>    
        <div class="msg">
            你確定要刪除<span><?=$student['name'];?></span>嗎?
        </div>
        <div>
            <button onclick="location.href='./api/del_student.php?id=<?=$_GET['id'];?>'">確定刪除</button>
            <button onclick="location.href='index.php'">取消</button>
        </div>
    </div>
</body>
</html>