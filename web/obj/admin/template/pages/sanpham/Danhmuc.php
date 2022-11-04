<a href="../../index_admin.php" style="color: black;  ">admin ></a>
<?php
    require_once ("../../../../classes/dbConnection.php");
    $dbConnection = new dbConnection();
    $conn = $dbConnection->getConnection();

    // $error={er:false,string:""};
    // biến đối tượng trong php
    $error= new stdclass;
    $error->er=false;
    $error->string="";
    // var_dump($error);exit;
//// chạy lệnh
//update
if(isset($_GET['id_update']))
{
    $id_update=$_GET['id_update'];
    ?>
        <hr>
        <form action="./Danhmuc.php?update=true&id_update=<?=$id_update?>" method="POST">
             <lable>id</lable>
            <input disabled type="text" name="id" value="<?=$id_update?>"><br>
            <lable>tên danh mục</lable>
            <input type="text" name="name">
            <input type="submit" value="sửa">
        </form>
        <hr>
    <?php

    if(isset($_GET['update']) && $_GET['update']=="true")
    {
        
        if(isset($_POST['name']) && $_POST['name']!="")
        {
            $name=$_POST['name'];
            $con_update = $dbConnection->getConnection();
            $result_update = mysqli_query($con_update,"UPDATE `danhmuc` SET `name` = '".$name."' WHERE `danhmuc`.`id` = '".$id_update."'");
        }
        else{
            $error->er=true;
            $error->string="lỗi update : chưa có biến post['name'] hoặc bỏ trống ô name ";
        }
    }
}



// insert
if(isset($_GET['danhmuc'])&&$_GET['danhmuc']=='add')
{
    // echo "ok";
    if(isset($_POST['name']))
   {
    $name_danhmuc=$_POST['name'];
    if($name_danhmuc!="")
    {
        $result = mysqli_query($conn,"INSERT INTO `danhmuc` (`id`, `name`) VALUES ('', '".$name_danhmuc."')");
        $error->er=false;
        
        
    }
    else{
        $error->er=true;
        $error->string="chưa nhập danh mục";
        
        
    }
   
   }

    // $sql_add=""
}


//////////////////
    
    ?>
        <form action="./Danhmuc.php?danhmuc=add" method="POST" >
            <!-- <lable>id</lable>
            <input type="text" name="id" value="nhập id"><br> -->
            <lable>tên danh mục</lable>
            <input type="text" name="name">
            <input type="submit" value="thêm danh mục">
        </form>
    <?php


    // lấy danh sách danh mục
    $sql = "SELECT * FROM `danhmuc`";
    $getdanhmuc = $conn->query($sql);
?>
    <table border=1 >
        <tr>
            <th>id</th>
            <th>danh mục</th>
        </th>
        <?php
            if ($getdanhmuc->num_rows > 0) {
                while ($row = $getdanhmuc->fetch_assoc()) {
                    ?>
                       <tr>
                            <td><?=$row['id']?></td>
                            <td><?= $row['name']?></td>
                            <td><a href="?id_update=<?=$row['id']?>">sửa</a></td>
                       </tr>
                    <?php
                }
            }
        ?>
    </table>

<?php
   
    
    if($error->er==true)
    {
        echo $error->string;
       
    }

    

    
    

?>




