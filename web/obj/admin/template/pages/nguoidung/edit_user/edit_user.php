<?php
    // var_dump( $_GET['id']);exit;  
    require_once("../../../../../classes/dbConnection.php");
   
    $dbConnection = new dbConnection();
    $conn = $dbConnection->getConnection();
    
    

        


     
    if(isset($_GET['action']) && $_GET['action']=='edit')
    {
         
        ?>
            <!-- <Script>
                var ui=confirm("bạn có muống thay đổi tài khoản này")
                // if(ui)
                    // alert("ok")
                
            </Script> -->
        <?php
        
        // header('Location: http://localhost/monwebnangcao/obj_clone/nhom04/web/obj/admin/template/pages/samples/nguoidung.php', true, 301 );
        // UPDATE `user` SET `usename` = 'ge' WHERE `user`.`id` = 60;
        if(isset($_POST['username']) && $_POST['password'] && $_POST['is_admin'])
        {
            $username=$_POST['username'];
            $password=$_POST['password'];
            $is_admin=($_POST['is_admin']=='admin'? 1:0);
            $result = mysqli_query($conn,"UPDATE `user` SET `usename` = '$username', `password` = MD5('$password'), `is_admin` = '$is_admin' WHERE `id` = ".$_POST['id']);
            echo "đã sửa tài khoản: ".$_POST['username'];
            
        }
    }

    else
    {

        try {
       
            $time=time();
            // $result = mysqli_query($conn,"INSERT INTO `user` (`id`, `usename`, `password`, `is_admin`, `create_time`) VALUES (NULL, '$username', MD5('$password'), '0', '".time()."')");
            $result = mysqli_query($conn,"SELECT * FROM `user` where id= ".$_GET['id']);
            $row = $result->fetch_assoc();
            // $error=false;
            ?>
            <Script>
                // confirm("bạn có muống thay đổi tài khoản này")
            </Script>
    
            <?php
            
            // var_dump( $_GET['id']);  
            
           
          }
          catch (Exception $e) {
            echo "lỗi";
            $e->getMessage();
          }
    
    
          ?>
          <h2>chỉnh sửa tài khoản : <?= $row["usename"] ?></h2>
            <form action="./edit_user.php?action=edit" method="post">
                <lable>id: </lable>
                <input type="text" name='id' value="<?=$row["id"]?>" ><br><br>
                <lable>Tên người dùng</lable>
                <input type="text" name="username"  value="<?=$row["usename"]?>"><br><br>
                <lable>mật khẩu (đã mã hóa)</lable>
                <input type="text" name="password" value="<?=$row["password"]?>"><br><br>
                <lable>quyền</lable>
                <input type="text" name="is_admin" value="<?=$row["is_admin"]==1? "admin":"người dùng" ?>"><br><br>
                <lable>ngày tạo: </lable>
                <lable><?= date('d/m/Y ',$row["create_time"]) ?></lable><br><br>
                <input type="submit" onclick="var ui=confirm('bạn có muống thay đổi tài khoản này')" value="Thay đổi">
            </form>
          <?php
    }
    
    //   try {
    //     //code...
    //     // UPDATE `user` SET `usename` = 'ge' WHERE `user`.`id` = 60;
    //     // $result = mysqli_query($conn,"UPDATE `user` SET `usename` = 'ge' WHERE `user`.`id` = ".$_POST['username']);
    //     // $row = $result->fetch_assoc();

    //   } catch (\Throwable $th) {
    //     //throw $th;
        
    //     echo "Lỗi sửa";
    //   }

?>