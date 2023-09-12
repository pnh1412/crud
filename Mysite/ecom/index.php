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
  <?php
if (isset($_GET['category_id'])) {
    $category_id = $_GET['category_id'];
    $validCategoryIds = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
    if (in_array($category_id, $validCategoryIds)) {
        header("Location: resources/display_product.php?category_id=$category_id");
        exit();
    }
}
?>
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
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
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
          <a class="nav-link" href="cart.php"><i class="fas fa-shopping-cart"></i> <span id="cart-item" class="badge badge-danger"></span></a>
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
        include 'resources/getcategories.php';
        getCategories();
        ?>
      </ul>
    </nav>

    <!-- Khu vực chính -->
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="row px-3">
        <?php
        include 'resources/showproducts.php';
        getProducts();
        ?>
      </div>
      <?php
      $totalProducts = countTotalProducts();
      $itemsPerPage = 12;

      // Tính tổng số trang dựa trên số sản phẩm hiển thị trên mỗi trang
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
