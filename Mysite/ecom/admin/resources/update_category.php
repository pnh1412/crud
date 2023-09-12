<?php
include '../../includes/connect.php';
$id = $_GET['updateid'];
$sql = "SELECT * FROM `categories` WHERE category_id = $id";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);
$category_title = $row['category_title'];
$category_id = $row['category_id'];

if (isset($_POST['submit'])) {
  $category_title = $_POST['category_title'];
  $category_id = $_POST['category_id'];
  $sql = "UPDATE `categories` SET category_title='$category_title' WHERE category_id =$id";
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
  <title>Update Category</title>
</head>

<body>
  <div class="container my-5">
    <form method="post">
      <div class="mb-3">
        <label for="category_id">ID Categories</label>
        <input type="text" class="form-control" id="category_id" name="category_id" placeholder="Nhập ID Danh mục"
          value="<?php echo $category_id; ?>" autocomplete="off">
      </div>
        <div class="mb-3">
        <label for="product_title">Title</label>
        <input type="text" class="form-control" id="category_title" name="category_title"
  placeholder="Input Categories title" value="<?php echo $category_title; ?>" autocomplete="off">
      </div>
      <button type="submit" class="btn btn-primary" name="submit">Update</button>
    </form>
  </div>
</body>

</html>
