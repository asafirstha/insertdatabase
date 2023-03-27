<?php
include ('conn.php');
?>

<!DOCTYPE html>
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
    <center><h2>Insert Data Customer</h2></center>

    <?php
    //daftar salesRepEmployeeNumber dari employees
    $sql = "SELECT employeeNUmber, CONCAT(firstName, '', lastName) AS fullName FROM employees WHERE jobTitle = 'Sales Rep'";
    $result = mysqli_query($conn, $sql);

    // Mengecek form dan menyimpan data
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $customerNumber = $_POST["customerNumber"];
    $customerName = $_POST["customerName"];
    $contactLastName = $_POST["contactLastName"];
    $contactFirstName = $_POST["contactFirstName"];
    $phone = $_POST["phone"];
    $addressLine1 = $_POST["addressLine1"];
    $addressLine2 = $_POST["addressLine2"];
    $city = $_POST["city"];
    $state = $_POST["state"];
    $postalCode = $_POST["postalCode"];
    $country = $_POST["country"];
    $creditLimit = $_POST['creditLimit'];
    $salesRepEmployeeNumber = $_POST["salesRepEmployeeNumber"];

    //menambah data baru ke cust
    $query = "INSERT INTO customers 
    (customerNumber, customerName, contactLastName, contactFirstName, phone, addressLine1, 
    addressLine2, city, state, postalCode, country, salesRepEmployeeNumber, creditLimit) 
    VALUES ('$customerNumber', '$customerName', '$contactLastName', '$contactFirstName', '$phone', '$addressLine1', 
    '$addressLine2', '$city', '$state', '$postalCode', '$country', '$salesRepEmployeeNumber', '$creditLimit')";
       } ?>

        <h1>Form memasukkan data baru</h1>
        <p>Silahkan isi form dibawah ini kemudian submit untuk menambahkan employee ke database </p>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label> Customer Number:</label> 
            <input type="number" name="customerNumber"><br><br>
        <label>Customer Name:</label>  
            <input type="text" name="customerName"><br><br>
        <label> Contact Last Name:</label> 
            <input type="text" name="contactLastName"><br><br>
        <label>Contact First Name:</label>  
            <input type="text" name="contactFirstName"><br><br> 
        <label>  Phone:</label> 
            <input type="number" name="phone"><br><br>
        <label>Address Line 1:</label>  
            <input type="textarea" name="addressLine1"><br><br>
        <label> Address Line 2:</label> 
            <input type="textarea" name="addressLine2"><br><br>
        <label> City:</label>  
            <input type="text" name="city"><br><br>
        <label> State:</label>  
            <input type="text" name="state"><br><br>
        <label> Postal Code:</label> 
            <input type="number" name="postalCode"><br><br>
        <label> Country:</label> 
            <input type="text" name="country"><br><br>
        <label>  Sales Rep Employee Number:  </label>
            <br><select name="salesRepEmployeeNumber">
                <?php while ($row = mysqli_fetch_assoc($result)) {
                    echo "<option value='" . $row['employeeNumber'] . "'>" . $row['fullName'] . "</option>";
                } ?>
            </select><br><br>
        <label> Credit Limit: </label><br>
            <input type="text" name="creditLimit"><br><br>
    <input type="submit" value="Submit"><br>
    </form>

</body>
</html>