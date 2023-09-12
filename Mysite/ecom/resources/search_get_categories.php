<?php
function getCategories()
{
  include('../includes/connect.php');
  $select_categories = "SELECT * FROM `categories`";
  $result_categories = mysqli_query($con, $select_categories);
  while ($row_data = mysqli_fetch_assoc($result_categories)) {
    $category_title = $row_data['category_title'];
    $category_id = $row_data['category_id'];
    echo "<li class='nav-item'>
       <a href='index.php?category_id=$category_id' class='nav-link text-dark'><h5>$category_title</h5></a></li>";
  }
  if (!$result_categories) {
    die("loi truy van: " . mysqli_error($con));
  }
}
?>

