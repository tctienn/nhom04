<a href="../../index_admin.php" style="color: black;  ">admin ></a>
<?php
    require_once ("../../../../classes/dbConnection.php");
    include 'productEdit.php';
    
    
?>

<h2>thêm sản phẩm</h2>

<div>
    <form  id="product-form" action="./Addproduct.php?action=addpro" method="POST" enctype="multipart/form-data">
        <input type="submit" title="lưu sản phẩm" value=" lưu" /> <br>
        <label for="">tên sản phẩm</label>
        <input type="text" name="name" id="" required > <br>
        <label for="" required >mô tả</label> 
        <textarea type="text" name="mota" id=""> </textarea> <br>
        <label for="">danh mục</label>
        <select name="danhmuc" id="">
        <?php
             $comb = $con->query($sqls);
             if ($comb->num_rows > 0) {
                 while ($row = $comb->fetch_assoc()) {
                    ?>
                        <option value=<?=$row['id']?> > <?=$row['name']?> </option>
                    <?php
                 }
             }
        ?>
<!-- 
            <option value="1">1</option>
            <option value="2">2</option> -->
        </select> <br>
        <lable>số lượng</lable>
        <input type="number" name="soluong" required  min=1 > <br>
        <label for="">gia</label>
        <input type="text" name="gia" id=""> <br>
        <label for="">img</label>
        <input type="file" name="file[]" id=""> <br>
    </form>
</div>