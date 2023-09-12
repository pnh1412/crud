<?php
include '../../includes/connect.php';

if (isset($_GET['deleteid'])) {
  $id = $_GET['deleteid'];
  $sql = "DELETE FROM `orders` WHERE id = $id";
  $result = mysqli_query($con, $sql);
  if ($result) {
    header('location: ../index.php?view_order');
  } else {
    die(mysqli_error($con));
  }
}
?>
