<?php
    require("./classes/dbConnection.php");
    
    //mail:
    GuiMail();
   


 







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




<?php

function GuiMail($gmail){   
  require "./PHPMailer/src/PHPMailer.php"; 
  require "./PHPMailer/src/SMTP.php"; 
  require './PHPMailer/src/Exception.php'; 
  $mail = new PHPMailer\PHPMailer\PHPMailer(true);//true: co phép sử lý lỗi
  try {
      $mail->SMTPDebug = 0; //0,1,2: chế độ debug.mức độ hiển thị lỗi (để = 0 để mailer chạy ẩn)
      $mail->isSMTP();  
      $mail->CharSet  = "utf-8";  
      $mail->Host = 'smtp.gmail.com';  //địa chỉ mail server
      $mail->SMTPAuth = true; // cho phép kiểm tra mail server
      $mail->Username = 'demowess@gmail.com'; // SMTP username điền web server(có tạo mật khẩu ứng dụng)
      $mail->Password = 'pcfwpeahveqkdyhi';   // SMTP password
      $mail->SMTPSecure = 'ssl';  // encryption TLS/SSL kiểu mã hóa
      $mail->Port = 465;  // port to connect to nếu kiểu ssl thì port dùng 465 nếu là TLS thì port là 587              
      $mail->setFrom('demowess@gmail.com', 'adwjdow adkwm' );   // địa chỉ mail của người gủi và tên người gủi
      $mail->addAddress($gmail, ''); //mail và tên người nhận  có thể để nhiều
      $mail->isHTML(true);  // trong nội dung thư có thẻ html không
      $mail->Subject = 'Tiêu đề thư'; //Tiêu đề thư
      $noidungthu = '<h2>Nội dung thư</h2><br><hr><p>điền nội dung ở đây</p>'; //Nội dung thư
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