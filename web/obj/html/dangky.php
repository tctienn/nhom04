

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>
    <title>đăng ký</title>
    <link rel="stylesheet" href="../css/dangky.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/trangchu.css">
    <script src="https://code.iconify.design/iconify-icon/1.0.0-beta.3/iconify-icon.min.js"></script>
</head>

<body>
    <div class="ht">
        <a href="#"><span class="iconify" data-icon="ic:round-support-agent" style="color: white;"></span></a>

    </div>

    <!-- <div class="p1">
        
            <div class="logo" style="float: left;">
                <a href="../web chinh .html" ><img src="../LOGO/logo/logo/dk5.gif" style="width: 100%;"></a>
            </div>
            <div class="logodangky">
                Đăng ký
            </div>
            <div class="hotro">
                <b style="color: white;">GMAIL :</b> <a href="#">mnkhomvm@gmail.com |</a> 
                <a href="#">hỗ trợ khách hàng</a>
            </div>
        
    </div> -->
    <?php
            require_once ("../component/hea_der.php")
            
    ?>
   

    <!---->
    

    <div class="p2">
        <div class="formdangky">
            <div class="logodk">
                Đăng ký
            </div>
            <br>
            <hr style="border-bottom: solid #0e3ea8 1px;">

            <form class="indangky"  >
                <ul>
                    <li>
                        <label for="tk"> tài khoản &nbsp;&nbsp;</label>
                        <input id="tk" type="text" required name="username">
                    </li>
                    <li>
                        <label for="mk" style="float: left;">mật khẩu &nbsp;</label>
                        <div class="bodermk">
                            <input id="mk" type="password" required>
                            <div class="icon" onclick="showeye()">
                                <span id="of" class="iconify" data-icon="akar-icons:eye-closed" data-width="20"
                                    onclick="document.getElementById('of').style.display='none',document.getElementById('on').style.display='block',document.getElementById('mk').type='text'"></span>
                                <span id="on" class="iconify" data-icon="akar-icons:eye-open" data-width="20"
                                    onclick="document.getElementById('on').style.display='none',document.getElementById('of').style.display='block', document.getElementById('mk').type='password'"></span>

                            </div>
                        </div>
                        <br><br>
                        <label for="mk" style="float: left;">nhập lại mật khẩu &nbsp;</label>
                        <div class="bodermk">
                            <input id="nnmk" type="password" required name="password">
                            <div class="icon" onclick="showeye()">
                                <span id="off" class="iconify" data-icon="akar-icons:eye-closed" data-width="20"
                                    onclick="document.getElementById('off').style.display='none',document.getElementById('onn').style.display='block',document.getElementById('nnmk').type='text'"></span>
                                <span id="onn" class="iconify" data-icon="akar-icons:eye-open" data-width="20"
                                    onclick="document.getElementById('onn').style.display='none',document.getElementById('off').style.display='block', document.getElementById('nnmk').type='password'"></span>

                            </div>
                        </div>
                    </li><br>
                    <li><label for="tk">Số điện thoại &nbsp;&nbsp;</label><input id="tk" type="text" required name="phone">
                    </li>


                    <li>
                        <label for="tk"> gmail &nbsp;&nbsp;</label><input id="tk" type="text" required name="email">
                    </li>


                </ul>
                <br>
                <hr style="width: 80%; margin: auto; border-top: none;">
                <br>

                <input class="button" type="submit" name="dangky" value="Tạo tài khoản"><br>
                <?php
                    require_once("../classes/themtk.php");
                ?>
                <br>
                <hr style="width: 80%; margin: auto; border-top: none;"><br><b
                    style="color: rgb(195, 195, 195); font-size: 10px; margin-left: 40%;"> hay bạn có tài
                    khoản</b><br><br>
                <div class="button" style="line-height: 30px;"><a type="button" href="../html/form_dangnhap.html"
                        style="  text-decoration: none;color: black ; font-size: 14px; margin-left: 40%; display: block;">Đăng
                        nhập</a></div>
            </form>
        </div>

    </div>
    
  
    <script src="../js/dangky.js"></script>
   
</body>

</html>