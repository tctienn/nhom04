   
<?php
    // include '../../../../../functions/Upload_file.php';
    if( $_FILES['img']['name'][0]==""){
       $ss="https://www.studytienganh.vn/upload/2021/05/98140.png";
        // echo "lỗi upload file (demoupload2)";exit;
    }
    else
    {

        require_once ("../../../../functions/Upload_file.php"); 
    
        $uploadeFiles = $_FILES['img']; //biến mảng toàn cục $_FILES // là name của input type file
        $errors = uploadFiles($uploadeFiles);
        // $baseURL = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        $baseURL='http://localhost/monwebnangcao/obj_clone/nhom04/web/obj/admin/template/pages/blog/';
     
        // var_dump($baseURL);exit;
        // $allFiless = getAllFiles();
        if(!empty($errors))
        {     
                $ss= $baseURL.$errors ;   
        }
        
        
    }

    if( $_FILES['img2']['name'][0]==""){
        $ss2="https://www.studytienganh.vn/upload/2021/05/98140.png";
         // echo "lỗi upload file (demoupload2)";exit;
     }
     else
     {
 
         require_once ("../../../../functions/Upload_file.php"); 
     
         $uploadeFiles = $_FILES['img2']; //biến mảng toàn cục $_FILES // là name của input type file
         $errors = uploadFiles($uploadeFiles);
         // $baseURL = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
         $baseURL='http://localhost/monwebnangcao/obj_clone/nhom04/web/obj/admin/template/pages/blog/';
      
         // var_dump($baseURL);exit;
         // $allFiless = getAllFiles();
         if(!empty($errors))
         {     
                 $ss2= $baseURL.$errors ;   
         }
         
         
     }

?>
