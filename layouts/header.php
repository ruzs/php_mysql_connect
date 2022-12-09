<header class="shadow mb-5">
    <nav class="container d-flex justify-content-between py-3">
        <!-- <pre style="text-align:left!important"> -->
        <?php //print_r($_SERVER);?>
        <!-- </pre> -->
        <?php
        $file_str=explode("/",$_SERVER['PHP_SELF']);
        $local=str_replace('.php','',array_pop($file_str)) ;
        // $local=str_replace(['/','school','.php'],'',$_SERVER['PHP_SELF']) ;
        switch($local){
                case "index":
                    echo "<div>";
                    echo "<a class='mx-2' href='index.php'>學生管理頁面</a>";
                    echo "</div>";
                    echo "<div>";
                    echo "<a class='mx-2' href='?do=main'>最新消息</a>";
                    echo "<a class='mx-2' href='?do=students_list'>學生列表</a>";
                    echo "<a class='mx-2' href='index.php?do=survey'>意見調查</a>";
                    echo "</div>";
                    echo "<div>";
                    if(isset($_SESSION['login'])){
                        echo "<a class='mx-2' href='admin_center.php'>回管理中心</a>";
                        echo "<a class='mx-2' href='logout.php'>教師登出</a>";
                    }else{
                        echo "<a class='mx-2' href='?do=reg'>教師註冊</a>";
                        echo "<a class='mx-2' href='?do=login'>教師登入</a>";
                    }
                    echo "</div>";
                break;
                case "admin_center":
                    echo "<div>";
                    echo "<a class='mx-2' href='admin_center.php'>回管理首頁</a>";
                    echo "<a class='mx-2' href='index.php'>回網站首頁</a>";
                    echo "</div>";
                    echo "<div>";
                    echo "<a class='mx-2' href='admin_center.php?do=students_list'>學生管理</a>";
                    echo "<a class='mx-2' href='admin_center.php?do=news'>新聞管理</a>";
                    echo "<a class='mx-2' href='admin_center.php?do=survey'>問卷管理</a>";
                    echo "</div>";
                    echo "<div>";
                    //<!-- <a href="?do=add">新增學生</a> -->
                    echo "<a class='mx-2' href='logout.php'>教師登出</a>";
                    echo "</div>";
                break;
            }
        ?>
    </nav>
</header>