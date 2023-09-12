document.getElementById("add-to-cart-button").addEventListener("click", function () {
    var productName = document.getElementById("product-name").textContent;
    var productDescription = document.getElementById("product-description").textContent;
    var productPrice = document.getElementById("product-price").textContent;

    var xhr = new XMLHttpRequest();
    xhr.open("POST", "./resources/add_to_cart.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            alert("Sản phẩm đã được thêm vào giỏ hàng!");
        }
    };
    xhr.send("productName=" + productName + "&productDescription=" + productDescription + "&productPrice=" + productPrice);
});
