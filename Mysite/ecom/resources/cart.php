<?php
session_start();
if (!empty($_SESSION['cart'])) {
    echo "<h1>Your Cart</h1>";
    echo "<ul>";

    foreach ($_SESSION['cart'] as $product_id => $item) {
        echo "<li>Product ID: " . $item['product_id'] . "</li>";
        echo "<li>Quantity: " . $item['quantity'] . "</li>";
        echo "<hr>";
    }

    echo "</ul>";
} else {
    echo "<h1>Your Cart is Empty</h1>";
}
?>
