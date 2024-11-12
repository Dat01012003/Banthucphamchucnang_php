document.querySelectorAll('.quantity-btn').forEach((btn) => {
    btn.addEventListener('click', (e) => {
        const input = e.target.parentElement.querySelector('.quantity-input');
        const productItem = e.target.closest('.product-item');
        const idCart = productItem.dataset.idCart;
        let quantity = parseInt(input.value);

        if (e.target.classList.contains('minus')) {
            quantity = Math.max(1, quantity - 1);
        } else {
            quantity++;
        }

        input.value = quantity;

        // Gửi AJAX cập nhật số lượng
        fetch('../Database/update_cart.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ id_cart: idCart, quantity: quantity }),
        })
            .then((response) => response.json())
            .then((data) => {
                if (data.status === 'success') {
                    // Cập nhật tổng tiền sản phẩm
                    const price = parseInt(
                        productItem.querySelector('.current-price').textContent.replace(/[,.₫]/g, '')
                    );
                    const total = price * quantity;
                    productItem.querySelector('.product-total').textContent =
                        total.toLocaleString() + '₫';

                    // Cập nhật tổng tiền giỏ hàng
                    updateTotal();
                } else {
                    alert(data.message);
                }
            });
    });
});

// Xóa sản phẩm
function removeProduct(productId) {
    // Tạo một yêu cầu AJAX đến remove_cart.php
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "../Database/remove_cart.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    // Xử lý phản hồi từ server
    xhr.onload = function () {
        if (xhr.status === 200) {
            if (xhr.responseText.trim() === "success") {
                // Xóa sản phẩm khỏi giao diện nếu thành công
                location.reload(); // Reload để cập nhật lại giỏ hàng
            } else {
                alert("Xóa sản phẩm không thành công!");
            }
        }
    };

    // Gửi dữ liệu product_id cho server
    xhr.send("product_id=" + productId);
}

// Cập nhật tổng số tiền
function updateTotal() {
    let total = 0;
    document.querySelectorAll('.product-total').forEach((item) => {
        total += parseInt(item.textContent.replace(/[,.₫]/g, ''));
    });
    document.querySelector('.total-price').textContent = total.toLocaleString() + '₫';
}
