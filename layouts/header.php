<header>
    <nav>
        <!-- <pre style="text-align:left!important"> -->
        <?php //print_r($_SERVER);?>
        <!-- </pre> -->
        <?php
        $local=str_replace(['/','school','.php'],'',$_SERVER['PHP_SELF']) ;
        switch($local){
                case "index":
                    echo "<a href='index.php'>學生管理頁面</a>";
                    echo "<a href='?do=reg'>教師註冊</a>";
                    echo "<a href='?do=login'>教師登入</a>";
                break;
                case "admin_center":
                    echo "<a href='admin_center.php'>後台管理頁面</a>";
                    echo "<a href='admin_center.php?do=add'>新增學生</a>";
                    //<!-- <a href="?do=add">新增學生</a> -->
                    echo "<a href='logout.php'>教師登出</a>";
                break;
            }
        ?>
    </nav>
</header>