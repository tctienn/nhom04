<?php
    // mã cần nhúng
    // css : <script src="https://code.iconify.design/iconify-icon/1.0.0-beta.3/iconify-icon.min.js"></script>
    // bootrap:<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"><link rel="stylesheet" href="css/trangchu.css">

    if(!isset($_SESSION['cart']))
        $_SESSION['cart']=array();
    if(!isset($_SESSION['username']))
        $_SESSION['username']="";
    if(!isset($_SESSION['login']))
        $_SESSION['login']=0;
?>
    <!-- <div class="container-fluid" style="padding: 0; ">

        <div class="container-fluid" id="header">
            <div class="container row" id="onhead">
                <a href="./index.php" class="col-md-9" style="color:white;">
                    <div class="logo row">
                        <i> nhà thuốc</i>
                        <b>Long Châu</b>
                    </div>
                </a>
                <div class="col-md-3" id="right_head">
                    <iconify-icon icon="akar-icons:file" style=" color: white; margin-top: -15px;" width="27"
                        height="31 ; ">
                    </iconify-icon> &nbsp;
                    <p>
                        Tra cứu <br>Lịch sử đơn hàng
                    </p> &nbsp; &nbsp;
                    <iconify-icon icon="el:shopping-cart" style="color: white; margin-top: -15px;" width="27"
                        height="31"></iconify-icon> &nbsp;
                    <p style="margin-top: 6%;">
                        Giỏ hàng
                    </p>
                </div>
            </div>
        </div> -->

        <!--end header-->

       
        <!--end food-->

        <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
            crossorigin="anonymous"></script> -->

    <!-- </div> -->


    <div class="container-fluid" id="header" style="position: unset;" >
            <div class="container row" id="onhead">
                <div class="col-md-7">
                    <a href="./index.php" class="col-md-9" style="color:white;">
                        <div class="logo row">
                            <i> nhà thuốc</i>
                            <b>Long Châu</b>
                        </div>
                    </a>
                </div>
                <div class="col-md-5" id="right_head">
                        
                    <iconify-icon icon="mdi:human-male-board" style="color: white; margin-top: -15px;" width="27" height="31"></iconify-icon>&nbsp;
                    <?php
                        if(isset($_GET['login']) && $_GET['login']=='out')
                        {
                            $_SESSION['login']=0;
                            
                        }
                        if($_SESSION['login']==1)
                        {
                            
                            ?>
                                <form  action="./index.php?login=out" method="post"  >
                                    <input type="submit" style="margin-left: -10px; color:white ; text-decoration: none; background: none; border: none;" value="đăng xuât" >&nbsp;&nbsp;
                                </form>
                            <?php
                            
                        }
                        
                        else{
                            ?>
                                <a href="../login.php" style="margin-left: -10px; color:white ; text-decoration: none;">đăng nhập</a>&nbsp;&nbsp;
                            <?php
                        }
                    ?>
                    
                    <iconify-icon icon="akar-icons:file" style=" color: white; margin-top: -15px;" width="27"
                        height="31 ; ">
                    </iconify-icon> &nbsp;&nbsp;
                    <p>
                        Tra cứu <br>Lịch sử đơn hàng
                    </p> &nbsp; &nbsp;
                    <iconify-icon icon="el:shopping-cart" style="color: white; margin-top: -15px;" width="27"
                        height="31"></iconify-icon> <div class="number_cart"><b><?=count($_SESSION['cart'])?></b></div> &nbsp;
                    <p style="margin-top: 6%; margin-left: -7%;">
                        <a href="./cart/index.php" style="color: white; text-decoration: none;" >Giỏ hàng</a>
                    </p>

                    <p style="color: white;  margin-left: 10px; display: flex; flex-direction: column;">
                        <iconify-icon icon="healthicons:ui-user-profile" style="color: white;" width="30" height="30"></iconify-icon>
                        <a href="#" style="color: white; text-decoration: none; margin:auto; margin-top:-5px;" ><?=$_SESSION['username']?></a>
                        
                    </p>
                    
                </div>
            </div>
        </div>
