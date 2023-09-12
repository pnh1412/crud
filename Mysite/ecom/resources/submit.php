<?php
include('../includes/connect.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   if (isset($_POST['quantity'])) {
      $quantity = $_POST['quantity'];
      $insert_query = "INSERT INTO order_details (order_id, product_id, num, price) VALUES ('$order_id', '$product_id', '$quantity', '$product_price')";
      if (mysqli_query($con, $insert_query)) {
         echo "Dữ liệu đã được lưu vào bảng order_details thành công.";
      } else {
         echo "Lỗi: " . mysqli_error($con);
      }
   } else {
      echo "Dữ liệu 'quantity' không tồn tại trong POST.";
   }
}
?>
