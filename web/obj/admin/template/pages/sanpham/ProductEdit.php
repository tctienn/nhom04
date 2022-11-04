<?php
    // require_once ("../../../../classes/dbConnection.php");
    ////// đổ dữ liệu vào combobox
    $dbConnection = new dbConnection();
    $con = $dbConnection->getConnection();
    $sqls = "SELECT * FROM `danhmuc` "; // limit "offset", "limit"
   
    /////

    $dbConnection = new dbConnection();
    $conn = $dbConnection->getConnection();

    $error=false;  $messageerro='';
      
    if(isset($_GET['action']) && $_GET['action']== 'addpro')
    {  
        if(isset($_POST['name']) && isset($_POST['mota']) && isset($_POST['danhmuc'])  && isset($_POST['gia']) && isset($_POST['soluong']) &&  $_POST['name']!="" && $_POST['mota']!="" && $_POST['danhmuc']!=""  && $_POST['gia']!="" )
        {
            $name=$_POST['name'];
            $mota=$_POST['mota'];
            $danhmuc_id=$_POST['danhmuc'];
            $gia=$_POST['gia'];
            $soluong= $_POST['soluong'];

            if((int)$_POST['gia']){
               
            }else{ 
                
                $error = true;
                echo "giá nhập không đúng kiểu";
                
            }
            
            

            include '../dsimg/Demoupload2.php';
            $img=$ss;
            // $mota=$_POST['create_at'];
            // require_once("classes/dbConnection.php");
            $dbConnection = new dbConnection();
            $conn = $dbConnection->getConnection();
            try {
                $time=time();
                $result = mysqli_query($conn,"INSERT INTO `sanpham` (`id`, `name`, `mota`, `danhmuc_id`, `gia`,`img`,`create_at`,`update_at`,`deleted`,`soluong`) VALUES ('', '$name', '$mota', '$danhmuc_id','$gia','$img', '".time()."','','1','$soluong')");
                // UPDATE `sanpham` SET `deleted` = '1' WHERE `sanpham`.`id` = 49;
                $error=false;
                
              }
              catch (Exception $e) {
                //Xử lý ngoại lệ ở đây
                $errorMsg="thêm sản phẩm thất bại";
                $error=true;
              }

           
              $gia='';
              echo "thêm thành công " ;
            mysqli_close($conn);             
                      
        }
        else{echo "nhập thiếu";}
        
       

    }

    // if(isset($_GET['action']) && $_GET['action']=='updatepro')
    // {
        
    // }


?>