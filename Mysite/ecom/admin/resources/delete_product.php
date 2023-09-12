<?php
include '../../includes/connect.php';

if (isset($_GET['deleteid'])) {
  $id = $_GET['deleteid'];

  $get_orders_query = "SELECT o.fullname, o.phone_number, o.email
                       FROM `orders` o
                       WHERE o.product_id = ?";

  $stmt_get_orders = mysqli_prepare($con, $get_orders_query);

  if ($stmt_get_orders) {
    mysqli_stmt_bind_param($stmt_get_orders, "i", $id);
    mysqli_stmt_execute($stmt_get_orders);
    mysqli_stmt_bind_result($stmt_get_orders, $fullname, $phone_number, $email);
    mysqli_stmt_fetch($stmt_get_orders);
    mysqli_stmt_close($stmt_get_orders);

    if (!empty($fullname) && !empty($phone_number) && !empty($email)) {
      echo "Have a customer ordered:<br>";
      echo "Name: $fullname<br>";
      echo "Phone Number: $phone_number<br>";
      echo "Email: $email<br>";
      echo "Please contact to customer";
    } else {
      $delete_product_query = "DELETE FROM `products` WHERE product_id = ?";
      $stmt_delete_product = mysqli_prepare($con, $delete_product_query);

      if ($stmt_delete_product) {
        mysqli_stmt_bind_param($stmt_delete_product, "i", $id);
        $result = mysqli_stmt_execute($stmt_delete_product);

        if ($result) {
          header('location: ../index.php?view_product');
        } else {
          die(mysqli_error($con));
        }

        mysqli_stmt_close($stmt_delete_product);
      } else {
        die(mysqli_error($con));
      }
    }
  } else {
    die(mysqli_error($con));
  }
}
?>
