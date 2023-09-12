<?php
include '../includes/connect.php';
if (isset($_POST['insert_cat'])) {
  $category_title = $_POST['cat_title'];
  $select_query= "SELECT * FROM `categories` where category_title = '$category_title'";
  $result_select = mysqli_query($con, $select_query);
  $number = mysqli_num_rows($result_select);
  if($number > 0) {
    echo "<script> alert('This category already exist')</script>";
  }else{
  $sql = "insert into `categories`(category_title)
  values('$category_title')";
  $result = mysqli_query($con, $sql);
  if ($result) {
    echo "<script> alert('Insert successfully')</script>";
  } else {
    echo "Failed to insert";
  }
}
}
?>
<form action= "" method= "POST" class="mb-2">
<div class="input-group w-90 mb-2">
  <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
  <input type="text" class="form-control" name="cat_title" placeholder="Insert categories" aria-label="Username" aria-describedby="basic-addon1">
</div>
<div class="input-group w-10 mb-2">
<input type="submit" class="border-0 p-2 my-3" name="insert_cat" value="Insert categories" aria-label="Username" aria-describedby="basic-addon1">
</div>
</form>
