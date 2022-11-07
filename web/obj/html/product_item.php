<?php
    session_start();
    require ('../classes/dbConnection.php');
    $dbConnection = new dbConnection();
    $conn = $dbConnection->getConnection();
    if(!isset($_GET['id']))
    {
        echo "lỗi trang";exit;
    }
        // echo "lỗi trang";exit;
    $sql ="SELECT sanpham.id as sp_id , sanpham.name as sp_name, sanpham.mota as sp_mota , sanpham.gia as sp_gia,sanpham.img as img, danhmuc.name as cat_name  ,  sanpham.soluong sp_soluong  FROM sanpham , danhmuc WHERE sanpham.danhmuc_id = danhmuc.id AND deleted=1 and sanpham.id= ".$_GET['id']."  ";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        
    }
    else
    {
        echo " lỗi : không tìm thấy sản phẩm <br> <a href= './index.php' >về trang chủ</a> ";exit;
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/trangchu.css">
    <script src="https://code.iconify.design/iconify-icon/1.0.0-beta.3/iconify-icon.min.js"></script>
    <title>product</title>
</head>

<body>
    <!--header-->
    <?php
        require_once("../component/hea_der.php")
    ?>
    <br>
    <div style=" width: 100%; aspect-ratio: 65/1;">
        
    </div>

    <div class="container row" style="margin: auto;">
        <div class="col-md-7" style="border-right:solid 1px rgb(169, 169, 169) ;">
           
            <div>
                <img src="<?=$row['img']?>"
                    style="width: 70%; aspect-ratio: 2/2;" alt="">
                <center><i><?=$row['sp_name']?></i></center>
            </div>
            <p>
            <h4><b>Tác dụng của Niacinamide trong làm đẹp</b></h4>
            Hiện nay chưa có nhiều nghiên cứu cụ thể về tác động của vitamin B đến kích thước lỗ chân lông. Tuy nhiên
            niacinamide thì lại có tác dụng rõ ràng trong việc thu nhỏ lỗ chân lông, giúp lỗ chân lông trở nên thông
            thoáng, đẩy lùi tình trạng bít tắc. Sử dụng theo thời gian cùng với hoạt động tế bào, lỗ chân lông được làm
            sạch và duy trì bởi niacinamide sẽ khôi phục về kích thước ban đầu. Đối với niacinamide nồng độ cao cũng sẽ
            giúp cải thiện được tình trạng da sần sùi – vấn đề xảy ra khi lỗ chân lông phải chịu tác động từ các yếu tố
            như ánh nắng mặt trời hoặc khói bụi.
            <!-- <div>
                <br>
                <img src="../image/tac-dung-tuyet-voi-cua-niacinamide-trong-chu-trinh-cham-soc-da-2.jpg"
                    style="width: 90%; aspect-ratio: 3/2;" alt="">
                <center><i> ảnh minh họa </i></center>
                <br>
            </div> -->
            Hàng rào bảo vệ da giúp da hạn chế và tránh khỏi những xâm nhập có hại từ môi trường bên ngoài khiến làn da
            mất cân bằng ẩm. Sự có mặt và tham gia của niacinamide trong chu trình chăm sóc da sẽ giúp tái tạo và củng
            cố hàng rào bảo vệ da trở nên kiên cố, sản sinh các ceramide để lấy lại sự trẻ trung, mềm mịn vốn có của làn
            da.
            </p>
            <div style="float: right ;">Nguồn: Tổng hợp</div>
            <br>
            <div style="clear: right ;">
                <small>
                    <b>Lưu ý:</b>
                    Thông tin trong bài viết chỉ mang tính chất tham khảo, vui lòng
                    liên hệ với Bác sĩ, Dược
                    sĩ hoặc
                    chuyên viên y tế để được tư vấn cụ thể.
                </small>
            </div>
            <hr>
            <br>
            <div class="row" style="display: flex;
            justify-content: space-evenly;">
                <h4>Bài viết liên quan</h4>
                <hr>
                <div class="col-md-3">
                    <img src="../image/da-bi-chay-nang-dung-lam-nhung-dieu-nay-UalHI-1515062804_small.jpg" style="    width: 100%;
                    aspect-ratio: 3/2;" alt="">
                    <small>
                        Da bị cháy nắng: đừng làm những điều này để tình hình tệ hơn
                        <small>Thứ Sáu ngày 29/09/2017</small>
                    </small>
                </div>
                <div class="col-md-3">
                    <img src="../image/da-bi-chay-nang-dung-lam-nhung-dieu-nay-UalHI-1515062804_small.jpg" style="    width: 100%;
                    aspect-ratio: 3/2;" alt="">
                    <small>
                        Da bị cháy nắng: đừng làm những điều này để tình hình tệ hơn
                        <small>Thứ Sáu ngày 29/09/2017</small>
                    </small>
                </div>
                <div class="col-md-3">
                    <img src="../image/da-bi-chay-nang-dung-lam-nhung-dieu-nay-UalHI-1515062804_small.jpg" style="    width: 100%;
                    aspect-ratio: 3/2;" alt="">
                    <small>
                        Da bị cháy nắng: đừng làm những điều này để tình hình tệ hơn
                        <small>Thứ Sáu ngày 29/09/2017</small>
                    </small>
                </div>
            </div>
        </div>

        <div class="col-md-5">
            <h4 style="color: #072d94; "><?=$row['sp_name']?></h4>
            <hr >
            <h4>giá: <?=number_format($row["sp_gia"],0,",",".")?> đ</h4>
            
            <div>
                <b>danh mục: </b> <i style="color: #1d48ba;"> <?= $row['cat_name']?></i>
            </div>
            <b>công dụng: </b>
            <div style=" width: 100%; aspect-ratio: 21/10;">
                <p><?=$row['sp_mota']?> </p>
            </div>
            chọn ố lượng: <input form="them"  style="width: 10%; border-radius: 25px;"  type="number" name="soluong" id="" min=1 value="1">
            <form   id="them" action=""  method="POST">
                <input type="submit" name="" id="" value="thêm vào giỏ hàng">
            </form>

            
        </div>
    </div>

    <br>
    <hr>
    <br>
    <!--footer-->
    <?php
        require_once("../component/footer.php")
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
</body>

</html>