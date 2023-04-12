<?php
// Import database connection code from koneksi.php
require_once "koneksi.php";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
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

    // Insert new customer record into the database
    $sql = "INSERT INTO customers (customerName, contactLastName, contactFirstName, phone, addressLine1, addressLine2, city, state, postalCode, country, salesRepEmployeeNumber, creditLimit) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssssssid", $customerName, $contactLastName, $contactFirstName, $phone, $addressLine1, $addressLine2, $city, $state, $postalCode, $country, $salesRepEmployeeNumber, $creditLimit);
    $stmt->execute();
    $stmt->close();

    // Redirect to customer listing page after successful insertion
    header("Location: index.php");
    exit;
}
?>

<!-- HTML form for adding new customer -->
<!DOCTYPE html>
<html>
<head>
    <title>Add Customer</title>
</head>
<body>
    <h1>Add Customer</h1>
    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label for="customerName">Customer Name:</label><br>
        <input type="text" id="customerName" name="customerName" required><br>
        <label for="contactLastName">Contact Last Name:</label><br>
        <input type="text" id="contactLastName" name="contactLastName" required><br>
        <label for="contactFirstName">Contact First Name:</label><br>
        <input type="text" id="contactFirstName" name="contactFirstName" required><br>
        <label for="phone">Phone:</label><br>
        <input type="text" id="phone" name="phone" required><br>
        <label for="addressLine1">Address Line 1:</label><br>
        <input type="text" id="addressLine1" name="addressLine1" required><br>
        <label for="addressLine2">Address Line 2:</label><br>
        <input type="text" id="addressLine2" name="addressLine2"><br>
        <label for="city">City:</label><br>
        <input type="text" id="city" name="city" required><br>
        <label for="state">State:</label><br>
        <input type="text" id="state" name="state"><br>
        <label for="postalCode">Postal Code:</label><br>
        <input type="text" id="postalCode" name="postalCode"><br>
        <label for="country">Country:</label><br>
        <input type="text" id="country" name="country"><br>
        <label for="salesRepEmployeeNumber">Sales Rep Employee Number:</label><br>
        <input type="text" id="salesRepEmployeeNumber" name="salesRepEmployeeNumber"><br>
        <label for="creditLimit">Credit Limit:</label><br>
        <input type="number" id="creditLimit" name="creditLimit"><br>
        <input type="submit" value="Add Customer">
        </form>
        </body>
        </html>


