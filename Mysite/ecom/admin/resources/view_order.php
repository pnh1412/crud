<?php
include('../includes/connect.php');

$query = "SELECT * from `orders`";
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
                    <th>Product ID</th>
                    <th>Product Title</th>
                    <th>Product Image</th>
                    <th>Fullname</th>
                    <th>Phone Number</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Date</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th scope="col">Operations</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['product_id'] . "</td>";
                    echo "<td>" . $row['product_title'] . "</td>";
                    echo "<td><img src='/Mysite/ecom/assets/img/" . $row['product_image1'] . "' alt='Product Image' width='100'></td>";
                    echo "<td>" . $row['fullname'] . "</td>";
                    echo "<td>" . $row['phone_number'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "<td>" . $row['address'] . "</td>";
                    echo "<td>" . $row['order_date'] . "</td>";
                    echo "<td>" . $row['quantity'] . "</td>";
                    echo "<td>" . $row['price'] . "</td>";
                   echo "<td>
                            <form method='post' action='./resources/finish.php'>
                                <input type='hidden' name='id' value='" . $row['id'] . "'>
                                <input type='hidden' name='product_id' value='" . $row['product_id'] . "'>
                                <input type='hidden' name='product_title' value='" . $row['product_title'] . "'>
                                <input type='hidden' name='fullname' value='" . $row['fullname'] . "'>
                                <input type='hidden' name='phone_number' value='" . $row['phone_number'] . "'> <!-- Fix the name attribute -->
                                <input type='hidden' name='email' value='" . $row['email'] . "'> <!-- Fix the name attribute -->
                                <input type='hidden' name='address' value='" . $row['address'] . "'> <!-- Fix the name attribute -->
                                <input type='hidden' name='order_date' value='" . $row['order_date'] . "'>
                                <input type='hidden' name='quantity' value='" . $row['quantity'] . "'> <!-- Fix the name attribute -->
                                <input type='hidden' name='price' value='" . $row['price'] . "'> <!-- Fix the name attribute -->
                                <button type='submit' class='btn btn-primary finish-button'>Finish</button>
                                <button class='btn btn-danger'><a href='./resources/delete_order.php?deleteid=" . $row['id'] . "' class='text-light'>Delete</a></button>

                            </form>
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
