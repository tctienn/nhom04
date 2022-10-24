<h2>danh sách sản phẩm</h2>

<?php
    require("../../../../classes/dbConnection.php"); 
    $trang=0; if(isset($_GET['trang']))$trang=$_GET['trang']*4;
    
       
    
    $dbConnection = new dbConnection();
    $conn = $dbConnection->getConnection();
    $sql = "SELECT * FROM sanpham where deleted=0 ORDER BY id ASC limit ".$trang.",4 "; // limit "offset", "limit"
    
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        
           ?>
                <table border=1  >
                    <tr>
                        <th>id</th>
                        <th>tên sản phẩm</th>
                        <th>mô tả</th>
                        <th>danh mục</th>
                        <th>giá</th>
                        <th>img</th>
                        <th>thời gian tạo</th>
                        <th>thời gian cập nhật</th>
                        <th colspan=2 >chức năng</th>
                    </tr>
                <?php
                     while ($row = $result->fetch_assoc()) {
                        
                        
                           ?>
                                   
                                       <tr>     
                                           <td>
                                               <?= $row["id"] ?>
                                           </td>
                                           <td>
                                               <?= $row["name"]  ?>
                                           </td>
                                           <td>
                                               <?= $row["mota"] ?>
                                           </td>
                                           <td>
                                               <?= $row["danhmuc_id"] ?>
                                           </td>
                                           <td>
                                               <?= number_format($row["gia"],0,",","."); echo "đ"; ?>
                                           </td>
                                           <td>
                                              <img src= <?= $row["img"] ?> style="width:100px ; asaspect-ratio:2/2; "  alt="">
                                           </td>
                                           <td>
                                               <?= $row["create_at"] ?>
                                           </td>
                                           <td>
                                               <?= $row["update_at"] ?>
                                           </td>
                                           <td>
                                            <a href="?sua=<?= $row["id"] ?>">sửa</a>
                                           </td>
                                           <td>
                                            <a href="?xoa=<?= $row["id"] ?>">xóa</a>
                                           </td>
                                       </tr>
                                  
                           <?php
                        
                   }
                ?>
                 </table>
                 
                <br>
                <?php
                     $sql2 = "SELECT * FROM sanpham where deleted=0 ";
                     $sumrow = $conn->query($sql2);
                     $sumrow = mysqli_num_rows( $sumrow)/4;
                     $tranghientai=isset($_GET['trang'])?$_GET['trang']:0;
                     for($i=0;$i<$sumrow;$i++)
                     {
                        if($tranghientai !=$i )
                           {
                            ?><a href="?trang=<?=$i?>"><button><?=$i?></button></a><?php
                           }
                        else{
                            ?><a href="?trang=<?=$i?>"><button style="color: white;"><?=$i?></button></a><?php
                        }
                       
                     }
                     echo "trang hien tai $tranghientai";
                ?>
                <!-- <a href="?trang=0"><button>0</button></a>
                <a href="?&trang=1"><button>1</button></a>
                <a href="?trang=2"><button>2</button></a>
                <a href="?trang=3"><button>3</button></a> -->


            
           <?php
           
        } else {
            echo "không có sản phẩm nào";
        }
?>