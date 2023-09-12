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
  <title>Admin Dashboard</title>
</head>

<body>
  <div class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
      <div class="container-fluid">
        <img src="./assets/logo/Features-of-a-discount-store.jpg" alt="Logo" class="img-fluid custom-image">
        <nav class="navbar navbar-expand-lg">
          <ul class="navbar-nav">
            <li class="nav-item ">
              <a href="" class="nav-link text-white">Welcome guest</a>
              <button><a href="" class="nav-link">Logout</a></button>
            </li>
          </ul>
        </nav>
      </div>
    </nav>

    <div class="bg-light">
      <h3 class="text-center p-2">Manage Details</h3>
    </div>

    <div class="column bg-info">
      <div class="col-md-12-secondary p-1">
        <div class= "text-center">
          <a href="#"><img src = "./assets/img/download.jpeg" class ="admin_image"></a>
          <p class="text-dark text-center">Admin Name</p>
        </div>
        <div class="button text-center">
          <button><a href="index.php?insert_product" class="nav-link text-dark" name= "insert_product">Insert Products</a></button>
          <button><a href="index.php?view_product" class="nav-link text-dark">View Products</a></button>
          <button><a href="index.php?insert_categories" name= "insert_categories" class="nav-link text-dark">Insert Categories</a></button>
          <button><a href="index.php?view_category" class="nav-link text-dark">View Categories</a></button>
          <button><a href="index.php?view_order" name="order" class="nav-link text-dark">Orders</a></button>
          <button><a href="index.php?view_finish" class="nav-link text-dark">Finish</a></button>
          <button><a href="" class="nav-link text-dark">List Users</a></button>
          <button><a href="" class="nav-link text-dark">Logout</a></button>
        </div>
      </div>
    </div>
  </div>
<div class="container">
  <?php
    if(isset($_GET['insert_categories'])){
      include('./resources/insert_categories.php');
    }
    else if(isset($_GET['insert_product'])){
      include('./resources/insert_product.php');
    }
    else if(isset($_GET['view_order'])){
      include('./resources/view_order.php');
    }
    else if(isset($_GET['view_product'])){
      include('./resources/view_product.php');
    }
    else if(isset($_GET['view_category'])){
      include('./resources/view_category.php');
    }
    else if(isset($_GET['view_finish'])){
      include('./resources/view_finish.php');
    }
  ?>
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
