<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_GET["product_id"])) {
    $_SESSION["product_id"] = $_GET["product_id"];
}
// tat cai notice
error_reporting(0);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Checkout Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css"
        type="text/css">
</head>

<body>
    <div class="container col-8 my-5 br-2 rounded">
        <div class="row g-3">
            <div class="col-8">
                <h4>Billing Address</h4>
                <form method="POST" action="information.php">
                    <div class="form-group row">
                        <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
                         <input type="hidden" name="product_title" value="<?php echo $row['product_title']; ?>">
                         <input type="hidden" name="product_image1" value="<?php echo $row['product_image1']; ?>">
                        <input type="hidden" id="product_id" name="product_id" value="">
                        <div class="col-md-6">
                            <label class="form-label" for="fullname">Full Name</label>
                            <input type="text" id="fullname" name="fullname" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="phone_number">Phone Number</label>
                            <input type="text" id="phone_number" name="phone_number" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="email">Email
                                <span class="text-muted"> (Optional)</span>
                            </label>
                            <input type="text" id="email" name="email" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="address">Address</label>
                            <input type="text" id="address" name="address" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="datePicker" class="form-label">Select Date:</label>
                        <input type="datetime-local" name="order_date" class="form-control" id="datePicker">
                    </div>
                    <h4 class="d-flex justify-content-between align-item-center">
                        <span class="text-muted">Your Cart</span>
                    </h4>

                    <?php
                    include '../resources/checkout.php';
                    addCart();
                    ?>
            </div>
        </div>
        <input type="submit" name="submit" value="Continue to Checkout" class="btn btn-primary mt-3">
        </form>
    </div>

    <script>
        const today = new Date();
        const yyyy = today.getFullYear();
        const mm = String(today.getMonth() + 1).padStart(2, '0');
        const dd = String(today.getDate()).padStart(2, '0');
        const hh = String(today.getHours()).padStart(2, '0');
        const min = String(today.getMinutes()).padStart(2, '0');
        const formattedDateTime = `${yyyy}-${mm}-${dd}T${hh}:${min}`;
        document.getElementById("datePicker").value = formattedDateTime;

        const productList = document.querySelector('.list-group');
        const productHiddenInput = document.getElementById('product-id-hidden');
        productList.addEventListener('click', function (event) {
            const clickedProduct = event.target.closest('li[data-product-id]');

            if (clickedProduct) {
                const productId = clickedProduct.getAttribute('data-product-id');
                productHiddenInput.value = productId;
            }
        });

        function calculateTotal(product_id) {
            var price = document.getElementById("price_" + product_id).innerHTML;
            var quantity = document.getElementById("quantity_" + product_id).value;
            var total = parseFloat(price) * parseInt(quantity);
            if (!isNaN(total))
                document.getElementById("total_" + product_id).innerHTML = total;
        }

        function calculateInput(product_id) {
            var price = parseFloat(document.getElementById("price_" + product_id).innerHTML);
            var quantityInput = document.getElementById("quantity_" + product_id);
            var totalSpan = document.getElementById("total_" + product_id);

            if (!isNaN(quantityInput.value) && quantityInput.value >= 1) {
                var noTickets = parseInt(quantityInput.value);
                var total = price * noTickets;
                if (!isNaN(total)) {
                    totalSpan.innerHTML = total;
                }
            }
        }

        document.addEventListener('keydown', (event) => {
            if (event.target && event.target.id.startsWith("quantity_")) {
                var product_id = event.target.id.split("_")[1];
                var price = parseFloat(document.getElementById("price_" + product_id).innerHTML);
                var quantity = parseFloat(event.target.value);
                var total = price * quantity;
                if (!isNaN(total)) {
                    document.getElementById("total_" + product_id).innerHTML = total;
                }
            }
        }, false);

    </script>
</body>

</html>
