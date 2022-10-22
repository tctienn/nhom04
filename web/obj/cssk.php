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
        <?php
            require_once ("component/hea_der.php")
        ?>

        <!--end header-->

        <!--natbar-->
        <nav class="navbar navbar-expand-lg"
            style="  --bs-bg-opacity: 0; z-index: 2; background-color: white; box-shadow: 0 2px 15px -10px black;">
            <div class="container" style="width: 80%;">

                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                thực phẩm chức năng
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
                                                    src="../image/thao-duoc-thuc-pham-tu-nhien.webp" alt=""> Thảo dược
                                                và thực phẩm tự nhiên</a></li>
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
                                                    src="../image/thao-duoc-thuc-pham-tu-nhien.webp" alt=""> Thảo dược
                                                và thực phẩm tự nhiên</a></li>
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
                Bán Chạy Nhất
            </h5>

           
            </div>
        </div>
        <!--end product-->
        <!--blogs-->
       
           
           
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

        </div>
        <!--end poster-->

        <!--food-->
        <div class="food row">
            <ul style="list-style-type: none; padding: 0;">
                <li class="col-md-2">
                    <b>VỀ CHÚNG TÔI</b>
                    <a href="#">Giới thiệu</a>
                    <a href="#">Hệ thống cửa hàng</a>
                    <a href="#">Giấy phép kinh doanh</a>
                    <a href="#">Quy chế hoạt động</a>
                    <a href="#">Chính sách đặt cọc</a>
                    <a href="#">Chính sách đổi trả thuốc</a>
                    <a href="#">Chính sách giao hàng</a>
                    <a href="#">Chính sách bảo mật</a>
                    <a href="#">Chính sách thanh toán</a>
                    <a href="#">Kiểm tra hóa đơn điện tử</a>
                    <a href="#">Tra cứu đơn hàng</a>
                </li>
                <li class="col-md-2"></li>
                <li class="col-md-2"></li>
                <li class="col-md-2"></li>
                <li class="col-md-2"></li>
            </ul>
        </div>
        <!--end food-->

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
            crossorigin="anonymous"></script>

    </div>
</body>

</html>