<?php
    require_once ("../../../../classes/dbConnection.php");
    $dbConnection = new dbConnection();
    $conn = $dbConnection->getConnection();

    $name='';


    
    if(isset($_GET['id']) && isset($_GET['action']) && $_GET['action']=='updatepro')

    {
        $id= $_GET['id'];
        $name = $_POST['name'];
        $mota = $_POST['mota'];
        $danhmuc_id = $_POST['danhmuc_id'];
        $gia = $_POST['gia'];
        if(isset($_GET['oldimg']))
            $oldimg=$_GET['oldimg'];
        try{
            include '../dsimg/Demoupload2.php';
        }
        catch(Exception $e)
        {
            echo "lỗi upload ảnh";
        }
        
        
        $img=$ss;
        ?><img src="<?=$img?>" alt=""><?php
        try{
            // $time=time();
            $result = mysqli_query($conn,"UPDATE `sanpham` SET `name` = '".$name."', `mota` = '".$mota."', `danhmuc_id` = '".$danhmuc_id."', `gia` = '".$gia."', `img` = '".$img."', `update_at` = '".time()."' WHERE `sanpham`.`id` = ".$id);
            echo "cập nhật sản phẩm thành công  ";
            ?><a href='./Update.php?sua=<?= $id ?>&name=<?=$name?>&mota=<?=$mota?>&danhmuc_id=<?=  $danhmuc_id?>&gia=<?=$gia ?>&img=<?=$img?>'>upload thêm ảnh</a><?php
            

        }
        catch(Exception $e)
        {
           echo 'lỗi update ';

        } 
        // echo "update thành công ";
        
        // try {
        //     $time=time();
        //     // $result = mysqli_query($conn," UPDATE `sanpham` SET `deleted` = '0' WHERE `sanpham`.`id` =".$id);
        //     $result = mysqli_query($conn,"UPDATE `sanpham` SET `name` = '.$name.', `mota` = '.$mota.', `danhmuc_id` = '.$danhmuc_id.', `gia` = '.$gia.', `img` = '.$img.', `update_at` = '11111' WHERE `sanpham`.`id` = ".$id);

        //     // UPDATE `sanpham` SET `deleted` = '1' WHERE `sanpham`.`id` = 49;
        //     $error=false;
        //     echo "update thành công ";
            
        // }
        //     catch (Exception $e) {
        //     //Xử lý ngoại lệ ở đây
        //     $errorMsg="sửa thất bại";
        //     $error=true;
        //     echo "lỗi update : " . $e ;
        // }
        
    }

    else{
        $dbConnection = new dbConnection();
        $con2 = $dbConnection->getConnection();
        $sqls = "SELECT * FROM `danhmuc` ";
        $comb = $con2->query($sqls);
        if(isset($_GET['sua']) && !$_GET['sua']=="" && isset($_GET['name']) && isset($_GET['mota']) && isset($_GET['danhmuc_id']) && isset($_GET['gia']) && isset($_GET['img']))
        {
            
            // echo "name ";
            // if(isset($_GET[]))
            $id= $_GET['sua'];
            $name=$_GET['name'];
            $mota=$_GET['mota'];
            // $oldimg=$_GET['img'];
            
            $danhmuc_id= $_GET['danhmuc_id'];
            $sqldm="SELECT * FROM `danhmuc`WHERE `id`='$danhmuc_id'";
            $comb2 = $con2->query($sqldm);
            if ($comb2->num_rows > 0)
            while($row2 = $comb2->fetch_assoc())
               { $namedm=$row2['name'];};
            
            $gia = $_GET['gia'];
            $img = $_GET['img'];
            
        }
        ?>
            <h2>cập nhật sản phẩm </h2>

            <form action="./Update.php?action=updatepro&id=<?=$id?>&oldimg=<?= $img?>" method="POST" enctype="multipart/form-data">
                <lable >tên sản phẩm</lable>
                <input type="text" name="name" id="" value="<?=$name?>"><br>
                <lable>mô tả</lable>
                <input type="text" name="mota" id="" value="<?=$mota?>"><br>
                <lable>danh mục</lable>
                <select name="danhmuc_id" id="">
                    <option value=<?=$danhmuc_id?> > <?=$namedm?> </option> 
                    <?php
                        
                      
                        if ($comb->num_rows > 0) {
                            while ($row = $comb->fetch_assoc()) {
                                ?>
                                    
                                    <option value=<?=$row['id']?> > <?=$row['name']?> </option>
                                    
                                <?php
                            }
                        }
                    ?>
                </select> 
                
                <lable>giá</lable>
                <input type="text" name="gia" id="" value="<?=$gia?>"><br>
                <lable>ảnh</lable>
                <img src= <?= $img ?> style="width:100px ; asaspect-ratio:2/2; "  alt="">
                <input multiple type="file" name="file[]" id="">
                <input type="submit" value="update">

            </form>
        <?php
        
    }
?>






   