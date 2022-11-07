<?php

    session_start();
   
    function thanhtoan(){
        // require_once("../../classes/dbConnection.php");
        // require ("../classes/dbConnection.php");
        // include '../classes/dbConnection.php';
        $dbConnection = new dbConnection();
        $conn = $dbConnection->getConnection();

        $sp_name="sản phẩm đã thanh toán: ";
        $time=time();
        if(isset($_SESSION['tong']))
        {

            foreach($_SESSION['cart'] as $value)
            {
                $sql = "SELECT * FROM sanpham WHERE id = '$value->id' ";
                $result = $conn->query($sql);
                if ($result->num_rows != 0) 
                {   
                    $row = $result->fetch_assoc();
                    $sp_name.=$row['name'].",";
                    
                }
                else{
                     $sp_name="hóa đơn bị hỏng gio số lượng sản phẩm có vấn đề";
                     echo $sp_name;
                }
            }
            // INSERT INTO `hoadon` (`id`, `order_id`, `note`, `ma_gd`, `money`, `code_bank`, `time`) VALUES (NULL, '1', '1', '1', '1', '1', '".time()."');
            $result = mysqli_query($conn,"INSERT INTO `hoadon` (`id`, `order_id`, `note`, `ma_gd`, `money`, `code_bank`, `time`) VALUES (NULL, '".$_GET['vnp_TxnRef']."', '".$sp_name."', '".$_GET['vnp_TransactionNo']."', '".$_SESSION['tong']."', '".$_GET['vnp_BankCode']."', '".$_GET['vnp_PayDate']."')");
            // UPDATE `sanpham` SET `deleted` = '1' WHERE `sanpham`.`id` = 49;
            // echo "ok";
            $_SESSION['cart']= array();
            $_SESSION['tong']=0;
            // var_dump(date("m/d/y", $_GET['vnp_PayDate']));exit;
        }
       
    }

?>