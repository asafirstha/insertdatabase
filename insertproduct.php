<?php
    include ("conn.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="menu">
        <ul class="ul-menu">
            <li class="li-menu">
                <a href="indexx.php" class="a-menu"><?php echo"Home"?></a></li>
            </ul>
    </div><br>
    <center><h1>Insert Product</h1></center>

    <?php
        $sql = "SELECT productLine FROM productlines";
        $result = mysqli_query($conn, $sql);

        if($_SERVER['REQUEST_METHOD']=='POST'){
            $productCode = $_POST["productCode"];
            $productName = $_POST["productName"];
            $productLine = $_POST["productLine"];
            $productScale = $_POST["productScale"];
            $productVendor = $_POST["productVendor"];
            $productDescription = $_POST["productDescription"];
            $quantityInStock = $_POST["quantityInStock"];
            $buyPrice = $_POST["buyPrice"];
            $MSRP = $_POST["MSRP"];

        $sql = "INSERT INTO product (productCode, productName, productLine, productScale, productVendor, 
                  productDescription, quantityInStock, buyPrice, MSRP) 
                  VALUES ('$productCode', '$productName', '$productLine', '$productScale', '$productVendor', '$productDescription', '$quantityInStock', '$buyPrice', '$MSRP')";
    }?>
    <h1>Form memasukkan data baru</h1>
        <p>Silahkan isi form dibawah ini kemudian submit untuk menambahkan productLine ke database </p>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <br><label>Product Code:</label>
            <input type="text" name="productCode"><br><br>
        <label>Product Name:</label>
            <input type="text" name="productName"><br><br>
        <label>Product Line:</label>
            <select name="productLine">
                <?php 
                    while($row = $result->fetch_assoc()){
                        echo "<option value ='".$row['productLine']."'>".$row['productLine']."</option>";
                    }
                ?>
            </select><br><br>
        <label>Product Scale:</label>
            <input type="text" name="productScale"><br><br>
        <label>Product Vendor:</label>
            <input type="text" name="productVendor"><br><br>
        <label>Product Description:</label>
            <input type="textarea" name="productDescription"><br><br>
        <label>Quantity In Stock:</label>
            <input type="number" name="quantityInStock"><br><br>
        <label>Buy Price:</label>
            <input type="text" name="buyPrice"><br><br>
        <label>MSRP:</label>
            <input type="text" name="MSRP"><br><br>

    <input type="submit" value="Submit"><br>
    </form>
</body>
</html>