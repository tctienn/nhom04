<?php

session_start();
$_SESSION['login']='0';
// require_once("functions/functions.php");
// require_once("config.php");
require_once("classes/dbConnection.php");

// $username = getValue("username", "POST", "str", "");
// $password = getValue("password", "POST", "str", "");
// $action = getValue("action", "POST", "str", "");


// var_dump($_POST);
// var_dump($username);
// var_dump($password);

$errorMsg = "";
if (isset($_GET['action']) && $_GET['action'] == "login") {
    if(isset($_POST['username']) && $_POST['password'])
    {
        $username=$_POST['username'];
        $password=$_POST['password'];
    }
    if ($username == "") {
        $errorMsg .= "&bull; Vui lòng nhập User Name.<br />";
    }
    if ($password == "") {
        $errorMsg .= "&bull; Vui lòng nhập Password.<br />";
    }

    // Nếu có đủ dữ liệu POST thì xác thực
    // if ($errorMsg == "") {
    //     if ($username == "admin" && $password == "admin@2021") {
    //         // Success
    //         // echo "Success";
    //         $_SESSION["logged"] = 1;
    //         header("Location: themmoi.php");
    //     } else {
    //         $errorMsg .= "&bull; Thông tin đăng nhập không đúng. Vui lòng thử lại.<br />";
    //     }
    // }
    $dbConnection = new dbConnection();
    $conn = $dbConnection->getConnection();
    // $username="";
    try {
        //code...
        $sql = "SELECT * FROM user WHERE usename = '$username' AND password=md5('$password')";
        $result = $conn->query($sql);
        if ($result->num_rows != 0) {
            {   $errorMsg=''; 
                $row = $result->fetch_assoc(); 
                if ($row["is_admin"]==1) {
                    // Success
                    // echo "Success";
                    $_SESSION['login'] = 1;
                    header("Location: http://localhost/monwebnangcao/obj_clone/nhom04/web/obj/admin/template/index_admin.php");
                } 
                else
                {
                    $_SESSION['login'] = 1;
                    header("Location: http://localhost/monwebnangcao/obj_clone/nhom04/web/obj/html/");
                    // header("Location: sa/Untitled-1.html");
                }
            }
        }
        else {
            $errorMsg = "&bull; Thông tin đăng nhập không đúng. Vui lòng thử lại.<br />";
        }
        
        $conn->close();
    } catch (\Throwable $th) {
        //throw $th;
        $errorMsg= "lỗi cơ sở dữ liệu";
    }
/////////////////////
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
            height: 320px;
            border: 1px solid #9C9C9C;
            background-color: #EAEAEA;
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
    <title>Đăng nhập</title>
</head>

<body>
    <div id="login">
        <a href="./html/index.php" style="color: white; position: fixed; margin-top: -100px;">trang chủ</a>
        <div class="container">
            <?php 
                if(isset($_POST['action']))
                {
                    if($_GET['action']=='login')
                    {
                        if ( $errorMsg != "") { ?>
                            <div class="alert alert-danger" id="login-err-msg">
                                đăng nhập không thành công:  <?= $errorMsg ?>
                            </div>
                            <?php }
                            else
                            {
                                ?>
                                    <div class="alert alert-danger" id="login-err-msg">
                                        đăng nhập  thành công
                                    </div>
                                <?php
                            }
                    }
                }
            ?>
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" style='background-color: #ffffffcc; border-radius: 10px; margin-top:40px' class="col-md-12">
                        <form id="login-form" class="form" action="./login.php?action=login" method="post">
                            <h3 class="text-center text-info">ĐĂNG NHẬP</h3>
                            <div class="form-group">
                                <label for="username" class="text-info">Tên đăng nhập/gmail:</label><br>
                                <input type="text" name="username" id="username" class="form-control" >
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Mật khẩu:</label><br>
                                <input type="password" name="password" id="password" class="form-control" autocomplete="off"   placeholder="mật khẩu" >
                            </div>
                            <div class="form-group">
                                <label for="remember-me" class="text-info"><span>Nhớ mật khẩu</span> <span><input id="remember-me" name="remember-me" type="checkbox"></span></label><br>
                                <input type="hidden" id="action" name="action" value="login" />
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="Đăng nhập">
                            </div>
                            <div id="register-link" class="text-right">
                                <a href="./logup.php" class="text-info">Đăng ký</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
     
                
</body>

</html>

<!------ Include the above in your HEAD tag ---------->