<?php
require_once "koneksi.php";


if (isset($_GET["customerNumber"])) {
    $customerNumber = $_GET["customerNumber"];


    $sql = "SELECT * FROM customers WHERE customerNumber = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $customerNumber);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $stmt->close();

  
    if ($row) {
       
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
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
            $salesRepEmployeeNumber = $_POST["salesRepEmployeeNumber"];
            $creditLimit = $_POST["creditLimit"];

         
            $sql = "UPDATE customers SET customerName = ?, contactLastName = ?, contactFirstName = ?, phone = ?, addressLine1 = ?, addressLine2 = ?, city = ?, state = ?, postalCode = ?, country = ?, salesRepEmployeeNumber = ?, creditLimit = ? WHERE customerNumber = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssssssssssidi", $customerName, $contactLastName, $contactFirstName, $phone, $addressLine1, $addressLine2, $city, $state, $postalCode, $country, $salesRepEmployeeNumber, $creditLimit, $customerNumber);
            $stmt->execute();
            $stmt->close();

      
            header("Location: index.php");
            exit;
        }}}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Customer</title>
</head>
<body>
    <h1>Edit Customer</h1>
    <form method="post" action="<?php echo $_SERVER["PHP_SELF"] . "?customerNumber=" . $customerNumber; ?>">
        <label for="customerName">Customer Name</label>
        <input type="text" name="customerName" value="<?php echo $row["customerName"]; ?>" required>
        <br>
        <label for="contactLastName">Last Name</label>
        <input type="text" name="contactLastName" value="<?php echo $row["contactLastName"]; ?>" required>
        <br>
        <label for="contactFirstName">First Name</label>
        <input type="text" name="contactFirstName" value="<?php echo $row["contactFirstName"]; ?>" required>
        <br>
        <label for="phone">Phone</label>
        <input type="text" name="phone" value="<?php echo $row["phone"]; ?>" required>
        <br>
        <label for="addressLine1">Address Line 1</label>
        <input type="text" name="addressLine1" value="<?php echo $row["addressLine1"]; ?>" required>
        <br>
        <label for="addressLine2">Address Line 2</label>
        <input type="text" name="addressLine2" value="<?php echo $row["addressLine2"]; ?>">
        <br>
        <label for="city">City</label>
        <input type="text" name="city" value="<?php echo $row["city"]; ?>" required>
        <br>
        <label for="state">State</label>
        <input type="text" name="state" value="<?php echo $row["state"]; ?>" required>
        <br>
        <label for="postalCode">Postal Code</label>
        <input type="text" name="postalCode" value="<?php echo $row["postalCode"]; ?>" required>
        <br>
        <label for="country">Country</label>
        <input type="text" name="country" value="<?php echo $row["country"]; ?>" required>
        <br>
        <label for="salesRepEmployeeNumber">Sales Rep Employee Number</label>
        <input type="text" name="salesRepEmployeeNumber" value="<?php echo $row["salesRepEmployeeNumber"]; ?>">
        <br>
        <label for="creditLimit">Credit Limit</label>
        <input type="number" name="creditLimit" value="<?php echo $row["creditLimit"]; ?>" required>
        <br>
        <input type="submit" name="submit" value="Update">
    </form>
    <a href="index.php">Kembali</a>
</body>
</html>
