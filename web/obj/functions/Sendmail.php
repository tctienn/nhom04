<?php

    function GuiMail($gmail,$nd_mail,$td){   
        // khi gọi hàm thì cần gọi thêm 3 file tại nơi gọi hàm
        // require "../PHPMailer/src/PHPMailer.php"; 
        // require "../PHPMailer/src/SMTP.php"; 
        // require '../PHPMailer/src/Exception.php'; 
        $mail = new PHPMailer\PHPMailer\PHPMailer(true);//true: co phép sử lý lỗi
        try {
            $mail->SMTPDebug = 0; //0,1,2: chế độ debug.mức độ hiển thị lỗi (để = 0 để mailer chạy ẩn)
            $mail->isSMTP();  
            $mail->CharSet  = "utf-8";  
            $mail->Host = 'smtp.gmail.com';  //địa chỉ mail server
            $mail->SMTPAuth = true; // cho phép kiểm tra mail server
            $mail->Username = 'demoweb2220@gmail.com'; // SMTP username điền web server(có tạo mật khẩu ứng dụng)
            $mail->Password = 'knxmcyngzxyyuehq';   // SMTP password
            $mail->SMTPSecure = 'ssl';  // encryption TLS/SSL kiểu mã hóa
            $mail->Port = 465;  // port to connect to nếu kiểu ssl thì port dùng 465 nếu là TLS thì port là 587              
            $mail->setFrom('demowess@gmail.com', 'obj web' );   // địa chỉ mail của người gủi và tên người gủi
            $mail->addAddress($gmail, ''); //mail và tên người nhận  có thể để nhiều
            $mail->isHTML(true);  // trong nội dung thư có thẻ html không
            $mail->Subject = $td; //Tiêu đề thư
            $noidungthu = '<h2>Nội dung thư</h2><p>'.$nd_mail.'</p><br><hr>'; //Nội dung thư
            $mail->Body = $noidungthu;
            $mail->smtpConnect( array(  // gủi mail từ local nên phải có cái này
                "ssl" => array(
                    "verify_peer" => false,
                    "verify_peer_name" => false,
                    "allow_self_signed" => true
                )
            ));
            $mail->send(); // hàm gửi
            echo 'Đã gửi mail xong';
        } catch (Exception $e) {
            echo 'Mail không gửi được. Lỗi: ', $mail->ErrorInfo;
        }
    }//function GuiMail

?>