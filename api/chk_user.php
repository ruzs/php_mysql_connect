<?php
include "../base.php";

session_start();

$acc=$_POST['acc'];
$pw=$_POST['pw'];

$sql="select count(`id`) from `users` where `acc`='$acc' && `pw`='$pw' ";
$chk=$pdo->query($sql)->fetchColumn();

if($chk==1){
    $sql="select `id`,`acc`,`name`,`last_login` from `users` where `acc`='$acc' && `pw`='$pw' ";
    $user=$pdo->query($sql)->fetch(PDO::FETCH_ASSOC);

    $_SESSION['login']=$user;
    header("location:../admin_center.php");
}else{
    if(isset($_SESSION['login_try'])){
        $_SESSION['login_try']++;
    }else{
        $_SESSION['login_try']=1;
    }

    //如果帳號或密碼有錯，則將使用者導向登入頁，並帶上錯誤值
    header("location:../index.php?do=login&error=login");}
?>