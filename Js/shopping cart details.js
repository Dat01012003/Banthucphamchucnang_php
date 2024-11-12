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
document.querySelectorAll('.remove-product').forEach((btn) => {
    btn.addEventListener('click', (e) => {
        const productItem = e.target.closest('.product-item');
        const idCart = productItem.dataset.idCart;

        // Gửi AJAX xóa sản phẩm
        fetch('../Database/delete_cart.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ id_cart: idCart }),
        })
            .then((response) => response.json())
            .then((data) => {
                if (data.status === 'success') {
                    productItem.remove();
                    updateTotal();
                } else {
                    alert(data.message);
                }
            });
    });
});

// Cập nhật tổng số tiền
function updateTotal() {
    let total = 0;
    document.querySelectorAll('.product-total').forEach((item) => {
        total += parseInt(item.textContent.replace(/[,.₫]/g, ''));
    });
    document.querySelector('.total-price').textContent = total.toLocaleString() + '₫';
}
