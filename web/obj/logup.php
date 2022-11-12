<?php
session_start();
$render=true;
// $a=$_SESSION['login'];
// echo "$a";
    $error=false;

    
    if(isset($_GET['action']) && $_GET['action']== 'create')
    {
        if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['gmail']))
        {
            require_once ("./functions/Sendmail.php");
            require "./PHPMailer/src/PHPMailer.php"; 
            require "./PHPMailer/src/SMTP.php"; 
            require './PHPMailer/src/Exception.php';  
            $username=$_POST['username'];
            $password=$_POST['password'];
            $gmail=$_POST['gmail'];
            $sec_number=mt_rand(10000, 99999);$ui=$sec_number;$sec_number="mã xác nhận:".$sec_number;$td="mã xác nhận đăng ký tài khoản";
            if(!isset($_POST['maxn']) || !(isset($_POST['maxn']) && isset($_GET['action']))){
                GuiMail($gmail,$sec_number,$td);

                // echo "không gửi mail".$_POST['maxn'];
            }
            
            $security=false;
            if(!isset($_POST['maxn']))
            {
                $render=  false;
            }
            else
            {
                if(isset($_POST['xn']))
                {
                    
                    if($_POST['maxn']==$_POST['xn'])
                    {
                        $security=true;
                    }
                    else
                    {
                        $errorMsg="nhập sai mã xác minh";
                        $error=true;
                    }
                }
                $render=true;
            }
            


        //    if(isset($_POST['maxn']) && isset($_GET['action']))
        //    {
        //     $security=true;
        //    }

            if($security==true)
            {
                require_once("classes/dbConnection.php");
                $dbConnection = new dbConnection();
                $conn = $dbConnection->getConnection();


                try {
                    //Thực hiện đoạn mã này có khả năng ném ra một ngoại lệ
                    $time=time();
                    $result = mysqli_query($conn,"INSERT INTO `user` (`id`, `usename`, `password`, `is_admin`, `create_time`,`gmail`) VALUES (NULL, '$username', MD5('$password'), '0', '".time()."','$gmail')");
                    $error=false;
                    // var_dump($result);exit;
                    // if(strpos(mysqli_error($conn),"Duplicate entry")!==false)
                    //     echo "tài khoản đã tồn tại";exit;
                    ?>
                    <Script>
                        alert("đăng ký thành công tài khoản: <?= $username ?>")
                    </Script>
                    <?php
                    mysqli_close($conn);  
                }
                catch (Exception $e) {
                    //Xử lý ngoại lệ ở đây
                    $errorMsg="tạo tài khoản thất bại";
                    $error=true;
                }
            }
            // else
            // {
            //     $errorMsg="nhập sai mã xác minh";
            //     $error=true;
            // }

           
            
           
                                  
        }

    }




?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/b    ootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <style type="text/css">
        body {
            /* margin: 0; */
            margin-top: 100px;
            padding: 0;
            /* background-color: #0277bd; */
            height: 100vh;
            background-image: url('https://acegif.com/wp-content/gifs/starfall-gif-46.gif');
            
        
            background-size: 100% 100%;
        }

        #login .container #login-row #login-column #login-box {
            margin-top: 30px;
            max-width: 600px;
            height: 401px;
            border: 1px solid #9C9C9C;
            background-color: #EAEAEA;
        }
        .btn{
            /* position: absolute; */
        }
        #login .container #login-row #login-column #login-box #login-form {
            padding: 20px;
        }

        #login .container #login-row #login-column #login-box #login-form #register-link {
            margin-top: -85px;
        }

        #login-err-msg {
            width: 540px;
            margin: 30px auto;
            background-color: rgba(242,82,194,0.2);
            color: white;
        }

       
    </style>
    <title>Đăng ký</title>
</head>

<body>

    <div id="login">
        <div class="container">
            <?php 
                if ($error == true) { ?>
                    <div class="alert alert-danger" id="login-err-msg">
                        <?= $errorMsg ?>
                        <br>
                        <?php  
                            if($security==true)
                                $e->getMessage(); 
                        ?>
                    </div>
                <?php } 
                
            ?>

            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" style='background-color: #ffffffcc; border-radius: 10px; margin-top:40px' class="col-md-12">
                        <form id="login-form" class="form" action="./logup.php?action=create" method="post">
                            <h3 class="text-center text-info">Đăng ký</h3>
                            <?php
                                if($render==true)
                                {

                                    ?>
                                        <div class="form-group">
                                            <label for="username" class="text-info">Tên đăng ký:</label><br>
                                            <input type="text" name="username" id="username" class="form-control" >
                                        </div>
                                        <div class="form-group">
                                            <label for="password" class="text-info">gmail:</label><br>
                                            <input type="email" id="gmail" name="gmail" class="form-control">
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="password" class="text-info">Mật khẩu:</label><br>
                                            <input type="password" name="password" id="password" class="form-control" >
                                        </div>
                                        <!-- <div class="form-group">
                                            <label for="password" class="text-info">Nhập lại mật khẩu:</label><br>
                                            <input type="password" name="password" id="password" class="form-control" >
                                        </div> -->
                                    
                                        <div class="form-group">
                                            <br>
                                            <!-- <label for="remember-me" class="text-info"><span>Nhớ mật khẩu</span> <span><input id="remember-me" name="remember-me" type="checkbox"></span></label><br>
                                            <input type="hidden" id="action" name="action" value="login" /> -->
                                            <input type="submit" name="submit" class="btn btn-info btn-md" value="Đăng ký">
                                        </div>
                                    <?php

                                }
                                else
                                {
                                    ?>
                                        <p>tôi đã gủi mã xác nhận tới <?= $_POST['gmail']?></p>
                                        <input type="hidden" name="username" id="username" class="form-control" value="<?=$username?>" >
                                        <input type="hidden" id="gmail" name="gmail" class="form-control" value="<?=$gmail?>">
                                        <input type="hidden" name="password" id="password" class="form-control" value="<?=$password?>" >
                                        <input type="hidden" name="xn" value="<?=$ui?>" >

                                        <label for="maxn" class="text-info">mã xác nhận:</label><br>
                                        <input type="text" name="maxn" id="maxn" class="form-control" >
                                        <input type="submit" value="nhập">
                                        </div>
                                    <?php
                                }
                            ?>
                            
                            <div id="register-link" class="text-right">
                                <a href="./login.php" class="text-info">Đăng nhập</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
        // var_dump($_GET);exit;

    ?>
</body>

</html>

<!------ Include the above in your HEAD tag ---------->