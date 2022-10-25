<?php
    require_once ("../../../../../classes/dbConnection.php");
    $dbConnection = new dbConnection();
    $conn = $dbConnection->getConnection();
    if(isset($_GET['xoa']) && !$_GET['xoa']=="")
    {
        $id= $_GET['xoa'];
        try {
            $time=time();
            // $result = mysqli_query($conn,"DELETE FROM `sanpham` WHERE `sanpham`.`id` =".$id);
            $result = mysqli_query($conn," UPDATE `sanpham` SET `deleted` = '0' WHERE `sanpham`.`id` =".$id);
            // UPDATE `sanpham` SET `deleted` = '1' WHERE `sanpham`.`id` = 49;
            $error=false;
            
        }
            catch (Exception $e) {
            //Xử lý ngoại lệ ở đây
            $errorMsg="xóa thất bại";
            $error=true;
        }
    }
    

?>

<a href="../danhsachSP.php">xoa thanh cong</a>

<!-- DELETE FROM `sanpham` WHERE `sanpham`.`id` = 43 -->