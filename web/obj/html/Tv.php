<?php
    session_start();
    require "../PHPMailer/src/PHPMailer.php"; 
    require "../PHPMailer/src/SMTP.php"; 
    require '../PHPMailer/src/Exception.php'; 
    // require('../functions/Sendtoserver.php');
    require('../functions/Sendmail.php');

    $clien_email='mainichichimvm@gmail.com';
                //   mainichichimvm@gmail.com

        // $nguoidung='name';
        // $nd_mail='nội dung';
        // $td='td';
        // GuiMail( $clien_email,$nguoidung,$nd_mail,$td);exit;
        // GuiMail($clien_email,$nd_mail,$td);

    $td="câu hỏi từ người dùng";
    if(isset($_SESSION['login']) && $_SESSION['login']==1 &&isset($_SESSION['username']))
    {
        $user=$_SESSION['username'];
        
    }
    else{
        echo '<div style="color:red; ">yêu cầu nhập gmail vì chưa đăng nhập</div>';
        $user='';
    }


    if(isset($_GET['send']) && $_GET['send']=="true")
    {
        
        if(isset($_POST['nd']) && isset($_POST['gmail']) )
        {
            if(isset($_SESSION['login']) && $_SESSION['login']==1) // login
            {
                if( $_POST['gmail']=='' )
                {
                    // echo "ay";
                    echo $_SESSION['gmail'];
                    GuiMail($_SESSION['gmail'],$user,$_POST['nd'],$td); // null gmail
                }
                else{
                    GuiMail($_POST['gmail'],$user,$_POST['nd'],$td);
                }
            }
            else{
                $user="_người dùng_";
                GuiMail($_POST['gmail'],$user,$_POST['nd'],$td);
            }
        }
        
        // GuiMail();
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
    <h2>gửi câu hỏi từ người dùng: <?=$user?></h2>
    <form action="?send=true" method="post">
        <label for="">nhập câu hỏi</label>
        <input type="text" name="nd" id=""> <br>
        <label for=""  > nhập gmail </label>
        <input type="email" name="gmail" id=""  > <br>
        (nhập gmail là yêu cầu bắt buộc nếu chưa đăng nhập) <br>
        <input type="submit" value="gửi" >
    </form>
    <a href="./index.php">trang chủ</a>
</body>
</html>