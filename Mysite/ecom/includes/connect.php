<?php
  $con = new mysqli('localhost', 'root', '','mystore');
  if($con){
    echo "";
  }else {
      die(mysqli_error($con));
  }
?>
