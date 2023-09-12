<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="./assets/css/style.css">
  <title>Document</title>
</head>

<body>

  <div class="container-fluid p-0">
    <nav class="navbar navbar-dark bg-dark navbar-expand-lg ">
      <a class="navbar-brand" href="#"><i class="fa-sharp fa-solid fa-dumpster-fire"></i></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Products</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Register</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Products</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="cart.php"><i class="fas fa-shopping-cart"></i> <span id="cart-item"
                class="badge badge-danger"></span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Total price: </a>
          </li>
        </ul>
        <form class="d-flex" action="./resources/search_result.php" method="get">
          <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
          <input type="submit" value="Search" class="btn btn-outline-light" name="search_data_product">
        </form>
      </div>
    </nav>
  </div>
  <div class="navbar navbar-dark bg-dark navbar-expand-lg ">
    <ul class="navbar-nav me-auto mx-auto">
      <li class="nav-item">
        <a class="nav-link" href="#">Welcome Guest </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Login</a>
      </li>
    </ul>
  </div>
  <div class="row mt-4">
    <!-- sidenav -->
    <nav class="col-md-3 col-lg-2 d-md-block bg-light sidebar bg-white">
      <ul class="navbar-nav me-auto text-center">
        <li class="nav-item bg-white">
          <a href="#" class="nav-link text-dark">
            <h4>Muc luc</h4>
          </a>
        </li>
        <?php
        include('../includes/connect.php');
        $select_categories = "SELECT * FROM `categories`";
        $result_categories = mysqli_query($con, $select_categories);
        while ($row_data = mysqli_fetch_assoc($result_categories)) {
          $category_title = $row_data['category_title'];
          $category_id = $row_data['category_id'];
          echo "<li class='nav-item'>
       <a href='display_product.php?category_id=$category_id' class='nav-link text-dark'><h5>$category_title</h5></a></li>";
        }
        $select_products = "SELECT * FROM `products` WHERE `category_id` = $category_id";
        $result_products = mysqli_query($con, $select_products);
        if (!$result_products) {
          die("Error: " . mysqli_error($con));
        }

        ?>
      </ul>
    </nav>

    <!-- Khu vực chính -->
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="row px-3">
        <?php
        if (isset($_GET['category_id'])) {
          include '../includes/connect.php';
          $category_id = $_GET['category_id'];
          $select_query = "SELECT * FROM products WHERE category_id = $category_id";
          $result_query = mysqli_query($con, $select_query);
          $displayedProductIds = array();
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
                          <a href="product_detail.php?product_id=' . $product_id . '" class="btn btn-primary">View more</a>
                          <a href="checkout_result.php?product_id=' . $product_id . '" class="btn btn-primary">Buy now</a>
                        </div>
                  </div>
                </div>';
            }

          }
        } else {
          echo 'Không có category_id được cung cấp.';
        }
        ?>

      </div>
      <?php
      function countTotalProducts()
      {
        include('../includes/connect.php');

        $count_query = "SELECT COUNT(*) AS total FROM `products`";
        $result = mysqli_query($con, $count_query);
        $row = mysqli_fetch_assoc($result);
        return $row['total'];
      }
      $totalProducts = countTotalProducts();
      $itemsPerPage = 12;

      $totalPages = ceil($totalProducts / $itemsPerPage);

      echo '<nav aria-label="Page navigation example">
             <ul class="pagination">';
      for ($page = 1; $page <= $totalPages; $page++) {
        echo '<li class="page-item"><a class="page-link" href="?page=' . $page . '">' . $page . '</a></li>';
      }
      echo '</ul></nav>';
      ?>
    </main>
  </div>

  <div class="bg-info p-3 text-center">
    <p>All rights reserved @-Hau beo</p>
  </div>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"></script>
</body>

</html>
