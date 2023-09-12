<?php
function getProducts()
{
  include('./includes/connect.php');
  $base_path = "./resources/";
  $itemsPerPage = 12;
  $productsPerRow = 3;

  $currentPage = isset($_GET['page']) ? (int) $_GET['page'] : 1;
  if ($currentPage <= 0) {
    $currentPage = 1;
  }
  $displayedProductIds = array();
  $offset = ($currentPage - 1) * $itemsPerPage;
  $select_query = "SELECT * FROM `products` LIMIT $offset, $itemsPerPage";
  $result_query = mysqli_query($con, $select_query);
  while ($row = mysqli_fetch_assoc($result_query)) {
    $product_id = $row['product_id'];
    $product_title = $row['product_title'];
    $product_description = $row['product_description'];
    $product_keyword = $row['product_keyword'];
    $product_image1 = $row['product_image1'];
    $product_price = $row['product_price'];
    $date = $row['date'];
    $status = $row['status'];
    $category_id = $row['category_id'];
    $product_id = $row['product_id'];

    if (!in_array($product_id, $displayedProductIds)) {
      $displayedProductIds[] = $product_id;

      echo '<div class="col-md-3 mb-2">
      <div class="card" style="width: 18rem;">
      <img src="/Mysite/ecom/assets/img/' . $product_image1 . '" class="card-img-top custom-card-img" alt="' . $product_keyword . '">
      <div class="card-body">
          <h5 class="card-title">' . $product_title . '</h5>
          <p class="card-text"> ' . $product_description . ' </p>
          <p class="card-text"> ' . $product_price . ' </p>
          <p class="card-text"> ' . $date . ' </p>
        </div>
        <div class="card-footer">
          <a href="./resources/product_detail.php?product_id=' . $product_id . '" class="btn btn-primary">View more</a>
          <a href="./resources/checkout_result.php?product_id=' . $product_id . '" class="btn btn-primary">Buy now</a>
        </div>
      </div>
    </div>';

    }
  }
  function countTotalProducts()
  {
    include('./includes/connect.php');

    $count_query = "SELECT COUNT(*) AS total FROM `products`";
    $result = mysqli_query($con, $count_query);
    $row = mysqli_fetch_assoc($result);
    return $row['total'];
  }

}
?>

