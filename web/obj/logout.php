<?php
    session_start();
    $_SESSION['login']=0;
    $_SESSION['username']="";
    $_SESSION['gmail']="";
    session_destroy();
?>
<h2>
    bạn đã đăng xuất 
</h2>
<a href="./html/index.php">chuyển tới trang chủ</a>