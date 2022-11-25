  <h1>教師登入</h1>
  <div>
<?php
session_start();
if(isset($_GET['error'])){
    echo "帳號或密碼錯誤，";
    echo "登入嘗試".$_SESSION['login_try']."次";
}
?>
</div>
<form action="./api/chk_user.php" method="post">
    <div>帳號:<input type="text" name="acc" id=""></div>
    <div>密碼:<input type="password" name="pw" id=""></div>
    <div><input type="submit" value="登入" id=""></div>
</form>