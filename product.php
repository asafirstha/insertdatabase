<?php
include ('conn.php');
$customer = "SELECT * FROM products";
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
    <?php
    $sql_products = "SELECT * FROM products";
    $result_products = mysqli_query($conn, $sql_products);
    
    echo "<h2>Data Products:</h2>";
    if (mysqli_num_rows($result_products) > 0) {
        // Menampilkan data dalam bentuk tabel
        echo "<table border='1'>
        <tr>
        <th>productCode</th>
        <th>productName</th>
        <th>productLine</>
        <th>productScale</th>
        <th>productVendor</th>
        <th>productDescription</th>
        <th>quantityInStock</th>
        <th>buyPrice</th>
        <th>MSRP</>
        </tr>";
        while($row = mysqli_fetch_assoc($result_products)) {
            echo "<tr>";
            echo "<td>" .$row["productCode"] . "</td>";
            echo "<td>" .$row["productName"] . "</td>";
            echo "<td>" .$row["productLine"] . "</td>";
            echo "<td>" .$row["productScale"] . "</td>";
            echo "<td>" .$row["productVendor"] . "</td>";
            echo "<td>" .$row["productDescription"] . "</td>";
            echo "<td>" .$row["quantityInStock"] . "</td>";
            echo "<td>" .$row["buyPrice"] . "</td>";
            echo "<td>" .$row["MSRP"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "Tidak ada data Products.";
    }
    
    // Menutup koneksi database
    mysqli_close($conn);
    ?>
    ?>
</body>
</html>
