   
<a href="../../index_admin.php" style="color: black;  ">admin ></a>
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
                    <input type="file" name="file[]" id="" value="<?= $img?>">
                      
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
        if(!empty($allFiless))
        {
            foreach($allFiless as $file)
            {
                // var_dump($file);exit;
                ?>
                    <ul id="gallery">
                        <li style="width: 500px; aspect-ratio: 2/2; border: solid 1px black;">
                        <?php $ss= $baseURL.$file ; ?>
                            <img style="width: 100%; height:80%; " src="<?= $file?>">
                            <input style="width:100%" type="text" name="" value=<?= $ss?> id="">
                            <a href="./delete_img.php?url=<?=urldecode($file)?>"> xóa </a>
                        </li>
                    </ul>
                <?php
            }
        }
        

    ?>
