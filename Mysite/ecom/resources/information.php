<?php
include('../includes/connect.php');

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_id = $_SESSION["product_id"];
    $fullname = $_POST["fullname"];
    $email = $_POST["email"];
    $address = $_POST["address"];
    $quantity = $_POST["quantity"];

    $select_product_query = "SELECT product_price, product_title, product_image1 FROM products WHERE product_id = $product_id";
    $result_product_query = mysqli_query($con, $select_product_query);

    if ($result_product_query) {
        $row_product = mysqli_fetch_assoc($result_product_query);
        $product_price = $row_product['product_price'];
        $product_title = $row_product['product_title'];
        $product_image1 = $row_product['product_image1'];

        $price = $product_price * $quantity;

        $sql = "INSERT INTO orders (product_id, fullname, email, address, order_date, quantity, price, product_image1, product_title)
                VALUES ('$product_id', '$fullname', '$email', '$address', NOW(), '$quantity', '$price', '$product_image1', '$product_title')";

        if ($con->query($sql) === TRUE) {
            echo "Đặt hàng thành công!";
        } else {
            echo "Lỗi: " . $con->error;
        }
    } else {
        echo "Lỗi trong truy vấn lấy thông tin sản phẩm: " . mysqli_error($con);
    }
}
?>
