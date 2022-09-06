<?php
require_once("../classes/dbConnection.php");
    $message = "";
    $error = "";
    
    // $action = getValue("action", "POST", "str", "");
    if ( isset ($_GET["username"])) {
        // Lay POST Value
        // $inputID = getValue("inputID", "POST", "int", 0);
        // $inputEmail = getValue("inputEmail", "POST", "str", "");
        // $inputPassword = getValue("inputPassword", "POST", "str", "");
    
        $username=$_GET["username"];
        $password=$_GET["password"];
        $email=$_GET["email"];
        $phone=$_GET["phone"];
    
        if ( $username != "" && $password != "") {
            // Insert SQL
            $dbConnection = new dbConnection();
            $conn = $dbConnection->getConnection();
    
            $sql = 'INSERT INTO nguoidung
                    VALUES ("'."".'", "' . "$username". '", "' . "$password" . '", "' ."$email". '", "' . "$phone" . '")';
    
            if ($conn->query($sql) === true) {
                $message = "New record created successfully";
            } else {
                $error = "Error: " . $sql . "<br>" . $conn->error;
            }
    
            $conn->close();
        } else {
            $error = "Thông tin nhập không đủ !";
        }
        echo "$username";
    }
    
?>