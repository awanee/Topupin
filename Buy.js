// buy.js - JavaScript file for Buy page in Topupin Minecraft Shop

document.addEventListener('DOMContentLoaded', function() {
    // Load product details from localStorage
    loadProductDetails();
    
    // Initialize alternative products section
    loadAlternativeProducts();
    
    // Setup buttons
    setupButtons();
});

// Load product details from localStorage
function loadProductDetails() {
    const productInfo = JSON.parse(localStorage.getItem('currentProduct'));
    
    if (!productInfo) {
        // Redirect to home if no product info found
        window.location.href = 'Home.html';
        return;
    }
    
    // Update page with product details
    const productContainer = document.querySelector('.product-details');
    if (!productContainer) return;
    
    // Create product detail HTML
    productContainer.innerHTML = `
        <div class="flex flex-col md:flex-row gap-8 bg-slate-800 p-6 rounded-lg">
            <div class="md:w-1/3">
                <img src="${productInfo.imgSrc || '/img/placeholder.png'}" alt="${productInfo.title}" class="w-full rounded-lg">
            </div>
            <div class="md:w-2/3">
                <div class="mb-4">
                    <span class="inline-block bg-gray-700 text-white px-3 py-1 rounded-full text-sm mb-3">
                        ${productInfo.category}
                    </span>
                    <h1 class="text-2xl font-bold text-white">${productInfo.title}</h1>
                </div>
                <div class="mb-6">
                    <p class="text-2xl font-bold text-lime-400">${productInfo.price}</p>
                </div>
                <div class="mb-6">
                    <h3 class="text-white font-semibold mb-2">Deskripsi Produk:</h3>
                    <p class="text-gray-300">
                        Detail paket ${productInfo.title}. Nikmati berbagai fitur dan keunggulan produk ini.
                        Cocok untuk pemain Minecraft yang ingin meningkatkan pengalaman bermain.
                    </p>
                </div>
                <div class="flex flex-col sm:flex-row gap-4">
                    <button id="add-to-cart" class="bg-gray-700 hover:bg-gray-600 text-white font-bold py-3 px-6 rounded-lg transition-all">
                        <i class="fas fa-shopping-cart mr-2"></i> Tambah ke Keranjang
                    </button>
                    <button id="buy-now" class="bg-lime-400 hover:bg-lime-500 text-black font-bold py-3 px-6 rounded-lg transition-all">
                        <i class="fas fa-bolt mr-2"></i> Beli Sekarang
                    </button>
                </div>
            </div>
        </div>
    `;
    
    // Update page title
    document.title = `${productInfo.title} - Topupin`;
}

// Load alternative products
function loadAlternativeProducts() {
    const productInfo = JSON.parse(localStorage.getItem('currentProduct'));
    if (!productInfo) return;
    
    const alternativesContainer = document.createElement('div');
    alternativesContainer.className = 'mt-12';
    
    alternativesContainer.innerHTML = `
        <h2 class="text-xl font-bold text-white mb-6">Akun Lain yang Mungkin Anda Suka</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6" id="alternatives-grid">
            <!-- Alternative products will be loaded here -->
            <div class="bg-slate-800 p-4 rounded-lg relative">
                <span class="absolute top-2 left-2 bg-gray-700 text-white px-2 py-1 rounded-full text-xs">${productInfo.category}</span>
                <img src="/img/alt-product1.png" alt="Alternative 1" class="w-full h-40 object-cover rounded-lg mb-4">
                <h3 class="font-bold text-white mb-2">Premium Akun Minecraft</h3>
                <p class="text-gray-400 text-sm mb-4">Level 30, Full Enchantment</p>
                <div class="flex justify-between items-center">
                    <span class="text-lime-400 font-bold">Rp120.000</span>
                    <button class="bg-lime-400 hover:bg-lime-500 font-semibold px-4 py-1 rounded text-black alt-buy-btn" data-product="Premium Akun">Beli</button>
                </div>
                <div class="absolute top-2 right-2">
                    <i class="far fa-star text-gray-400"></i>
                </div>
            </div>
            
            <div class="bg-slate-800 p-4 rounded-lg relative">
                <span class="absolute top-2 left-2 bg-gray-700 text-white px-2 py-1 rounded-full text-xs">${productInfo.category}</span>
                <img src="/img/alt-product2.png" alt="Alternative 2" class="w-full h-40 object-cover rounded-lg mb-4">
                <h3 class="font-bold text-white mb-2">Pro Akun Minecraft</h3>
                <p class="text-gray-400 text-sm mb-4">Level 50, Unlimited Resources</p>
                <div class="flex justify-between items-center">
                    <span class="text-lime-400 font-bold">Rp150.000</span>
                    <button class="bg-lime-400 hover:bg-lime-500 font-semibold px-4 py-1 rounded text-black alt-buy-btn" data-product="Pro Akun">Beli</button>
                </div>
                <div class="absolute top-2 right-2">
                    <i class="far fa-star text-gray-400"></i>
                </div>
            </div>
            
            <div class="bg-slate-800 p-4 rounded-lg relative">
                <span class="absolute top-2 left-2 bg-gray-700 text-white px-2 py-1 rounded-full text-xs">${productInfo.category}</span>
                <img src="/img/alt-product3.png" alt="Alternative 3" class="w-full h-40 object-cover rounded-lg mb-4">
                <h3 class="font-bold text-white mb-2">Ultimate Akun Minecraft</h3>
                <p class="text-gray-400 text-sm mb-4">Level 100, All Skins Unlocked</p>
                <div class="flex justify-between items-center">
                    <span class="text-lime-400 font-bold">Rp200.000</span>
                    <button class="bg-lime-400 hover:bg-lime-500 font-semibold px-4 py-1 rounded text-black alt-buy-btn" data-product="Ultimate Akun">Beli</button>
                </div>
                <div class="absolute top-2 right-2">
                    <i class="far fa-star text-gray-400"></i>
                </div>
            </div>
        </div>
    `;
    
    // Append to main container
    const mainContainer = document.querySelector('.container');
    if (mainContainer) {
        mainContainer.appendChild(alternativesContainer);
    } else {
        document.body.appendChild(alternativesContainer);
    }
    
    // Add event listeners to alternative buy buttons
    const altBuyButtons = document.querySelectorAll('.alt-buy-btn');
    altBuyButtons.forEach(button => {
        button.addEventListener('click', function() {
            const productCard = this.closest('.bg-slate-800');
            const title = productCard.querySelector('.font-bold').textContent;
            const price = productCard.querySelector('.text-lime-400').textContent;
            const category = productCard.querySelector('.absolute.top-2.left-2').textContent;
            const imgSrc = productCard.querySelector('img')?.src || '';
            
            // Save alternative product info to localStorage
            const productInfo = {
                title: title,
                price: price,
                category: category,
                imgSrc: imgSrc
            };
            
            localStorage.setItem('currentProduct', JSON.stringify(productInfo));
            
            // Reload the page to show the new product
            location.reload();
        });
    });
}

// Setup buttons functionality
function setupButtons() {
    // Get buttons
    const addToCartBtn = document.getElementById('add-to-cart');
    const buyNowBtn = document.getElementById('buy-now');
    
    if (addToCartBtn) {
        addToCartBtn.addEventListener('click', function() {
            const productInfo = JSON.parse(localStorage.getItem('currentProduct'));
            if (!productInfo) return;
            
            // Add to cart
            addToCart(productInfo);
            
            // Show confirmation
            showNotification('Item berhasil ditambahkan ke keranjang!');
        });
    }
    
    if (buyNowBtn) {
        buyNowBtn.addEventListener('click', function() {
            const productInfo = JSON.parse(localStorage.getItem('currentProduct'));
            if (!productInfo) return;
            
            // Add to cart
            addToCart(productInfo);
            
            // Go to checkout
            window.location.href = 'Checkout.html';
        });
    }
}

// Shopping cart functionality
function initShoppingCart() {
    const cartButton = document.querySelector('.fa-shopping-cart')?.parentElement;
    const buyButtons = document.querySelectorAll('button.bg-lime-400');
    
    // Initialize cart data
    let cartItems = [];
    
    buyButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            if (!button.textContent.includes('Masukkan Keranjang')) return;
            
            e.preventDefault();
            
            // Get product info
            const productCard = this.closest('.bg-slate-800');
            const title = productCard.querySelector('.font-bold').textContent;
            const price = productCard.querySelector('.text-lime-400').textContent;
            const category = productCard.querySelector('.absolute.top-2.left-2').textContent;
            
            // Add to cart
            addToCart({
                title: title,
                price: price,
                category: category
            });
            
            // Show confirmation
            showAddedToCartMessage(productCard);
        });
    });
    
    if (cartButton) {
        cartButton.addEventListener('click', function() {
            showCartModal();
        });
    }
    
    // Add to cart function
    function addToCart(item) {
        cartItems.push(item);
        updateCartCounter();
        
        // Optional: save to localStorage
        saveCartToLocalStorage();
    }
    
    // Update cart counter
    function updateCartCounter() {
        if (!cartButton) return;
        
        // Create counter if doesn't exist
        let counter = document.querySelector('.cart-counter');
        
        if (!counter) {
            counter = document.createElement('span');
            counter.className = 'cart-counter absolute -top-2 -right-2 bg-lime-400 text-black text-xs rounded-full w-5 h-5 flex items-center justify-center';
            cartButton.appendChild(counter);
        }
        
        counter.textContent = cartItems.length;
        
        if (cartItems.length === 0) {
            counter.style.display = 'none';
        } else {
            counter.style.display = 'flex';
        }
    }
    
    // Show added to cart message
    function showAddedToCartMessage(productCard) {
        const msg = document.createElement('div');
        msg.className = 'added-to-cart-msg absolute top-0 left-0 w-full h-full bg-black bg-opacity-70 flex items-center justify-center';
        msg.innerHTML = '<div class="text-lime-400 font-bold py-2 px-4 rounded">Ditambahkan ke keranjang!</div>';
        
        productCard.style.position = 'relative';
        productCard.appendChild(msg);
        
        setTimeout(() => {
            msg.remove();
        }, 1500);
    }
    
    // Save cart to localStorage
    function saveCartToLocalStorage() {
        localStorage.setItem('topupinCart', JSON.stringify(cartItems));
    }
    
    // Load cart from localStorage
    function loadCartFromLocalStorage() {
        const savedCart = localStorage.getItem('topupinCart');
        if (savedCart) {
            cartItems = JSON.parse(savedCart);
            updateCartCounter();
        }
    }
    
    // Show cart modal
    function showCartModal() {
        // Create modal
        const modal = document.createElement('div');
        modal.className = 'cart-modal fixed top-0 left-0 w-full h-full bg-black bg-opacity-75 flex items-center justify-center z-50';
        
        let cartContent = '';
        let totalPrice = 0;
        
        if (cartItems.length === 0) {
            cartContent = '<p class="text-gray-300 mb-4">Keranjang belanja kosong.</p>';
        } else {
            cartContent = '<div class="max-h-60 overflow-y-auto mb-4">';
            cartItems.forEach((item, index) => {
                // Extract price value
                const priceText = item.price.replace(/[^\d]/g, '');
                const price = parseInt(priceText, 10);
                totalPrice += price;
                
                cartContent += `
                    <div class="flex justify-between items-center py-2 border-b border-gray-700">
                        <div>
                            <p class="font-bold">${item.title}</p>
                            <p class="text-sm text-gray-400">${item.category}</p>
                        </div>
                        <div class="flex items-center">
                            <p class="text-lime-400 mr-4">${item.price}</p>
                            <button class="remove-item text-red-500 hover:text-red-300" data-index="${index}">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </div>
                `;
            });
            cartContent += '</div>';
            
            // Add total
            cartContent += `
                <div class="flex justify-between items-center py-2 border-t border-gray-500 font-bold">
                    <span>Total:</span>
                    <span class="text-lime-400">Rp${totalPrice.toLocaleString()}</span>
                </div>
            `;
        }
        
        modal.innerHTML = `
            <div class="bg-gray-900 p-6 rounded-lg w-full max-w-md">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-xl font-bold text-white">Keranjang Belanja</h2>
                    <button class="close-modal text-gray-500 hover:text-white">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                ${cartContent}
                <div class="flex justify-between mt-4">
                    <button class="bg-gray-700 text-white px-4 py-2 rounded hover:bg-gray-600 close-modal">
                        Tutup
                    </button>
                    ${cartItems.length > 0 ? `
                        <button class="bg-lime-400 text-black px-4 py-2 rounded hover:bg-lime-500 checkout-btn">
                            Checkout
                        </button>
                    ` : ''}
                </div>
            </div>
        `;
        
        document.body.appendChild(modal);
        
        // Add event listeners
        modal.querySelector('.close-modal').addEventListener('click', function() {
            modal.remove();
        });
        
        const removeButtons = modal.querySelectorAll('.remove-item');
        removeButtons.forEach(button => {
            button.addEventListener('click', function() {
                const index = parseInt(this.dataset.index, 10);
                removeItemFromCart(index);
                modal.remove();
                showCartModal();
            });
        });
        
        const checkoutBtn = modal.querySelector('.checkout-btn');
        if (checkoutBtn) {
            checkoutBtn.addEventListener('click', function() {
                checkout();
                modal.remove();
            });
        }
    }
}
// Update cart counter in header
function updateCartCounter(count) {
    const cartButton = document.querySelector('.fa-shopping-cart')?.parentElement;
    if (!cartButton) return;
    
    // Create counter if doesn't exist
    let counter = document.querySelector('.cart-counter');
    
    if (!counter) {
        counter = document.createElement('span');
        counter.className = 'cart-counter absolute -top-2 -right-2 bg-lime-400 text-black text-xs rounded-full w-5 h-5 flex items-center justify-center';
        cartButton.appendChild(counter);
    }
    
    counter.textContent = count;
    
    if (count === 0) {
        counter.style.display = 'none';
    } else {
        counter.style.display = 'flex';
    }
}

// Show notification
function showNotification(message) {
    const notification = document.createElement('div');
    notification.className = 'fixed top-4 right-4 bg-lime-400 text-black py-2 px-4 rounded-lg shadow-lg z-50 notification';
    notification.innerHTML = `
        <div class="flex items-center gap-2">
            <i class="fas fa-check-circle"></i>
            <span>${message}</span>
        </div>
    `;
    
    document.body.appendChild(notification);
    
    // Add slide-in animation
    notification.style.animation = 'slideIn 0.3s ease-out forwards';
    
    // Remove after 3 seconds
    setTimeout(() => {
        notification.style.animation = 'slideOut 0.3s ease-in forwards';
        setTimeout(() => {
            notification.remove();
        }, 300);
    }, 3000);
    
    // Add style for animations
    const style = document.createElement('style');
    style.textContent = `
        @keyframes slideIn {
            from { transform: translateX(100%); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }
        
        @keyframes slideOut {
            from { transform: translateX(0); opacity: 1; }
            to { transform: translateX(100%); opacity: 0; }
        }
    `;
    
    document.head.appendChild(style);
}