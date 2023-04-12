<<!DOCTYPE html>
<html>
<head>
    <title>Data List</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Data List</h1>
    <form method="post">
        <label for="tableSelect">Select Table:</label>
        <select id="tableSelect" name="tableSelect">
            <option value="customers">Customers</option>
            <option value="products">Products</option>
        </select>
        <button type="submit">Submit</button>
    </form>
    <br>
    <a href="addcustomer.php">Add Customer</a>
    <a href="addproduct.php">Add Product</a> 
    <br><br>
    <?php
    require_once 'koneksi.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $selectedTable = $_POST["tableSelect"];
        $sql = "SELECT * FROM " . $selectedTable;
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            echo "<table>";
            echo "<tr>";
            if ($selectedTable == "customers") {
                echo "<th>Customer Number</th>";
                echo "<th>Customer Name</th>";
                echo "<th>Contact Last Name</th>";
                echo "<th>Contact First Name</th>";
                echo "<th>Phone</th>";
                echo "<th>Address Line 1</th>";
                echo "<th>Address Line 2</th>";
                echo "<th>City</th>";
                echo "<th>State</th>";
                echo "<th>Postal Code</th>";
                echo "<th>Country</th>";
                echo "<th>Sales Rep Employee Number</th>";
                echo "<th>Credit Limit</th>";
                echo "<th>Action</th>"; 
            } elseif ($selectedTable == "products") {
                echo "<th>Product Code</th>";
                echo "<th>Product Name</th>";
                echo "<th>Product Line</th>";
                echo "<th>Product Scale</th>";
                echo "<th>Product Vendor</th>";
                echo "<th>Product Description</th>";
                echo "<th>Quantity in Stock</th>";
                echo "<th>Buy Price</th>";
                echo "<th>MSRP</th>";
                echo "<th>Action</th>"; 
            }
            echo "</tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                if ($selectedTable == "customers") {
                    echo "<td>" . $row["customerNumber"] . "</td>";
                    echo "<td>" . $row["customerName"] . "</td>";
                    echo "<td>" . $row["contactLastName"] . "</td>";
                    echo "<td>" . $row["contactFirstName"] . "</td>";
                    echo "<td>" . $row["phone"] . "</td>";
                    echo "<td>" . $row["addressLine1"] . "</td>";
                    echo "<td>" . $row["addressLine2"] . "</td>";
                    echo "<td>" . $row["city"] . "</td>";
                    echo "<td>" . $row["state"] . "</td>";
                    echo "<td>" . $row["postalCode"] . "</td>";
                    echo "<td>" . $row["country"] . "</td>";
                    echo "<td>" . $row["salesRepEmployeeNumber"] . "</td>";
                    echo "<td>" . $row["creditLimit"] . "</td>";
                    echo "<td>";
                    echo "<a href='editcustomer.php?customerNumber=" . $row["customerNumber"] . "'>Edit</a> | ";
                    echo "<a href='deletecustomer.php?customerNumber=" . $row["customerNumber"] . "'>Delete</a>";
                    echo "</td>"; 
                    echo "</tr>";
                } elseif ($selectedTable == "products") {
                    echo "<td>" . $row["productCode"] . "</td>";
                    echo "<td>" . $row["productName"] . "</td>";
                    echo "<td>" . $row["productLine"] . "</td>";
                    echo "<td>" . $row["productScale"] . "</td>";
                    echo "<td>" . $row["productVendor"] . "</td>";
                    echo "<td>" . $row["productDescription"] . "</td>";
                    echo "<td>" . $row["quantityInStock"] . "</td>";
                    echo "<td>" . $row["buyPrice"] . "</td>";
                    echo "<td>" . $row["MSRP"] . "</td>";
                    echo "<td>"; 
                    echo "<a href='editproduct.php?productCode=" . $row["productCode"] . "'>Edit</a> | ";
                    echo "<a href='deleteproduct.php?productCode=" . $row["productCode"] . "'>Delete</a>";
                    echo "</td>"; 
                    echo "</tr>";
                }
            }
            echo "</table>";
        } else {
            echo "0 results";
        }
    }
    $conn->close();
    ?>
</body>
</html>


