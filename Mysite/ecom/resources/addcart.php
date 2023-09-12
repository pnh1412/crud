<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Product Detail</title>
  <!-- Add Bootstrap CSS Link Here -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Your Custom CSS Styles (if any) -->
  <style>
    /* Add your custom styles here */
  </style>
</head>

<body>
  <div class="container mt-5">
    <div class="row">
      <?php
      include '../includes/connect.php';
      if (isset($_GET['product_id'])) {
        $product_id = $_GET['product_id'];

        $select_query = "SELECT * FROM `products` WHERE product_id = $product_id";
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
          echo '
          <!-- Left Column for Product Image -->
          <div class="col-md-6">
            <img src="/Mysite/ecom/assets/img/' . $product_image1 . '" alt="Product Image" class="img-fluid">
          </div>
          <div class="col-md-6">
            <h2>' . $product_title . '</h2>
            <!-- Product Price -->
            <h3 class="text-danger">' . $product_price . '</h3>
            <!-- Product Description -->
            <p>' . $product_description . '</p>
            <!-- Product Details Table -->
            <form action="submit.php" method="POST">
              <div class="col-5">
                  <label class="form-label" for="quantity">Quantity</label>
                  <select class="form-select" id="quantity" name="quantity"> <!-- Đặt tên cho trường dữ liệu -->
                    <option>Choose</option>
                    <option value="300G">300G</option>
                    <option value="500G">500G</option>
                    <option value="1KG">1KG</option>
                    <option value="2KG">2KG</option>
                    <option value="5KG">5KG</option>
                  </select>
              </div>
                 <a href="checkout_result.php" class="btn btn-primary mt-3">Check out</a>
             </form>
          </div>';
        }
      }
      ?>
    </div>
  </div>


  <!-- Add Bootstrap JS and jQuery Scripts Here (if needed) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>

</html>
