<?php
include('../../includes/connect.php');
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $order_id = $_POST['id'];
    $product_id = $_POST['product_id'];
    $product_title = $_POST['product_title'];
    $phone_number = $_POST['phone_number'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $order_date = $_POST['order_date'];

    $today = new DateTime();
    $finishDate = $today->format('Y-m-d H:i:s');

    $insertQuery = "INSERT INTO order_finish (order_id, product_id, product_title, phone_number, email, address, quantity, price, orderdate, finishdate)
                    VALUES ('$order_id', '$product_id', '$product_title', '$phone_number', '$email', '$address', '$quantity', '$price', '$order_date', '$finishDate')";

    if (mysqli_query($con, $insertQuery)) {
        // Xóa dòng dữ liệu từ bảng orders sau khi thêm vào bảng order_finish
        $deleteQuery = "DELETE FROM orders WHERE id = '$order_id'";
        if (mysqli_query($con, $deleteQuery)) {
            echo "Success";
        } else {
            echo "Error: " . mysqli_error($con);
        }
    } else {
        echo "Error: " . mysqli_error($con);
    }
    header('Location: ../index.php?view_order');
}

?>

