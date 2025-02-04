document.addEventListener('DOMContentLoaded', function() {
    const cart = [];

    // Load products via AJAX
    function loadProducts() {
        fetch('products.php')
            .then(response => response.json())
            .then(products => {
                const productContainer = document.querySelector('.product-list');
                productContainer.innerHTML = '';
                products.forEach(product => {
                    const productElement = document.createElement('div');
                    productElement.classList.add('product');
                    productElement.innerHTML = `
                        <img src="${product.image}" alt="${product.name}">
                        <h3>${product.name}</h3>
                        <p>Price: $${product.price}</p>
                        <button onclick="addToCart(${product.id})">Add to Cart</button>
                    `;
                    productContainer.appendChild(productElement);
                });
            });
    }

    // Add product to cart
    window.addToCart = function(productId) {
        fetch('products.php')
            .then(response => response.json())
            .then(products => {
                const product = products.find(p => p.id === productId);
                cart.push(product);
                updateCart();
            });
    };

    // Update cart display
    function updateCart() {
        const cartContainer = document.querySelector('.cart-list');
        cartContainer.innerHTML = '';
        cart.forEach(item => {
            const cartItem = document.createElement('div');
            cartItem.classList.add('cart-item');
            cartItem.innerHTML = `
                <h3>${item.name}</h3>
                <p>Price: $${item.price}</p>
            `;
            cartContainer.appendChild(cartItem);
        });
        const cartTotal = cart.reduce((total, item) => total + item.price, 0);
        document.getElementById('cart-total').textContent = cartTotal;
    }

    // Search for products
    document.getElementById('search').addEventListener('input', function() {
        const searchQuery = this.value.toLowerCase();
        const productElements = document.querySelectorAll('.product');
        productElements.forEach(productElement => {
            const productName = productElement.querySelector('h3').textContent.toLowerCase();
            if (productName.includes(searchQuery)) {
                productElement.style.display = '';
            } else {
                productElement.style.display = 'none';
            }
        });
    });

    // Load products on page load
    loadProducts();
});