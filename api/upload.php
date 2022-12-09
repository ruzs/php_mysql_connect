<?php
if(isset($_FILES['img']['tmp_name'])){
  echo "檔案上傳成功";
  echo $_FILES['img']['tmp_name'];
  echo "<br>";
  echo $_FILES['img']['name'];
  echo "<br>";
  echo $_FILES['img']['type'];
  echo "<br>";
  echo $_FILES['img']['size'];
  echo "<br>";
  echo "檔案會搬到"."../upload/".$_FILES['img']['name'];
  move_uploaded_file($_FILES['img']['tmp_name'],"../upload/".$_FILES['img']['name']);
}else{
  echo "檔案上傳失敗";
  echo $_FILES['img']['error'];
}
?>