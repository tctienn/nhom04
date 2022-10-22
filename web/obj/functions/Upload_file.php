<?php
    function getAllFiles(){
        $allFiles = array();
        $allDirs =glob('uploads/*');
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

    function uploadFiles($uploadedFiles){
        $files = array();
        $errors = array();
        // var_dump($uploadedFiles);exit;
        // xử lý gom dữ liệu vào từng file đã updload
        foreach($uploadedFiles as $key => $values){ //lấy valu và key tạo mảng mới (giễ nhìn)
            foreach($values as $index => $value){
                $files[$index][$key]=$value;
            }
        }
        // echo "<pre>", var_dump($files), "</pre>";exit;
        $uploadPath= "./uploads/" .date('d-m-y',time());  // lấy thông tin  tạo tên forder
        if(!is_dir($uploadPath)){ // is_dir sẽ kiểm tra xem đường dẫn truyền vào có phải là một thư mục hay không
            mkdir($uploadPath,0777,true); //mkdir() sẽ tạo mới thư mục theo đúng đường dẫn truyền vào (nếu chưa có)
        };
        foreach($files as $file){
            $file= validateUploadFile($file,$uploadPath);
            if($file != false){
                move_uploaded_file($file["tmp_name"],$uploadPath . '/' . $file["name"]); // move_uploaded_file() dùng để di chuyển tập tin được tải lên vào một nơi được chỉ định
            }
            else {
                $errors[] = "the file" . basename($file["name"])."isn't valid";
            }
        }
        return $errors;
    }

    // kiểm tra tính hợp lệ 
    function validateUploadFile($file,$uploadPath){
        // kiểm tra xem có vượt quá dung lượng cho phép không
        if($file['size']>2*1024*1024){
            return false;
        }
        // kiểm tra xem kiểu file có hợp lệ không
        $validTypes = array("jpg","jpeg","png","web");
        $fileType = substr($file["name"],strpos($file['name'],".")+1);
        if(!in_array($fileType,$validTypes)){ //in_array() là hàm kiểm tra một giá trị xác định có phỉ là giá trị của mảng cho trước hay không
            return false;
        }
        //kiểm tra xem file đã tồn tại hay chưa nếu tồn tại thì đổi tên
        $num=1;
        $fileName=substr($file['name'],0,strrpos($file['name'],"."));
        while(file_exists($uploadPath . '/' .$fileName . '.' .$fileType)){ //file_exists() sẽ kiểm tra xem file hoặc thư mục có tồn tại hay không
            $fileName = $fileName . "(" . $num .")";
            $num++;
        }
        $file['name'] = $fileName . '.' . $fileType;
        return $file;
    }
?>