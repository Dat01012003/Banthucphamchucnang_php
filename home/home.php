<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="homestyles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body style="margin: 0; padding: 0; font-family: Arial, Helvetica, sans-serif;">
    <div id="main-body">
        <?php
           // Bao gồm file header.php
             include 'header.php';
             ?>

    </div>
    <div style="background-color: #F5F5F5;">
        <div id="home-slider">
            <div class="container" style="margin: 0; max-width: 1337px;">
                <div class="row">
                    <!-- Cột chiếm 9 phần -->
                    <div class="col-md-9 col-sm-12 col-xs-12">
                        <img src="../img/1920x1055.webp" alt="Image 1"
                            style="width: 100%; height: auto; object-fit: cover;">
                    </div>
                    <!-- Cột chiếm 3 phần -->
                    <div class="row col-md-3">
                        <div class="col-md-12 col-sm-4 col-4" style="padding: 0;">
                            <img src="../img/natrol-grid-banner.webp" alt="Image 1"
                                style="width: 100%; height: auto; padding: 0 0 11px 0;">
                        </div>
                        <div class="col-md-12 col-sm-4 col-4" style="padding: 0;">
                            <img src="../img/nhan_sam_an_do_-_t14_800x450__1_.webp" alt="Image 2"
                                style="width: 100%; height: auto; padding: 0 0 11px 0;">
                        </div>
                        <div class="col-md-12 col-sm-4 col-4" style="padding: 0;">
                            <img src="../img/jarrow-formulas-grid-banner.webp" alt="Image 3"
                                style="width: 100%; height: 96%; ">
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-md-12" style="padding: 30px 0 0 0;">
                <div class="button-list-wrapper">
                    <div class="button-list"><a>Sản Phẩm Ngủ Ngon</a></div>
                    <div class="button-list"><a>Trĩ Não</a></div>
                    <div class="button-list"><a>Sinh Lý Nam Giới</a></div>
                    <div class="button-list"><a>Huyết Áp Tim Mạch</a></div>
                    <div class="button-list"><a>Canxi, Xương Khớp</a></div>
                    <div class="button-list"><a>Stress & Mood</a></div>
                    <div class="button-list"><a>Vitamin</a></div>
                </div>
            </div>
        </div>

    </div>

    <?php
           // Bao gồm file header.php
             include 'dealsoc.php';
             ?>
    <?php
           // Bao gồm file header.php
             include 'chamsocsuckhoe.php';
             ?>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    <script>
    function addToCart(productId) {
        const quantity = parseInt(document.getElementById('quantity').value);
        const product = {
            id: productId,
            img: "<?php echo $row['img']; ?>",
            name: "<?php echo $row['tensanpham']; ?>",
            price: <?php echo $row['gia']; ?>,
            quantity: quantity
        };

        // Lấy dữ liệu giỏ hàng từ localStorage
        let cart = JSON.parse(localStorage.getItem('cart')) || [];

        // Kiểm tra sản phẩm đã có trong giỏ hàng chưa
        const existingProduct = cart.find(item => item.id === productId);
        if (existingProduct) {
            existingProduct.quantity += quantity;
        } else {
            cart.push(product);
        }

        // Cập nhật lại giỏ hàng vào localStorage
        localStorage.setItem('cart', JSON.stringify(cart));

        // Hiển thị giỏ hàng
        displayCart();
    }
    </script>
    <script>
    function displayCart() {
        const cartItemsContainer = document.getElementById('cartItems');
        const totalPriceContainer = document.getElementById('totalPrice');
        const cart = JSON.parse(localStorage.getItem('cart')) || [];

        cartItemsContainer.innerHTML = ''; // Xóa dữ liệu cũ
        let total = 0;

        cart.forEach(item => {
            const itemTotal = item.price * item.quantity;
            total += itemTotal;
            cartItemsContainer.innerHTML += `
            <div class="cart-item">
                <span class="remove-item" onclick="removeFromCart(${item.id})" style="cursor:pointer; color:red; margin-left: 10px; ">×</span>
                <img src="${item.img}" alt="${item.name}" width="50">
                <span>${item.name}</span>
                <div class="quantity" style = "    margin: 0px 16px;
    background-color: grey;
    padding: 6px;">${item.quantity}</div>

                <span>${itemTotal.toLocaleString()}₫</span>
            </div>
        `;
        });

        totalPriceContainer.innerText = `${total.toLocaleString()}₫`;
    }



    // Hiển thị giỏ hàng khi trang tải
    window.onload = displayCart;

    function removeFromCart(productId) {
        // Lấy dữ liệu giỏ hàng từ localStorage
        let cart = JSON.parse(localStorage.getItem('cart')) || [];

        // Lọc ra các sản phẩm không phải là sản phẩm cần xóa
        cart = cart.filter(item => item.id !== productId);

        // Cập nhật lại giỏ hàng vào localStorage
        localStorage.setItem('cart', JSON.stringify(cart));

        // Hiển thị lại giỏ hàng
        displayCart();
    }
    </script>

    <style>
    .cart-item img {
        margin-bottom: 5px;
    }

    .cart-item span {
        margin-bottom: 5px;
    }

    .quantity {
        font-size: 14px;
        color: #333;
    }

    .cart-item {
        position: relative;
        padding: 10px;
        border: 1px solid #ddd;
    }

    .remove-item {
        position: absolute;
        top: 5px;
        right: 5px;
        color: red;
        font-size: 20px;
        cursor: pointer;
    }
    </style>
</body>

</html>