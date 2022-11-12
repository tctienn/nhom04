<?php
    session_start();
    if(isset($_SESSION['login']) && $_SESSION['login']==1)
    {
        require_once ("../classes/dbConnection.php");
        $dbConnection = new dbConnection();
        $conn = $dbConnection->getConnection();
        if(isset($_POST['search']) && $_POST['search'] != "")
        {
            $search="and order_id= '".$_POST['search']."'";
        }
        else
        {
            $search="";
        }
    }
    else 
    {
        echo" bạn cần đăng nhập để thực hiện chức năng này <a href='./index.php'>quay lại trang chủ</a>";exit;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="./index.php">trang chủ</a>
    <h2>người dùng : <?=$_SESSION['username']?></h2>
    <form action=""  method="post" >
        <label for="">tìm kiếm theo mã hóa đơn</label>
        <input type="search" name="search" id="" placeholder="mã hóa đơn">
        <!-- <input type="submit" value="s"> -->
    </form>
    <table border=1 style=" border-collapse:collapse;">

    <tr>
        <th>id</th>
        <th>mã đơn hàng</th>
        <th>thông tin hóa đơn</th>
        <th>mã giao dịch</th>
        <th>tiền</th>
        <th>ngân hàng</th>
        <th>thời gian</th>
        
    </tr>
    <?php
        $sql2 = "SELECT * FROM `hoadon` where `user_id` ='".$_SESSION['id_user']."' ".$search." ORDER BY id ASC  ";
        $hoadon = $conn->query($sql2);
        if ($hoadon->num_rows > 0) 
        {  $a=0;
            while($row = $hoadon->fetch_assoc())
            {   
                $a++;
                ?>
                    <tr style="<?php if($a%2==0){echo 'background-color: #ffe7e7';}?>" >
                        <td><?=$row['id']?></td>
                        <td><?=$row['order_id']?></td>
                        <td><textarea style="background: none; border: none; " name="" id="" cols="20" rows="4" maxlength="0" disabled="disabled"><?=$row['note']?></textarea></td>
                        <td><?=$row['ma_gd']?></td>
                        <td><?=$row['money']?></td>
                        <td><?=$row['code_bank']?></td>
                        <td><?= date("m-d-Y", strtotime($row['time']))?></td>
                    </tr>
                <?php
            }
            
        }
    ?>
    </table>
    
</body>
</html>