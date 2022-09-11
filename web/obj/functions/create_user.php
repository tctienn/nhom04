<?php
    require_once("../classes/dbConnection.php");

    $dbConnection = new dbConnection();
    $conn = $dbConnection->getConnection();
    $sql = "INSERT INTO 'user' ('id', 'usename', 'password', 'is_admin', 'create_time') VALUES (NULL, '$username', MD5('$password'), '0', '11')";
    

?>