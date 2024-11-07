let allProducts = [];
let displayedCount = 0;
const productsPerPage = 5;

function searchProduct(event) {
    event.preventDefault();
    const searchInput = document.getElementById('search').value.toLowerCase();
    const resultsContainer = document.getElementById('searchResults');
    resultsContainer.innerHTML = ''; // Xóa kết quả cũ
    displayedCount = 0; // Đặt lại số sản phẩm đã hiển thị

    fetch(`../Database/fetch_products.php?search=${encodeURIComponent(searchInput)}`)
        .then(response => response.json())
        .then(products => {
            allProducts = products;
            if (allProducts.length === 0) {
                resultsContainer.innerHTML = '<p>Không tìm thấy sản phẩm nào.</p>';
            } else {
                displayProducts(); // Hiển thị các sản phẩm đầu tiên
            }
        })
        .catch(error => {
            console.error('Lỗi khi gọi API:', error);
            resultsContainer.innerHTML = '<p>Đã xảy ra lỗi khi tìm kiếm.</p>';
        });
}

function displayProducts() {
    const resultsContainer = document.getElementById('searchResults');
    const nextCount = Math.min(displayedCount + productsPerPage, allProducts.length);

    for (let i = displayedCount; i < nextCount; i++) {
        const product = allProducts[i];
        const productElement = document.createElement('div');
        productElement.classList.add('product');
        productElement.innerHTML = `
        <a href="../product details/super_sale.php?id=${product.id}">
            <img src="${product.img}" alt="${product.tensanpham}" class="product-img">
        </a>
        <h3>${product.tensanpham}</h3>
        <p class="product-price">Giá: ${product.gia} VND</p>
    `;
        resultsContainer.appendChild(productElement);
    }


    displayedCount = nextCount;

    // Hiển thị hoặc ẩn nút "Xem thêm" dựa trên số sản phẩm hiển thị
    const loadMoreButton = document.getElementById('loadMoreButton');
    if (displayedCount < allProducts.length) {
        loadMoreButton.style.display = 'block';
    } else {
        loadMoreButton.style.display = 'none';
    }
}