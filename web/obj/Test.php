<?php
    require("./classes/dbConnection.php");
    
    
   


 







    $dbConnection = new dbConnection();
    $conn = $dbConnection->getConnection();
    // $sql = "SELECT * FROM sanpham where deleted=1 ORDER BY id ASC limit ".$trang.",4 ";
    $sql = "SELECT sanpham.id , sanpham.name as sp_name, sanpham.mota as sp_mota , sanpham.gia as sp_gia,sanpham.img as img, danhmuc.name as cat_name  ,  sanpham.soluong sp_soluong  FROM sanpham , danhmuc WHERE sanpham.danhmuc_id = danhmuc.id and danhmuc.id ORDER BY id ASC ";
    $result = $conn->query($sql);

   

?>

<table border=1>
  <?php
     if ($result->num_rows > 0)
     while ($row = $result->fetch_assoc()) {
       ?>
        <tr>
           <td><?=$row['id']?></td>
           <td><?=$row['sp_name']?></td>
           <td><?=$row['sp_mota']?></td>
           <td><?=$row['sp_gia']?></td>
           <td><img src="<?=$row['img']?>" style="width: 40px; aspect-ratio: 2/2;"  alt=""></td>
           <td><?=$row['cat_name']?></td>
           <td><?=$row['sp_soluong']?></td>

        </tr>
       <?php
     }
  ?>
  
</table>