<?php
function addCart()
{
    include '../includes/connect.php';

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    if (isset($_GET['product_id'])) {
        $product_id = $_GET['product_id'];
        $select_query = "SELECT * FROM `products` WHERE product_id = $product_id";
        $result_query = mysqli_query($con, $select_query);
        $row = mysqli_fetch_assoc($result_query);

    }
?>

<ul class="list-group">
    <li class="list-group-item d-flex justify-content-between">
        <div>
            <h6 name= "product_title"></h6><?php echo $row['product_title']; ?></h6>
            <div class="text-muted description-container"><?php echo $row['product_description']; ?></div>
            <img src="/Mysite/ecom/assets/img/<?php echo $row['product_image1']; ?>" alt="<?php echo $row['product_title']; ?>" class="product-image"  name ="product_image1" width="200px" height="150px">
        </div>
        <span class="text-muted" id="price_<?php echo $product_id; ?>"><?php echo $row['product_price']; ?></span>
    </li>
    <li class="list-group-item d-flex justify-content-between">
        <div>
            <label for="quantity">Quantity: </label>
            <input type="number" id="quantity_<?php echo $product_id; ?>" name="quantity" min="1" value="1" oninput="calculateInput(<?php echo $product_id; ?>)" onchange="calculateTotal(<?php echo $product_id; ?>)">
            <h6>Total: <span id="total_<?php echo $product_id; ?>"> <?php echo $row['product_price']; ?></span></h6>
        </div>
    </li>
</ul>

<?php
}
?>
