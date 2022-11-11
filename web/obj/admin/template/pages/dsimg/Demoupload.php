   
<a href="../../index_admin.php" style="color: black;  ">admin ></a> <a href='Demoupload.php'>upload thêm ảnh</a>
<?php
    // include '../../../../../functions/Upload_file.php';
    require_once ("../../../../functions/Upload_file.php"); 
    if(isset($_GET['upload'])&& $_GET['upload']=='file')
    {
        // var_dump($_FILES['file_upload']);exit;
        $uploadeFiles = $_FILES['file_upload']; //biến mảng toàn cục $_FILES // là name của input type file
        $errors = uploadFiles($uploadeFiles);
        if(!empty($errors))  //hamf empty để kiểm tra dữ liệu rỗng
        {
            print_r($errors); //sẽ in biến ra thông tin của biến truyền vào một cách dễ hiểu đối với người sử dụng.
            exit;  // thoat ra khỏi chương  trình
        }
        else{
            echo "upload thành công <a href='Demoupload.php'>upload thêm ảnh</a> " ;
        }

    }
    else{
        ?>
        <div>
            <fieldset>
                <legend>updoad file</legend>
                <form action="?upload=file" method="post" enctype="multipart/form-data" > 
                    <input multiple  type="file" name="file_upload[]" id=""><!-- multiple : để có thể up được nhiều ảnh , cần để name có đuôi [] để nhận dạng up nhiều ảnh nếu ko ảnh bị đè nhau -->  
                    
                      
                    <input type="submit" value="upload file">
                </form>
            </fieldset>
        </div>
         <?php
    }
?>
    <h2>Danh sách ảnh</h2>
    <?php
    // $baseURL = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    $baseURL='http://localhost/monwebnangcao/obj_clone/nhom04/web/obj/admin/template/pages/forms/';
    // var_dump($baseURL);exit;
        $allFiless = getAllFiles();
        ?><ul id="gallery" style="display: flex; justify-content: space-evenly; flex-wrap: wrap;}" ><?php
        if(!empty($allFiless))
        {
            foreach($allFiless as $file)
            {
                // var_dump($file);exit;
                ?>
                    
                        <li style="width: 200px; aspect-ratio: 2/2; border: solid 1px black; list-style-type: none;">
                        <?php $ss= $baseURL.$file ; ?>
                            <img style="width: 100%; height:80%; " src="<?= $file?>">
                            <input style="width:100%" type="text" name="" value=<?= $ss?> id="">
                            <a href="./delete_img.php?url=<?=urldecode($file)?>"> xóa </a>
                        </li>
                    
                <?php
            }
        }
        

    ?>
             </ul>



<?php
    function getAllFiles2(){
        $allFiles = array();
        $allDirs =glob('../sanpham/uploads/*');
        $a=0;
        foreach($allDirs as $dir){
            // echo "<pre>", var_dump($dir.'/*'), "</pre>";exit;
            $allFiles = array_merge($allFiles, glob($dir . "/*"));
            $a++;

        }
        // echo "asadwd " .$a;
        // var_dump($allFiles);
        return $allFiles;
    }
?>



    <h2>Danh sách ảnh sản phẩm</h2>
    <?php
    // $baseURL = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    $baseURL='http://localhost/monwebnangcao/obj_clone/nhom04/web/obj/admin/template/pages/forms/';
    // var_dump($baseURL);exit;
        $allFiless = getAllFiles2();
        ?><ul id="gallery" style="display: flex; justify-content: space-evenly; flex-wrap: wrap;}" ><?php
        if(!empty($allFiless))
        {
            foreach($allFiless as $file)
            {
                // var_dump($file);exit;
                ?>
                    
                        <li style="width: 200px; aspect-ratio: 2/2; border: solid 1px black; list-style-type: none;">
                        <?php $ss= $baseURL.$file ; ?>
                            <img style="width: 100%; height:80%; " src="<?= $file?>">
                            <input style="width:100%" type="text" name="" value=<?= $ss?> id="">
                            <a href="./delete_img.php?url=<?=urldecode($file)?>"> xóa </a>
                        </li>
                    
                <?php
            }
        }
        

    ?>
             </ul>
