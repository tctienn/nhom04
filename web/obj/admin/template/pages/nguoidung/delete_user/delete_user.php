<?php
   try {
    //code...
    require_once("../../../../../classes/dbConnection.php"); 
   $dbConnection = new dbConnection();
   $conn = $dbConnection->getConnection();
    
   } catch (\Throwable $th) {
    // throw $th;
    echo "lỗi";exit;
    
   }
?>

<?php
    if(isset($_GET['action']) && $_GET['action']=='delete')
    {
        try {
            //code...
            $result = mysqli_query($conn,"DELETE FROM `user` WHERE id =".$_POST['id']);
            // var_dump( $_POST['id']);  
            echo "đã xóa người dùng có id: ".$_POST['id'] ;exit;
         
        // $row = $result->fetch_assoc();
        } catch (\Throwable $th) {
            //throw $th;
            echo "lỗi xóa";exit;
        }
    }
    else
    {
        $result = mysqli_query($conn,"SELECT * FROM `user` where id= ".$_GET['id']);
        $row = $result->fetch_assoc();
        
        ?>
            <h2>xóa người dùng</h2>
            id: <input form="delete_korm" name='id' value="<?= $row['id'] ?>"> <br>
            tên: <?= $row['usename']?><br>
            password: <?= $row['password']!='*'? '*': '*' ?><br>
            quyền: <?=$row["is_admin"]==1? "admin":"người dùng" ?><br>
            ngày tạo: <?= date('d/m/Y ',$row["create_time"]) ?><br>
            <form action="./delete_user.php?action=delete" method="post" id="delete_korm">            
                <input type="submit" value="xóa người xóa người dùng">
            </form>
        <?php
    }
?>