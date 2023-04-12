<!DOCTYPE html>
<html>
<head>
    <title>Add Product</title>
</head>
<body>
    <h1>Add Product</h1>
    <form method="post" action="insertproduct.php">
        <label for="productCode">Product Code:</label>
        <input type="text" id="productCode" name="productCode" required>
        <br>
        <label for="productName">Product Name:</label>
        <input type="text" id="productName" name="productName" required>
        <br>
        <label for="productLine">Product Line:</label>
        <input type="text" id="productLine" name="productLine" required>
        <br>
        <label for="productScale">Product Scale:</label>
        <input type="text" id="productScale" name="productScale" required>
        <br>
        <label for="productVendor">Product Vendor:</label>
        <input type="text" id="productVendor" name="productVendor" required>
        <br>
        <label for="productDescription">Product Description:</label>
        <input type="text" id="productDescription" name="productDescription" required>
        <br>
        <label for="quantityInStock">Quantity in Stock:</label>
        <input type="number" id="quantityInStock" name="quantityInStock" required>
        <br>
        <label for="buyPrice">Buy Price:</label>
        <input type="number" id="buyPrice" name="buyPrice" step="0.01" required>
        <br>
        <label for="MSRP">MSRP:</label>
        <input type="number" id="MSRP" name="MSRP" step="0.01" required>
        <br>
        <button type="submit">Add Product</button>
    </form>
</body>
</html>
