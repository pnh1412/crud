<?php
include('../includes/connect.php');

$query = "SELECT * from `products`";
$result = mysqli_query($con, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css">
    <style>
        .product-description {
            max-width: 300px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="mt-5">Information</h1>

        <table class="table table-striped mt-4">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Product Title</th>
                    <th>Product Description</th>
                    <th>Product Keywords</th>
                    <th>Category ID</th>
                    <th>Product Image</th>
                    <th>Price</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Quantity</th>
                    <th scope="col">Operations</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['product_id'] . "</td>";
                    echo "<td>" . $row['product_title'] . "</td>";
                    echo "<td class='product-description'>" . $row['product_description'] . "</td>";
                    echo "<td>" . $row['product_keyword'] . "</td>";
                    echo "<td>" . $row['category_id'] . "</td>";
                    echo "<td><img src='/Mysite/ecom/assets/img/" . $row['product_image1'] . "' alt='Product Image' width='100'></td>";
                    echo "<td>" . $row['product_price'] . "</td>";
                    echo "<td>" . $row['date'] . "</td>";
                    echo "<td>" . $row['status'] . "</td>";
                    echo "<td>" . $row['quantity'] . "</td>";
                    echo "<td>
                        <button class='btn btn-primary'><a href='./resources/update_product.php?updateid=" . $row['product_id'] . "' class='text-light'>Update</a></button>
                        <button class='btn btn-danger'><a href='./resources/delete_product.php?deleteid=" . $row['product_id'] . "' class='text-light'>Delete</a></button>
                    </td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js"></script>
</body>

</html>
