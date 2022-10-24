<?php
    if(isset($_GET['url']) & !empty($_GET['url']))
    {
        $url = $_GET['url'];
        unlink($url);  // xóa theo đường dẫn
        ?>
            <div>
                <h2>xóa thành công </h2>
                <a href="./Demoupload.php"></a>
            </div>
        <?php
    }
?>