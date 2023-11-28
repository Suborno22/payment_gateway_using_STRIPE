<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contents</title>
</head>

<body>
    <table cellspacing="20px">
        <tr>
            <th>product id</th>
            <th>Product Name</th>
            <th>Price</th>
            <th>Stock</th>
        </tr>
        <?php
        $query = "SELECT * FROM `Contents`";
        require __DIR__ . "/config.php"; // Corrected the path separator
        $res = mysqli_query($connect, $query);
        if (mysqli_num_rows($res) > 0) {
            while ($row = mysqli_fetch_assoc($res)) {
                echo "
                <tr>
                    <td>$row[id]</td>
                    <td>$row[productName]</td>
                    <td>$row[price]</td>
                    <td>$row[stock]</td>
                    <td><a href='checkout.php?id=$row[id]&productName=$row[productName]&price=$row[price]&stock=$row[stock]'>Checkout</a></td>
                </tr>";
            }
        }else{
            if (!$res) {
                die("Query failed: " . mysqli_error($connect));
            }
        }
        ?>
    </table>
</body>

</html>
