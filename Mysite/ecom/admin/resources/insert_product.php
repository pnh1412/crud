<?php
include('../includes/connect.php');
error_reporting(E_ALL);
if (isset($_POST['submit'])) {
  $product_title = $_POST['product_title'];
  $product_description = $_POST['description'];
  $product_keyword = $_POST['keyword'];
  $product_category = $_POST['product_category'];
  $product_price = $_POST['price'];
  $product_status = 'true';

  // accessing image names
  $product_image1 = $_FILES['product_image1']['name'];
  $product_image2 = $_FILES['product_image2']['name'];
  $product_image3 = $_FILES['product_image3']['name'];

  // accessing temporary image paths
  $temp_image1 = $_FILES['product_image1']['tmp_name'];
  $temp_image2 = $_FILES['product_image2']['tmp_name'];
  $temp_image3 = $_FILES['product_image3']['tmp_name'];

  $destination_directory = __DIR__ . '/tmp/';

  if (
    $product_title == '' or $product_description == '' or
    $product_keyword == '' or $product_category == ''
    or $product_price == '' or $product_image1 == ''
    or $product_image2 == '' or $product_image3 == ''
  ) {
    echo "<script>alert('Please fill in all fields')</script>";
    exit();
  } else {
    move_uploaded_file($temp_image1, "/opt/lampp/htdocs/Mysite/ecom/assets/img/$product_image1");
    move_uploaded_file($temp_image2, "/opt/lampp/htdocs/Mysite/ecom/assets/img/$product_image2");
    move_uploaded_file($temp_image3, "/opt/lampp/htdocs/Mysite/ecom/assets/img/$product_image3");

    $insert_products = "INSERT INTO `products` (product_title, product_description,
    product_keyword, category_id, product_image1,
    product_image2, product_image3, product_price, date, status)
    VALUES ('$product_title', '$product_description', '$product_keyword', '$product_category',
    '$product_image1', '$product_image2', '$product_image3', '$product_price',
    NOW(), '$product_status')";

    $result_query = mysqli_query($con, $insert_products);
    if ($result_query) {
      echo "<script>alert('Successfully inserted all fields')</script>";
    } else {
      echo "Failed to insert";
    }
  }
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
  <title>Insert Products</title>
</head>

<body>
  <div class="container mt-3">
    <h1 class="text-center">Insert Product</h1>
    <form action="" method="post" enctype="multipart/form-data">
      <div class="form-outline mb-4">
        <label for="product_title" class="form-label">Product title</label>
        <input type="text" name="product_title" id="product_title" class="form-control"
          placeholder="Enter product title" autocomplete="off" required="required">
      </div>
      <div class="form-outline mb-4">
        <label for="description" class="form-label">Product Description</label>
        <input type="text" name="description" id="description" class="form-control" placeholder="Enter description"
          autocomplete="off" required="required">
      </div>
      <div class="form-outline mb-4">
        <label for="keyword" class="form-label">Product Keyword</label>
        <input type="text" name="keyword" id="keyword" class="form-control" placeholder="Enter product keyword"
          autocomplete="off" required="required">
      </div>
      <div class="form-outline w-50 m-l mb-4">
        <select name="product_category" id="" class="form-select">
          <option value="">Select a category</option>
          <?php
          $select_query = "Select * from `categories`";
          $result_query = mysqli_query($con, $select_query);
          while ($row = mysqli_fetch_assoc($result_query)) {
            $category_title = $row['category_title'];
            $category_id = $row['category_id'];
            echo " <option value='$category_id'>$category_title</option>";
          }
          ?>
        </select>
      </div>
      <div class="form-outline mb-4">
        <label for="product_image1" class="form-label">Product Image 1</label>
        <input type="file" name="product_image1" id="product_image1" class="form-control" required="required">
      </div>
      <div class="form-outline mb-4">
        <label for="product_image2" class="form-label">Product Image 2</label>
        <input type="file" name="product_image2" id="product_image2" class="form-control" required="required">
      </div>
      <div class="form-outline mb-4">
        <label for="product_image3" class="form-label">Product Image 3</label>
        <input type="file" name="product_image3" id="product_image3" class="form-control" required="required">
      </div>
      <div class="form-outline mb-4">
        <label for="price" class="form-label">Price</label>
        <input type="text" name="price" id="price" class="form-control" placeholder="Enter price" autocomplete="off"
          required="required">
      </div>
      <div class="form-outline mb-4">
        <input type="submit" name="submit" class="btn btn-info mb-3 px-3" values="Insert Product">
      </div>
    </form>
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
