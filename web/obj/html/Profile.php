<?php
    session_start();
    require_once ("../classes/dbConnection.php");
    $dbConnection = new dbConnection();
    $conn = $dbConnection->getConnection();
    if(isset($_SESSION['id_user'])  && $_SESSION['login']==1)
    {
        $sql = "SELECT * FROM `user` where id='".$_SESSION['id_user']."'  ";
        $getdanhmuc = $conn->query($sql);
        if ($getdanhmuc->num_rows > 0) 
        {
            $row = $getdanhmuc->fetch_assoc();
            
        }

    }
    else{
        echo "bạn chưa đăng nhập";exit;
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/profile.css">
    <!-- <script src="https://code.iconify.design/iconify-icon/1.0.0-beta.3/iconify-icon.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"><link rel="stylesheet" href="css/trangchu.css"> -->
    <title>Document</title>
</head>

<body>
    <a href="./index.php"> trang chủ</a>
    <div class="page-content page-container" id="page-content">
        <div class="padding">
            <div class="row container d-flex justify-content-center">
                <div class="col-xl-6 col-md-12">
                    <div class="card user-card-full">
                        <div class="row m-l-0 m-r-0">
                            <div class="col-sm-4 bg-c-lite-green user-profile">
                                <div class="card-block text-center text-white">
                                    <div class="m-b-25">
                                        <img src="https://img.icons8.com/bubbles/100/000000/user.png" class="img-radius"
                                            alt="User-Profile-Image">
                                    </div>
                                    <h6 class="f-w-600"><?=$row['usename']?></h6>
                                    <a href="../logout.php">logout</a>
                                    
                                    <i class=" mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16"></i>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="card-block">
                                    <h6 class="m-b-20 p-b-5 b-b-default f-w-600">thông tin</h6>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">gmail</p>
                                            <h6 class="text-muted f-w-400"><?=$row['gmail']?></h6>
                                        </div>
                                        <!-- <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">SĐT</p>
                                            <h6 class="text-muted f-w-400">98979989898</h6>
                                        </div> -->
                                    </div>
                                    <!-- <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">Projects</h6> -->
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">thời gian tạo</p>
                                            <h6 class="text-muted f-w-400"> <?=date('d/m/Y ',$row["create_time"])  ?></h6>
                                        </div>
                                        <div class="col-sm-6">
                                            <p class="m-b-10 f-w-600">lịch sử giao dịch</p>
                                            <!-- <h6 class="text-muted f-w-400">Dinoter husainm</h6> -->

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
                                                    $sql2 = "SELECT * FROM `hoadon` where `user_id` ='".$_SESSION['id_user']."'  ";
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
                                        </div>
                                    </div>
                                    <ul class="social-link list-unstyled m-t-40 m-b-10">
                                        <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title=""
                                                data-original-title="facebook" data-abc="true"><i
                                                    class="mdi mdi-facebook feather icon-facebook facebook"
                                                    aria-hidden="true"></i></a></li>
                                        <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title=""
                                                data-original-title="twitter" data-abc="true"><i
                                                    class="mdi mdi-twitter feather icon-twitter twitter"
                                                    aria-hidden="true"></i></a></li>
                                        <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title=""
                                                data-original-title="instagram" data-abc="true"><i
                                                    class="mdi mdi-instagram feather icon-instagram instagram"
                                                    aria-hidden="true"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>