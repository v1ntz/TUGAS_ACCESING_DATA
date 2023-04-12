<?php

require_once "koneksi.php";


if (isset($_GET["productCode"])) {
    $productCode = $_GET["productCode"];


    $sql = "SELECT * FROM products WHERE productCode = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $productCode);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $stmt->close();

    if ($row) {
 
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $productName = $_POST["productName"];
            $productLine = $_POST["productLine"];
            $productScale = $_POST["productScale"];
            $productVendor = $_POST["productVendor"];
            $productDescription = $_POST["productDescription"];
            $quantityInStock = $_POST["quantityInStock"];
            $buyPrice = $_POST["buyPrice"];
            $MSRP = $_POST["MSRP"];

            $sql = "UPDATE products SET productName = ?, productLine = ?, productScale = ?, productVendor = ?, productDescription = ?, quantityInStock = ?, buyPrice = ?, sellPrice = ? WHERE productCode = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssssiidds", $productName, $productLine, $productScale, $productVendor, $productDescription, $quantityInStock, $buyPrice, $sellPrice, $productCode);
            $stmt->execute();
            $stmt->close();
            header("Location: index.php");
            exit;
        }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Product</title>
</head>
<body>
    <h1>Edit Product</h1>
    <form method="post" action="<?php echo $_SERVER["PHP_SELF"] . "?productCode=" . $productCode; ?>">
        <label for="productName">Product Name:</label><br>
        <input type="text" id="productName" name="productName" value="<?php echo $row['productName']; ?>"><br>
        <label for="productLine">Product Line:</label><br>
        <input type="text" id="productLine" name="productLine" value="<?php echo $row['productLine']; ?>"><br>
        <label for="productScale">Product Scale:</label><br>
        <input type="text" id="productScale" name="productScale" value="<?php echo $row['productScale']; ?>"><br>
        <label for="productVendor">Product Vendor:</label><br>
        <input type="text" id="productVendor" name="productVendor" value="<?php echo $row['productVendor']; ?>"><br>
        <label for="productDescription">Product Description:</label><br>
        <input type="text" id="productDescription" name="productDescription" value="<?php echo $row['productDescription']; ?>"><br>
        <label for="quantityInStock">Quantity in Stock:</label><br>
        <label for="quantityInStock">Quantity in Stock:</label><br>
        <input type="number" id="quantityInStock" name="quantityInStock" value="<?php echo $row['quantityInStock']; ?>"><br>
        <label for="buyPrice">Buy Price:</label><br>
        <input type="number" id="buyPrice" name="buyPrice" step="0.01" value="<?php echo $row['buyPrice']; ?>"><br>
        <label for="sellPrice">Sell Price:</label><br>
        <input type="number" id="MSRP" name="sellPrice" step="0.01" value="<?php echo $row['MSRP']; ?>"><br>
        <input type="submit" value="Save">
    </form>
</body>
</html>
<?php
    } else {
        header("Location: index.php");
        exit;
    }
} else {
    header("Location: index.php");
    exit;
}
?>

