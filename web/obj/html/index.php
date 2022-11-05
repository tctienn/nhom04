<!--  -->
<?php
    session_start();
    $_SESSION['loc']="";
    $arr = array();
    $pro = new stdclass;
    $pro->id="";
    $pro->cout=0;
    if(!isset($_SESSION['cart']))
        {           
            $_SESSION['cart']=$arr;
        }
        else 
            if(isset($_GET['cart']) && $_GET['cart']="true")
            {
                if(isset($_GET['id']))
                {
                    $a=0;
                    for($i=0;$i<count($_SESSION['cart']);$i++)
                    {
                        if($_SESSION['cart'][$i]->id==$_GET['id'])
                        {
                            $a=1;
                            $_SESSION['cart'][$i]->cout+=1;
                        }
                    }
                    if($a!=1)
                    {
                        $pro->id=$_GET['id'];
                        $pro->cout=1;
                        array_push($_SESSION['cart'], $pro);
                    }
                    
                }
                
            }

        // echo count($_SESSION['cart']);
        // echo var_dump($_SESSION['cart']);exit;


    // }
    // product();
    // $_SESSION['cart']=$pro;

    // echo $_SESSION['cart']->cout;
    // $_SESSION['cart']=$pro->id="";
    
    if(!isset($_SESSION['login']))
        $_SESSION['login']='0';
    require ('../classes/dbConnection.php');
    if(isset($_GET['trang']))
    {
        $trang=$_GET['trang']*15;
    }
    else
    {
        $trang=0;
    }

     // hàm lọc
     $loc="";
     function loc(){
        if(isset($_GET['loc']))
        {
            
            
            return $loc="and danhmuc.id=".$_GET['loc'];
            // var_dump($loc);
        }
        else
        {
            // echo "uiii";
            return $loc="";
        }
    }
    // $loc="and danhmuc.id=".$_GET['loc'];
    $dbConnection = new dbConnection();
    $conn = $dbConnection->getConnection(); $loc=loc();
    if(isset($_GET['loc']))
    {
        $_SESSION['loc']="&loc=".$_GET['loc'];
    }
    
    // $sql = "SELECT * FROM sanpham where deleted=1 ORDER BY id ASC limit ".$trang.",15 ";
    $sql ="SELECT sanpham.id as sp_id , sanpham.name as sp_name, sanpham.mota as sp_mota , sanpham.gia as sp_gia,sanpham.img as img, danhmuc.name as cat_name  ,  sanpham.soluong sp_soluong  FROM sanpham , danhmuc WHERE sanpham.danhmuc_id = danhmuc.id AND deleted=1 and deleted=1 ".$loc." ORDER BY sanpham.id ASC limit ".$trang.",15 ";
    

    //lấy slide
    $slide_sql="SELECT sanpham.id as sp_id , sanpham.name as sp_name, sanpham.mota as sp_mota , sanpham.gia as sp_gia,sanpham.img as img, danhmuc.name as cat_name  ,  sanpham.soluong sp_soluong  FROM sanpham , danhmuc WHERE sanpham.danhmuc_id = danhmuc.id AND deleted=1 and danhmuc.name= 'thuốc bổ' ORDER BY sanpham.id ASC  limit 5 ";
    $slide_result = $conn->query($slide_sql);
    
    

    


   
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

    <title>Document</title>
</head>

<body>
    
    <div class="container-fluid">
        <!--header-->
        <!-- <div class="container-fluid" style="padding: 0; "> -->
        <!--header-->
        <div class="container-fluid" id="header">
            <div class="container row" id="onhead">
                <div class="col-md-7">
                    <div class="logo row">
                        
                        <i> nhà thuốc</i>
                        <b>Long Châu</b>
                    </div>
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

                    <p style="">
                        <a href="#" style="color: white; text-decoration: none;" ><?=$_SESSION['username']?></a>
                        
                    </p>
                    
                </div>
            </div>
        </div>
        <div class="container-fluid " id="header2"></div>

        <!--end header-->
       
        <!--natbar-->
        <nav class="navbar navbar-expand-lg"
            style="  --bs-bg-opacity: 0; z-index: 2; background-color: white; box-shadow: 0 2px 15px -10px black; width: 100%; position: fixed;">
            <div class="container" style="width: 80%;">

                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                thực phẩm chức năng
                            </a>
                            <div class="dropdown-menu" >
                                <div>
                                    <ul style="border-right: solid 1px black ; width: 30%; ">
                                        <li><a class="dropdown-item" href="#"><img id="img_mt"
                                                    src="../image/sinh-ly-noi-tiet-to.webp" alt=""> sinh lý -Nội tiết
                                                tố</a></li>
                                        <li><a class="dropdown-item" href="#"><img id="img_mt"
                                                    src="../image/tim-mach-huyet-ap.webp" alt=""> Sức khỏe tim mạch</a>
                                        </li>
                                        <li><a class="dropdown-item" href="#"><img id="img_mt"
                                                    src="../image/ho-tro-tieu-hoa.webp" alt=""> Hỗ trợ tiêu hóa</a></li>
                                        <li><a class="dropdown-item" href="#"><img id="img_mt"
                                                    src="../image/than-kinh-nao.webp" alt=""> Thần kinh não</a></li>
                                        <li><a class="dropdown-item" href="#"><img id="img_mt"
                                                    src="../image/ho-tro-dieu-tri.webp" alt=""> Hỗ trợ điều trị</a></li>
                                        <li><a class="dropdown-item" href="#"><img id="img_mt"
                                                    src="../image/cai-thien-tang-cuong-chuc-nang.webp" alt=""> Cải thiện
                                                tăng cường chức năng</a></li>
                                        <li><a class="dropdown-item" href="?loc=19"><img id="img_mt"
                                                    src="../image/thao-duoc-thuc-pham-tu-nhien.webp" alt=""> Thảo dược.</a></li>
                                        <li><a class="dropdown-item" href="?loc=18"><img id="img_mt"
                                                    src="../image/lam-dep.webp" alt=""> Hỗ trợ làm đẹp.</a></li>
                                        <li><a class="dropdown-item" href="?loc=2"><img id="img_mt"
                                                    src="../image/vitamin-va-khoang-chat.webp" alt=""> thuốc bổ. </a></li>
                                        <li><a class="dropdown-item" href="#"><img id="img_mt"
                                                    src="../image/dinh-duong.webp" alt=""> Dinh dưỡng</a></li>


                                    </ul>
                                </div>
                                <div>

                                </div>
                            </div>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Dược mỹ phẩm
                            </a>
                            <div class="dropdown-menu">
                                <div>
                                    <ul style="border-right:solid 1px black ; width: 30%;">
                                        <li><a class="dropdown-item" href="#"><img id="img_mt"
                                                    src="../image/sinh-ly-noi-tiet-to.webp" alt=""> sinh lý -Nội tiết
                                                tố</a></li>
                                        <li><a class="dropdown-item" href="#"><img id="img_mt"
                                                    src="../image/tim-mach-huyet-ap.webp" alt=""> Sức khỏe tim mạch</a>
                                        </li>
                                        <li><a class="dropdown-item" href="#"><img id="img_mt"
                                                    src="../image/ho-tro-tieu-hoa.webp" alt=""> Hỗ trợ tiêu hóa</a></li>
                                        <li><a class="dropdown-item" href="#"><img id="img_mt"
                                                    src="../image/than-kinh-nao.webp" alt=""> Thần kinh não</a></li>
                                        <li><a class="dropdown-item" href="#"><img id="img_mt"
                                                    src="../image/ho-tro-dieu-tri.webp" alt=""> Hỗ trợ điều trị</a></li>
                                        <li><a class="dropdown-item" href="#"><img id="img_mt"
                                                    src="../image/cai-thien-tang-cuong-chuc-nang.webp" alt=""> Cải thiện
                                                tăng cường chức năng</a></li>
                                        <li><a class="dropdown-item" href="#"><img id="img_mt"
                                                    src="../image/thao-duoc-thuc-pham-tu-nhien.webp" alt=""> Thảo dược.</a></li>
                                        <li><a class="dropdown-item" href="#"><img id="img_mt"
                                                    src="../image/lam-dep.webp" alt=""> Hỗ trợ làm đẹp</a></li>
                                        <li><a class="dropdown-item" href="#"><img id="img_mt"
                                                    src="../image/vitamin-va-khoang-chat.webp" alt=""> Vitamin & khoáng
                                                chất</a></li>
                                        <li><a class="dropdown-item" href="#"><img id="img_mt"
                                                    src="../image/dinh-duong.webp" alt=""> Dinh dưỡng</a></li>


                                    </ul>
                                </div>
                                <div>

                                </div>
                            </div>
                        </li>

                        

                        
                     
                    </ul>
                </div>
            </div>
        </nav>
        <!--end natbar-->

        <!--slide-->
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel" style=" z-index: 0;">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="../image/1660631916-hm3L-uu-dai-biore-20.webp" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="../image/1659455539-uGqp-chuyen-trang-sanofi.webp" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="../image/1658467715-tm6o-dac-quyen-mua-hang-1k.webp" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <!--end slide-->
        <!--endheader-->

        <!--search-->
        <div class="container" style="z-index: 1;">
            <nav class="navbar bg-light" style="  --bs-bg-opacity: 0;">

                <div class="container_search">
                    <div style="width: 63%; margin: auto;  border-radius: 10px;">
                        <form class="d-flex" role="search">
                            <input class="form-control me-2" style="border-radius: 20px 0 0 20px;" type="search"
                                placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success" style="border-radius: 0 20px 20px 0;"
                                type="submit">Search</button>
                        </form>
                    </div>
                </div>

            </nav>
        </div>
        <!--end search-->

        <!--render-->
        <div class="row">
            <center>
                <h3>Mua Thuốc Dễ Dàng Tại Long Châu</h3>
                <br>
                <div class="render_body">
                    <ul class="ul_render">
                        <li class="col-md-3 li_render">
                            <img src="../image/chuptoathuoc.webp" alt="">
                            <br><br>
                            <h5>CHỤP TOA THUỐC</h5>
                            đơn giản & nhanh chóng
                        </li>
                        <div style="border-left:solid 1px #b7adad ;"></div>
                        <li class="col-md-3 li_render">
                            <img src="../image/info-ct.webp" alt="">
                            <br><br>
                            <h5>NHẬP THÔNG TIN LIÊN LẠC</h5>
                            để được tư vấn đặt hàng
                        </li>
                        <div style="border-left:solid 1px #b7adad ;"></div>
                        <li class="col-md-3 li_render">
                            <img src="../image/duoc-sy.webp" alt="">
                            <br><br>
                            <h5>NHẬP THÔNG TIN LIÊN LẠC</h5>
                            để được tư vấn đặt hàng
                        </li>
                    </ul>
                    <a class="btn btn-primary" href="#" role="button"
                        style="background-color: #1d48ba;width: 19%;border-radius: 24px;">
                        mua thuốc ngay
                    </a>
                    <a href=" tel:0984586393 " title="Liên hệ nhanh" style="text-decoration: none ;">Hoặc mua qua
                        hotline <b>1800 69xx</b></a>
                </div>
            </center>

        </div>
        <!--end render-->
        <br>
        <!--blog-->

        <a href="#" class="blog"></a>
        <!--end blog-->

        <br>

        <!--slide product-->
        <div class="productSlide">
            <div id="carouselExampleIndicators" style="width: 78%; margin: auto;" class="carousel slide"
                data-bs-ride="true">
                <br>
                <div style="margin-left: 2.5%;">
                    <h5 style="color: white; display: flex;">
                        <iconify-icon icon="ic:baseline-health-and-safety" style="color: white;" width="25">
                        </iconify-icon>
                        Sản Phẩm Tăng Sức Đề Kháng
                    </h5>
                </div>
                <br>
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                        class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <!-- <img src="" class="d-block w-100" alt="..."> -->
                        <div class="onslide  row">
                        <!-- <img src="" class="d-block w-100" alt="..."> -->
                        <?php
                            if ($slide_result->num_rows > 0) 
                                while ($row = $slide_result->fetch_assoc()){
                                    ?>
                                        
                                        <div class="item_product col-md-2 ">
                                            <img class="img_slide" src="../image/00008138-xisat-kid-75ml-8547-5bf4_large.webp"
                                                alt="">
                                            <p><?=$row['sp_name']?></p>
                                            <p>
                                                <b><?=$row['sp_gia']?></b>/chai
                                            </p>
                                        </div>
                                    <?php
                                }
                        ?>
                        
                            <!-- <div class="item_product col-md-2 ">
                                <img class="img_slide" src="../image/00008138-xisat-kid-75ml-8547-5bf4_large.webp"
                                    alt="">
                                <p>bộ vệ sinh mũi</p>
                                <p>
                                    <b>399.000đ</b>/chai
                                </p>
                            </div>

                            <div class="item_product col-md-2 ">
                                <img class="img_slide" src="../image/00008138-xisat-kid-75ml-8547-5bf4_large.webp"
                                    alt="">
                                <p>bộ vệ sinh mũi</p>
                                <p>
                                    <b>399.000đ</b>/chai
                                </p>
                            </div>

                            <div class="item_product col-md-2 ">
                                <img class="img_slide" src="../image/00008138-xisat-kid-75ml-8547-5bf4_large.webp"
                                    alt="">
                                <p>bộ vệ sinh mũi</p>
                                <p>
                                    <b>399.000đ</b>/chai
                                </p>
                            </div>

                            <div class="item_product col-md-2 ">
                                <img class="img_slide" src="../image/00008138-xisat-kid-75ml-8547-5bf4_large.webp"
                                    alt="">
                                <p>bộ vệ sinh mũi</p>
                                <p>
                                    <b>399.000đ</b>/chai
                                </p>
                            </div> -->
                        </div>
                    </div>

                    <div class="carousel-item">
                        <!-- <img src="" class="d-block w-100" alt="..."> -->
                        <div class="onslide  row">
                            <!-- <img src="" class="d-block w-100" alt="..."> -->
                            <div class="item_product col-md-2 ">
                                <img class="img_slide" src="../image/00008138-xisat-kid-75ml-8547-5bf4_large.webp"
                                    alt="">
                                <p>bộ vệ sinh mũi</p>
                                <p>
                                    <b>399.000đ</b>/chai
                                </p>
                            </div>

                            <div class="item_product col-md-2 ">
                                <img class="img_slide" src="../image/00008138-xisat-kid-75ml-8547-5bf4_large.webp"
                                    alt="">
                                <p>bộ vệ sinh mũi</p>
                                <p>
                                    <b>399.000đ</b>/chai
                                </p>
                            </div>

                            <div class="item_product col-md-2 ">
                                <img class="img_slide" src="../image/00008138-xisat-kid-75ml-8547-5bf4_large.webp"
                                    alt="">
                                <p>bộ vệ sinh mũi</p>
                                <p>
                                    <b>399.000đ</b>/chai
                                </p>
                            </div>

                            <div class="item_product col-md-2 ">
                                <img class="img_slide" src="../image/00008138-xisat-kid-75ml-8547-5bf4_large.webp"
                                    alt="">
                                <p>bộ vệ sinh mũi</p>
                                <p>
                                    <b>399.000đ</b>/chai
                                </p>
                            </div>

                            <div class="item_product col-md-2 ">
                                <img class="img_slide" src="../image/00008138-xisat-kid-75ml-8547-5bf4_large.webp"
                                    alt="">
                                <p>bộ vệ sinh mũi</p>
                                <p>
                                    <b>399.000đ</b>/chai
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="carousel-item">
                        <!-- <img src="" class="d-block w-100" alt="..."> -->
                        <div class="onslide  row">
                            <!-- <img src="" class="d-block w-100" alt="..."> -->
                            <div class="item_product col-md-2 ">
                                <img class="img_slide" src="../image/00008138-xisat-kid-75ml-8547-5bf4_large.webp"
                                    alt="">
                                <p>bộ vệ sinh mũi</p>
                                <p>
                                    <b>399.000đ</b>/chai
                                </p>
                            </div>

                            <div class="item_product col-md-2 ">
                                <img class="img_slide" src="../image/00008138-xisat-kid-75ml-8547-5bf4_large.webp"
                                    alt="">
                                <p>bộ vệ sinh mũi</p>
                                <p>
                                    <b>399.000đ</b>/chai
                                </p>
                            </div>

                            <div class="item_product col-md-2 ">
                                <img class="img_slide" src="../image/00008138-xisat-kid-75ml-8547-5bf4_large.webp"
                                    alt="">
                                <p>bộ vệ sinh mũi</p>
                                <p>
                                    <b>399.000đ</b>/chai
                                </p>
                            </div>

                            <div class="item_product col-md-2 ">
                                <img class="img_slide" src="../image/00008138-xisat-kid-75ml-8547-5bf4_large.webp"
                                    alt="">
                                <p>bộ vệ sinh mũi</p>
                                <p>
                                    <b>399.000đ</b>/chai
                                </p>
                            </div>

                            <div class="item_product col-md-2 ">
                                <img class="img_slide" src="../image/00008138-xisat-kid-75ml-8547-5bf4_large.webp"
                                    alt="">
                                <p>bộ vệ sinh mũi</p>
                                <p>
                                    <b>399.000đ</b>/chai
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- <div class="carousel-item ">
                        <img src="../image/1659455539-uGqp-chuyen-trang-sanofi.webp" class="d-block w-100" alt="...">
                    </div> -->
                    <!-- <div class="carousel-item">
                        <img src="../image/1658467715-tm6o-dac-quyen-mua-hang-1k.webp" class="d-block w-100" alt="...">
                    </div> -->
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="prev">
                    <iconify-icon icon="uil:angle-left-b"
                        style="border: solid 2px #9b9b9b;border-radius: 26px;border: solid 2px #9b9b9b;border-radius: 26px;color: #000000;background-image: none;"
                        width="27"></iconify-icon>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                    data-bs-slide="next">
                    <iconify-icon icon="uil:angle-right-b"
                        style="border: solid 2px #9b9b9b;border-radius: 26px;border: solid 2px #9b9b9b;border-radius: 26px;color: #000000;background-image: none;"
                        width="27"></iconify-icon>
                    <span class="visually-hidden">Next</span>
                </button>
                <br>
            </div>
        </div>
        <!--end slide product-->
        <br>
        <!--product-->
        <div class="product">
            <h5 style="display: flex;">
                <div style="background-color: red;
                border-radius: 29px;
                width: 24px;
                aspect-ratio: 2/2;
                display: flex;
                align-items: center;
                justify-content: center;">
                    <iconify-icon icon="bi:fire" style="color: white; " width="15"></iconify-icon>
                </div>
                &nbsp;
                sản phẩm <?php if(isset($_GET['loc'])){echo "lọc theo id danh mục: ". $_GET['loc'];}?>
            </h5>

            <div  style="width: 100%; display: flex; justify-content: space-evenly; flex-wrap: wrap; ">
            <?php
                $result = $conn->query($sql);
    
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        ?>
                             <div id="product" class="item_product2">
                                
                                <div class="imgproduct"><img class="img_product" src="<?=$row['img']?>" alt=""></div>
                                <input type="text" style="border: none;" readonly value="<?= $row['sp_name']?>">
                                <p>
                                    <b><?=$row['sp_gia']?>đ</b>/hộp
                                </p>
                                <a href="?cart=true&id=<?=$row['sp_id']?>"><iconify-icon class="shopping-cart" icon="el:shopping-cart" style="color: black; margin-top: -15px; float: right;" width="27"height="31"></iconify-icon> </a>
                            </div>
                        <?php
                    }
                }

            ?>

                <!-- <div class="item_product2">
                    <img class="img_product" src="../image/00021988-anica-phytextra-60v-7325-62ae_large.webp" alt="">
                    <p>Viên Uống Bổ Sung Canxi</p>
                    <p>
                        <b>517.000đ</b>/hộp
                    </p>
                </div>
                <div class="item_product2">
                    <img class="img_product" src="../image/00021988-anica-phytextra-60v-7325-62ae_large.webp" alt="">
                    <p>Viên Uống Bổ Sung Canxi</p>
                    <p>
                        <b>517.000đ</b>/hộp
                    </p>
                </div>
                <div class="item_product2">
                    <img class="img_product" src="../image/00021988-anica-phytextra-60v-7325-62ae_large.webp" alt="">
                    <p>Viên Uống Bổ Sung Canxi</p>
                    <p>
                        <b>517.000đ</b>/hộp
                    </p>
                </div>
                <div class="item_product2">
                    <img class="img_product" src="../image/00021988-anica-phytextra-60v-7325-62ae_large.webp" alt="">
                    <p>Viên Uống Bổ Sung Canxi</p>
                    <p>
                        <b>517.000đ</b>/hộp
                    </p>
                </div>
                <div class="item_product2">
                    <img class="img_product" src="../image/00021988-anica-phytextra-60v-7325-62ae_large.webp" alt="">
                    <p>Viên Uống Bổ Sung Canxi</p>
                    <p>
                        <b>517.000đ</b>/hộp
                    </p>
                </div>

                <div class="item_product2">
                    <img class="img_product" src="../image/00021988-anica-phytextra-60v-7325-62ae_large.webp" alt="">
                    <p>Viên Uống Bổ Sung Canxi</p>
                    <p>
                        <b>517.000đ</b>/hộp
                    </p>
                </div>
                <div class="item_product2">
                    <img class="img_product" src="../image/00021988-anica-phytextra-60v-7325-62ae_large.webp" alt="">
                    <p>Viên Uống Bổ Sung Canxi</p>
                    <p>
                        <b>517.000đ</b>/hộp
                    </p>
                </div>
                <div class="item_product2">
                    <img class="img_product" src="../image/00021988-anica-phytextra-60v-7325-62ae_large.webp" alt="">
                    <p>Viên Uống Bổ Sung Canxi</p>
                    <p>
                        <b>517.000đ</b>/hộp
                    </p>
                </div>
                <div class="item_product2">
                    <img class="img_product" src="../image/00021988-anica-phytextra-60v-7325-62ae_large.webp" alt="">
                    <p>Viên Uống Bổ Sung Canxi</p>
                    <p>
                        <b>517.000đ</b>/hộp
                    </p>
                </div>
                <div class="item_product2">
                    <img class="img_product" src="../image/00021988-anica-phytextra-60v-7325-62ae_large.webp" alt="">
                    <p>Viên Uống Bổ Sung Canxi</p>
                    <p>
                        <b>517.000đ</b>/hộp
                    </p>
                </div>

                <div class="item_product2">
                    <img class="img_product" src="../image/00021988-anica-phytextra-60v-7325-62ae_large.webp" alt="">
                    <p>Viên Uống Bổ Sung Canxi</p>
                    <p>
                        <b>517.000đ</b>/hộp
                    </p>
                </div>
                <div class="item_product2">
                    <img class="img_product" src="../image/00021988-anica-phytextra-60v-7325-62ae_large.webp" alt="">
                    <p>Viên Uống Bổ Sung Canxi</p>
                    <p>
                        <b>517.000đ</b>/hộp
                    </p>
                </div>
                <div class="item_product2">
                    <img class="img_product" src="../image/00021988-anica-phytextra-60v-7325-62ae_large.webp" alt="">
                    <p>Viên Uống Bổ Sung Canxi</p>
                    <p>
                        <b>517.000đ</b>/hộp
                    </p>
                </div>
                <div class="item_product2">
                    <img class="img_product" src="../image/00021988-anica-phytextra-60v-7325-62ae_large.webp" alt="">
                    <p>Viên Uống Bổ Sung Canxi</p>
                    <p>
                        <b>517.000đ</b>/hộp
                    </p>
                </div>
                <div class="item_product2">
                    <img class="img_product" src="../image/00021988-anica-phytextra-60v-7325-62ae_large.webp" alt="">
                    <p>Viên Uống Bổ Sung Canxi</p>
                    <p>
                        <b>517.000đ</b>/hộp
                    </p>
                </div> -->
            <!-- </> -->
        </div>
        <center>
            <br>
            <?php
                $sql2 = "SELECT * FROM sanpham where deleted=1 ";
                $sumrow = $conn->query($sql2);
                $sumrow = mysqli_num_rows( $sumrow)/15;
                $tranghientai=isset($_GET['trang'])?$_GET['trang']:0;
                for($i=0;$i<$sumrow;$i++)
                {
                if($tranghientai !=$i )
                    {
                    ?><a href="?trang=<?=$i?><?=$_SESSION['loc']?>" style="margin: 0 4px;" ><button style="border: solid 1px black;}"><?=$i?></button></a><?php
                    }
                else{
                    ?><a href="?trang=<?=$i?><?=$_SESSION['loc']?>" style="margin: 0 4px;" ><button style="color: white; border: solid 1px black;"><?=$i?></button></a><?php
                }
                
                }
                // echo "trang hien tai $tranghientai";
            ?>
        </center>
        <!--end product-->
        <!--blogs-->
        <div class="blogs row">
            <br>
            <h5 style="display: flex;">
                <div style="background-color: rgb(0, 18, 211);
                border-radius: 29px;
                width: 24px;
                aspect-ratio: 2/2;
                display: flex;
                align-items: center;
                justify-content: center;">
                    <iconify-icon icon="akar-icons:file" style="color: white;" width="15"></iconify-icon>
                </div>
                &nbsp;
                Góc Sức Khỏe
            </h5>
            <div class="col-md-6 big_blog">
                <img src="../image/bang-chi-so-thai-nhi-va-nhung-dieu-me-bau-can-biet-zjplT-1661584729_large (2).webp"
                    alt="">
                <div style="margin-left: 10px;">
                    <p>
                    <h4> Bảng Chỉ Số Thai Nhi Và Những Điều Mẹ Bầu Cần Biết</h4>
                    </p>
                </div>
            </div>
            <div class="container-fluid col-md-5">
                <ul class="row" style="list-style-type: none;
                padding: 0;
                display: flex;
                flex-direction: column;
                justify-content: space-between;
                height: 100%;">
                    <li class="small_blog">
                        <img src="../image/banh-trang-tron-bao-nhieu-calo-jtiYc-1661530582_medium.webp" class="col-md-4"
                            alt="">
                        <div>
                            <b>Thắc Mắc: Bánh Tráng Trộn Bao Nhiêu Calo?</b>
                        </div>
                    </li>
                    <li class="small_blog">
                        <img src="../image/banh-trang-tron-bao-nhieu-calo-jtiYc-1661530582_medium.webp" class="col-md-4"
                            alt="">
                        <div>
                            <b>Thắc Mắc: Bánh Tráng Trộn Bao Nhiêu Calo?</b>
                        </div>
                    </li>
                    <li class="small_blog">
                        <img src="../image/banh-trang-tron-bao-nhieu-calo-jtiYc-1661530582_medium.webp" class="col-md-4"
                            alt="">
                        <div>
                            <b>Thắc Mắc: Bánh Tráng Trộn Bao Nhiêu Calo?</b>
                        </div>
                    </li>
                    <li class="small_blog">
                        <img src="../image/banh-trang-tron-bao-nhieu-calo-jtiYc-1661530582_medium.webp" class="col-md-4"
                            alt="">
                        <div>
                            <b>Thắc Mắc: Bánh Tráng Trộn Bao Nhiêu Calo?</b>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <!--end blogs-->
        <!--poster-->

        <br>
        <div class="container-fluid" style="background-color: #edf2f8!important; padding: 0;">
            <br>
            <div class="noidung_postt">
                <ul class="ul_render" style="padding: 0;">
                    <li>
                        <img src="../image/drug-double.svg" alt="">
                        <div>
                            <b>THUỐC CHÍNH HÃNG</b> <br>
                            đa dạng và chuyên sâu
                        </div>
                    </li>
                    <div style="border-left:solid 1px #b7adad ;"></div>

                    <li>
                        <img src="../image/ic-reload-vector.svg" alt="">
                        <div>
                            <b>ĐỔI TRẢ TRONG 30 NGÀY</b> <br>
                            kể từ ngày mua hàng
                        </div>
                    </li>
                    <div style="border-left:solid 1px #b7adad ;"></div>

                    <li>
                        <img src="../image/ic-guarantee-vector.svg" alt="">
                        <div>
                            <b>CAM KẾT 100%</b> <br>
                            chất lượng sản phẩm
                        </div>
                    </li>
                    <div style="border-left:solid 1px #b7adad ;"></div>

                    <li>
                        <img src="../image/ic-shipping.svg" alt="">
                        <div>
                            <b>MIỄN PHÍ VẬN CHUYỂN</b> <br>
                            theo chính sách giao hàng
                        </div>
                    </li>
                </ul>

                <br>
                <a href="#" style="width: 78%;">
                    <img src="../image/banner-home-v2.webp" style="width: 100%;" alt="">
                </a>
            </div>
            <br><br>

        </div>
        <!--end poster-->
        <br>
        <!--food-->
        <?php
            require_once("../component/footer.php");
        ?>
        <!--end food-->

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
            crossorigin="anonymous"></script>

    </div>
</body>

</html>