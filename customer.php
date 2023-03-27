<?php
include ('conn.php');
$customer = "SELECT * FROM customers";
?>

<!DOCTYPE html>
<html>
    <head>
        <body>
            <?php
            $sql_customers = "SELECT * FROM customers";
$result_customers = mysqli_query($conn, $sql_customers);

echo "<h2>Data Customers:</h2>";
if (mysqli_num_rows($result_customers) > 0) {
    // Menampilkan data dalam bentuk tabel
    echo "<table border='1'>
    <tr>
    <th>customerNumber</th>
    <th>customerName</th>
    <th>contactLastName</th>
    <th>contactFirstName</th>
    <th>phone</th>
    <th>addressLine1</th>
    <th>addressLine2</th>
    <th>city</th>
    <th>state</>
    <th>postalCode</>
    <th>country</>
    <th>salesRepEmployeeNumber</>
    <th>creditLimit</>
    </tr>";
    while($row = mysqli_fetch_assoc($result_customers)) {
        echo "<tr>";
        echo "<td>" .$row["customerNumber"] . "</td>";
        echo "<td>" .$row["customerName"] . "</td>";
        echo "<td>" .$row["contactLastName"] . "</td>";
        echo "<td>" .$row["contactFirstName"] . "</td>";
        echo "<td>" .$row["phone"] . "</td>";
        echo "<td>" .$row["addressLine1"] . "</td>";
        echo "<td>" .$row["addressLine2"] . "</td>";
        echo "<td>" .$row["city"] . "</td>";
        echo "<td>" .$row["state"] . "</td>";
        echo "<td>" .$row["postalCode"] . "</td>";
        echo "<td>" .$row["country"] . "</td>";
        echo "<td>" .$row["salesRepEmployeeNumber"] . "</td>";
        echo "<td>" .$row["creditLimit"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "Tidak ada data Customers.";
}

?>
        </body>
    </head>
</html>