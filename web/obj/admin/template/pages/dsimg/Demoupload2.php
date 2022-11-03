   
<?php
    // include '../../../../../functions/Upload_file.php';
    if( $_FILES['file']['name'][0]==""){

        // echo $_FILES['file']['name'][0];
        // var_dump($_FILES['file']['name'][0]);exit;
       $ss=$oldimg;
        // echo "lỗi upload file (demoupload2)";exit;
    }
    else
    {
        
        
    
    require_once ("../../../../functions/Upload_file.php"); 
    
        // var_dump($_FILES['file_upload']);exit;
        // if($_FILES['file']==null)
        // {

        // }
        $uploadeFiles = $_FILES['file']; //biến mảng toàn cục $_FILES // là name của input type file
        $errors = uploadFiles($uploadeFiles);
        // if(!empty($errors))  //hamf empty để kiểm tra dữ liệu rỗng
        // {
        //     print_r($errors); //sẽ in biến ra thông tin của biến truyền vào một cách dễ hiểu đối với người sử dụng.
        //     exit;  // thoat ra khỏi chương  trình
        // }
        // else{
        //     // echo "upload thành công  " ;
        // }



?>
    
    <?php
    // $baseURL = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    $baseURL='http://localhost/monwebnangcao/obj_clone/nhom04/web/obj/admin/template/pages/sanpham/';
     
    // var_dump($baseURL);exit;
        // $allFiless = getAllFiles();
        if(!empty($errors))
        {
            
                $ss= $baseURL.$errors ;
                
                // var_dump($ss);exit;
               
            
        }
        
    }
    
?>
