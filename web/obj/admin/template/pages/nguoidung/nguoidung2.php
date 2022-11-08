<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<a href="../../index_admin.php" style="color: black;  ">admin ></a>
    <?php
        // include '../../../../classes/dbConnection.php';
        require_once ("../../../../classes/dbConnection.php");
        
    ?>
   <h1>Danh sách người dùng</h1>
<table class="table" id="tblUser" border="1">
    <thead>
        <tr>
            
            <th scope="col">id</th>
            <th scope="col">usename</th>
            <th scope="col">Password</th>
            <th scope="col">is_admin</th>
            <th scope="col">ngaytao</th>

        </tr>
    </thead>
    <tbody>
    <?php
    $dbConnection = new dbConnection();
    $conn = $dbConnection->getConnection();

    $sql = "SELECT * FROM user";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $stt = 0;
            while ($row = $result->fetch_assoc()) {
                $stt++; ?>
                <tr>
                    
                    <td>
                        <?= $row["id"] ?>
                    </td>
                    <td>
                        <?= $row["usename"]  ?>
                    </td>
                    <td>
                        <?= $row["password"] ?>
                    </td>
                    <td>
                        <?= $row["is_admin"] ==1 ? "admin" : "người thường" ?>
                    </td>
                    <td>
                        <?= date('d/m/Y ',$row["create_time"])  ?>
                    </td>
                    <td>
                        <?= $row["gmail"]  ?>
                    </td>
                    <td>
                        <a href="./edit_user/edit_user.php?id=<?=$row["id"]?>" >sửa</a>
                    </td>
                    <td>
                        <a href="./delete_user/delete_user.php?id=<?=$row["id"]?>">xóa</a>
                    </td>
                </tr>
        <?php
            }
        } else {
            echo "0 results";
        }
        $conn->close();
        ?> 
    </tbody>
</table>
</body>
</html>