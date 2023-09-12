<?php
include '../../includes/connect.php';
$id = $_GET['updateid'];
$sql = "SELECT * FROM `products` WHERE product_id = $id"; // Sử dụng 'product_id' thay vì 'id'
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);
$product_id = $row['product_id'];
$product_title = $row['product_title'];
$product_description = $row['product_description'];
$product_keyword = $row['product_keyword'];
$product_image1 = $row['product_image1'];
$product_price = $row['product_price'];
$date = $row['date'];
$status = $row['status'];
$category_id = $row['category_id'];

if (isset($_POST['submit'])) {
  $product_title = $_POST['product_title'];
  $product_description = $_POST['product_description'];
  $product_keyword = $_POST['product_keyword'];
  $product_image1 = $_POST['product_image1'];
  $product_price = $_POST['product_price'];
  $date = $_POST['date'];
  $status = $_POST['status'];
  $category_id = $_POST['category_id'];

  $sql = "UPDATE `products` SET product_title='$product_title', product_description='$product_description' WHERE product_id =$id"; // Sử dụng 'product_id' thay vì 'id'
  $result = mysqli_query($con, $sql);
  if ($result) {
    echo "Success";
  } else {
    echo "Failed";
  }
}
?>


<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>Update products</title>
</head>

<body>
  <div class="container my-5">
    <form method="post">
      <div class="mb-3">
        <label for="product_title">Title</label>
        <input type="text" class="form-control" id="product_title" name="product_title"
          placeholder="Nhập tiêu đề sản phẩm" value="<?php echo $product_title; ?>" autocomplete="off">
      </div>
      <div class="mb-3">
        <label for="product_description">Description</label>
        <textarea class="form-control" id="product_description" name="product_description"
          placeholder="Nhập mô tả sản phẩm"><?php echo $product_description; ?></textarea>
      </div>
      <div class="mb-3">
        <label for="product_keyword">Keywords</label>
        <input type="text" class="form-control" id="product_keyword" name="product_keyword"
          placeholder="Nhập từ khóa sản phẩm" value="<?php echo $product_keyword; ?>" autocomplete="off">
      </div>
      <div class="mb-3">
        <label for="product_image1">Img1</label>
        <input type="file" class="form-control" id="product_image1" name="product_image1">
    </div>
      <div class="mb-3">
        <label for="product_price">Price</label>
        <input type="text" class="form-control" id="product_price" name="product_price" placeholder="Nhập giá sản phẩm"
          value="<?php echo $product_price; ?>" autocomplete="off">
      </div>
      <div class="mb-3">
        <label for="date">Date</label>
        <input type="date" class="form-control" id="date" name="date" value="<?php echo $date; ?>">
      </div>
      <div class="mb-3">
        <label for="status">Status</label>
        <select class="form-control" id="status" name="status">
          <option value="active" <?php if ($status == 'active')
            echo 'selected'; ?>>Con Hang</option>
          <option value="inactive" <?php if ($status == 'inactive')
            echo 'selected'; ?>>Het Hang</option>
        </select>
      </div>
      <div class="mb-3">
        <label for="category_id">ID Categories</label>
        <input type="text" class="form-control" id="category_id" name="category_id" placeholder="Nhập ID Danh mục"
          value="<?php echo $category_id; ?>" autocomplete="off">
      </div>
      <button type="submit" class="btn btn-primary" name="submit">Update</button>
    </form>
  </div>
</body>

</html>
