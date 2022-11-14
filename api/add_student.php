<?php
$dsn="mysql:host=localhost;charset=utf8;dbname=school";
$pdo= new PDO($dsn,'root','');

$sql="INSERT INTO `students` 
(`id`, `school_num`, `name`, 
`birthday`, `uni_id`, `addr`, 
`parents`, `tel`, `dept`, 
`graduate_at`, `status_code`) VALUES 
(NULL, '915084', '陳彥明',
'1984-06-12', 'f133322335', '新北市泰山區龍華里貴子街100-1號3樓',
'陳國雄', '02-12345678', 3, 
5, '001')";

// $pdo->query($sql);
$res=$pdo->exec($sql);
echo "新增成功:".$res;
?>