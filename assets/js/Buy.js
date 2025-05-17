// Buy.js - Khusus untuk halaman pembelian dan checkout produk
document.addEventListener('DOMContentLoaded', function() {
    initBuyPageFunctions();
});

// Inisialisasi fungsi-fungsi khusus halaman pembelian
function initBuyPageFunctions() {
    // Tambahkan animasi untuk tombol back
    enhanceBackButton();
    
    // Inisialisasi fungsi tombol beli
    handleBuyNowButton();
    handleCartButton();
    
    // Inisialisasi fitur jumlah produk
    initQuantitySelector();
    
    // Cek stok produk
    checkProductAvailability();
    
    // Tambahkan event listener untuk produk rekomendasi/lainnya
    initRelatedProductButtons();
}

// Meningkatkan fungsionalitas tombol back
function enhanceBackButton() {
    const backButton = document.querySelector('[onclick="window.history.back()"]');
    
    if (backButton) {
        // Mengganti fungsi onclick dengan direct link ke Account.html
        backButton.removeAttribute('onclick');
        backButton.addEventListener('click', function(e) {
            e.preventDefault();
            window.location.href = 'Account.html';
        });
        
        backButton.addEventListener('mouseenter', function() {
            // Animasi saat hover
            this.querySelector('i').style.transform = 'translateX(-3px)';
            this.querySelector('i').style.transition = 'transform 0.3s ease';
        });
        
        backButton.addEventListener('mouseleave', function() {
            // Reset animasi
            this.querySelector('i').style.transform = 'translateX(0)';
        });
    }
}

// Menangani tombol "Beli Sekarang"
function handleBuyNowButton() {
    const buyNowButton = document.querySelector('button.bg-lime-400.text-black.font-bold');
    
    if (buyNowButton) {
        buyNowButton.addEventListener('click', function() {
            // Ambil data produk
            const productTitle = document.querySelector('h2.text-2xl').textContent;
            const productPrice = document.querySelector('p.text-lime-400.text-2xl.font-bold').textContent;
            
            // Proses pembelian
            processPurchase(productTitle, productPrice);
        });
    }
}

// Menangani tombol "Masukkan Keranjang"
function handleCartButton() {
    const cartButton = document.querySelector('button:has(i.fa-heart)');
    
    if (cartButton) {
        cartButton.addEventListener('click', function() {
            // Ambil data produk
            const productTitle = document.querySelector('h2.text-2xl').textContent;
            const productPrice = document.querySelector('p.text-lime-400.text-2xl.font-bold').textContent;
            const productImg = document.querySelector('.col-span-1 img').src;
            
            // Ambil jumlah yang dipilih, default ke 1 jika tidak ada pemilih jumlah
            const quantityInput = document.querySelector('.quantity-input');
            const quantity = quantityInput ? parseInt(quantityInput.value) : 1;
            
            // Tambahkan ke keranjang
            addToCart(productTitle, productPrice, productImg, quantity);
            
            // Tampilkan notifikasi
            showCartNotification(productTitle);
        });
    }
}

// Inisialisasi pemilih jumlah produk
function initQuantitySelector() {
    // Cek apakah kita perlu menambahkan pemilih jumlah
    const productSection = document.querySelector('.col-span-2');
    
    if (productSection) {
        // Buat dan tambahkan pemilih jumlah jika belum ada
        if (!document.querySelector('.quantity-selector')) {
            createQuantitySelector(productSection);
        }
    }
}

// Buat elemen pemilih jumlah produk
function createQuantitySelector(parentElement) {
    // Cari tempat yang tepat untuk meletakkan pemilih jumlah
    const priceContainer = parentElement.querySelector('.flex.items-center.justify-between');
    
    if (priceContainer) {
        // Buat div untuk pemilih jumlah
        const quantityDiv = document.createElement('div');
        quantityDiv.className = 'quantity-selector flex items-center mt-3 mb-3';
        quantityDiv.innerHTML = `
            <span class="text-gray-400 mr-3">Jumlah:</span>
            <button class="quantity-btn decrement bg-gray-800 text-white w-8 h-8 rounded-l flex items-center justify-center">
                <i class="fas fa-minus"></i>
            </button>
            <input type="number" class="quantity-input bg-gray-700 text-white text-center w-12 h-8 border-0" value="1" min="1" max="10">
            <button class="quantity-btn increment bg-gray-800 text-white w-8 h-8 rounded-r flex items-center justify-center">
                <i class="fas fa-plus"></i>
            </button>
        `;
        
        // Tambahkan setelah elemen harga
        priceContainer.parentNode.insertBefore(quantityDiv, priceContainer.nextSibling);
        
        // Tambahkan event listener
        const decrementBtn = quantityDiv.querySelector('.decrement');
        const incrementBtn = quantityDiv.querySelector('.increment');
        const quantityInput = quantityDiv.querySelector('.quantity-input');
        
        decrementBtn.addEventListener('click', function() {
            let currentValue = parseInt(quantityInput.value);
            if (currentValue > 1) {
                quantityInput.value = currentValue - 1;
                updateTotalPrice();
            }
        });
        
        incrementBtn.addEventListener('click', function() {
            let currentValue = parseInt(quantityInput.value);
            const maxValue = parseInt(quantityInput.max) || 10;
            if (currentValue < maxValue) {
                quantityInput.value = currentValue + 1;
                updateTotalPrice();
            }
        });
        
        quantityInput.addEventListener('change', function() {
            // Validasi input manual
            let value = parseInt(this.value);
            const min = parseInt(this.min) || 1;
            const max = parseInt(this.max) || 10;
            
            if (isNaN(value) || value < min) {
                this.value = min;
            } else if (value > max) {
                this.value = max;
            }
            
            updateTotalPrice();
        });
    }
}

// Update total harga berdasarkan jumlah
function updateTotalPrice() {
    const quantityInput = document.querySelector('.quantity-input');
    const priceElement = document.querySelector('p.text-lime-400.text-2xl.font-bold');
    const originalPriceElement = document.querySelector('p.text-gray-400.text-sm.line-through');
    
    if (quantityInput && priceElement) {
        const quantity = parseInt(quantityInput.value);
        
        // Ekstrak harga dasar per item (disimpan sebagai data attribute jika belum ada)
        if (!priceElement.dataset.basePrice) {
            priceElement.dataset.basePrice = extractPrice(priceElement.textContent);
        }
        
        const basePrice = parseInt(priceElement.dataset.basePrice);
        
        // Update harga dengan jumlah baru
        priceElement.textContent = formatPrice(basePrice * quantity);
        
        // Update harga asli jika ada
        if (originalPriceElement) {
            if (!originalPriceElement.dataset.basePrice) {
                originalPriceElement.dataset.basePrice = extractPrice(originalPriceElement.textContent);
            }
            
            const baseOriginalPrice = parseInt(originalPriceElement.dataset.basePrice);
            originalPriceElement.textContent = formatPrice(baseOriginalPrice * quantity);
        }
    }
}

// Ekstrak nilai harga dari string format Rupiah
function extractPrice(priceString) {
    // Rp 11.999.000 atau Rp.11.100.000 -> 11999000
    return parseInt(priceString.replace(/[^\d]/g, ''));
}

// Format angka menjadi string harga Rupiah
function formatPrice(price) {
    return `Rp ${price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.')}`;
}

// Tambahkan produk ke keranjang belanja
function addToCart(title, price, imgSrc, quantity) {
    // Dapatkan keranjang dari penyimpanan lokal atau buat baru jika belum ada
    let cart = JSON.parse(localStorage.getItem('shoppingCart')) || [];
    
    // Cek apakah produk sudah ada di keranjang
    const existingItemIndex = cart.findIndex(item => item.title === title);
    
    if (existingItemIndex > -1) {
        // Update jumlah jika produk sudah ada
        cart[existingItemIndex].quantity += quantity;
    } else {
        // Tambahkan produk baru ke keranjang
        cart.push({
            title: title,
            price: price,
            imgSrc: imgSrc,
            quantity: quantity,
            timestamp: Date.now()
        });
    }
    
    // Simpan keranjang ke penyimpanan lokal
    localStorage.setItem('shoppingCart', JSON.stringify(cart));
    
    // Update ikon keranjang jika perlu
    updateCartIcon();
}

// Update tampilan ikon keranjang
function updateCartIcon() {
    // Implementasi untuk memperbarui tampilan ikon keranjang belanja
    // Misalnya, menambahkan badge dengan jumlah item
    const cart = JSON.parse(localStorage.getItem('shoppingCart')) || [];
    const totalItems = cart.reduce((total, item) => total + item.quantity, 0);
    
    const cartIcon = document.querySelector('button:has(i.fa-shopping-cart)');
    
    if (cartIcon) {
        // Hapus badge yang sudah ada jika ada
        const existingBadge = cartIcon.querySelector('.cart-badge');
        if (existingBadge) {
            existingBadge.remove();
        }
        
        // Tambahkan badge baru jika ada item
        if (totalItems > 0) {
            const badge = document.createElement('span');
            badge.className = 'cart-badge absolute top-0 right-0 bg-lime-400 text-black text-xs rounded-full w-5 h-5 flex items-center justify-center';
            badge.textContent = totalItems > 9 ? '9+' : totalItems;
            
            // Pastikan posisi relatif untuk parent
            cartIcon.style.position = 'relative';
            
            cartIcon.appendChild(badge);
        }
    }
}

// Tampilkan notifikasi berhasil ditambahkan ke keranjang
function showCartNotification(productTitle) {
    // Buat elemen notifikasi
    const notification = document.createElement('div');
    notification.className = 'fixed top-5 right-5 bg-lime-400 text-black px-4 py-3 rounded-lg shadow-lg z-50 flex items-center transform translate-y-[-20px] opacity-0 transition-all duration-300';
    notification.innerHTML = `
        <i class="fas fa-check-circle mr-2"></i>
        <span>${productTitle} telah ditambahkan ke keranjang</span>
    `;
    
    // Tambahkan ke DOM
    document.body.appendChild(notification);
    
    // Animasi muncul
    setTimeout(() => {
        notification.style.transform = 'translateY(0)';
        notification.style.opacity = '1';
    }, 10);
    
    // Hapus notifikasi setelah beberapa detik
    setTimeout(() => {
        notification.style.transform = 'translateY(-20px)';
        notification.style.opacity = '0';
        
        setTimeout(() => {
            notification.remove();
        }, 300);
    }, 3000);
}

// Proses pembelian produk
function processPurchase(title, price) {
    // Dapatkan jumlah yang dipilih
    const quantityInput = document.querySelector('.quantity-input');
    const quantity = quantityInput ? parseInt(quantityInput.value) : 1;
    
    // Simpan detail pembelian ke local storage untuk penggunaan nanti
    const purchaseDetails = {
        title: title,
        price: price,
        quantity: quantity,
        timestamp: Date.now()
    };
    
    localStorage.setItem('currentPurchase', JSON.stringify(purchaseDetails));
    
    // Alihkan ke halaman PayOut.html
    window.location.href = 'PayOut.html';
}

// Tampilkan konfirmasi pembelian
function showPurchaseConfirmation(title, price, quantity) {
    // Buat dialog konfirmasi
    const confirmationDialog = document.createElement('div');
    confirmationDialog.className = 'fixed inset-0 flex items-center justify-center bg-black bg-opacity-70 z-50';
    confirmationDialog.innerHTML = `
        <div class="bg-gray-900 p-6 rounded-lg shadow-xl max-w-md w-full">
            <h3 class="text-xl font-bold text-white mb-4">Konfirmasi Pembelian</h3>
            <div class="mb-4">
                <p class="text-gray-300">Produk: <span class="text-white">${title}</span></p>
                <p class="text-gray-300">Harga: <span class="text-lime-400">${price}</span></p>
                <p class="text-gray-300">Jumlah: <span class="text-white">${quantity}</span></p>
            </div>
            <div class="border-t border-gray-700 pt-4 mt-4">
                <p class="text-gray-300 mb-4">Pilih metode pembayaran:</p>
                <div class="grid grid-cols-2 gap-2 mb-4">
                    <button class="payment-method bg-gray-800 hover:bg-gray-700 py-2 px-3 rounded text-sm flex items-center justify-center">
                        <img src="assets/logopembayaran/dana.png" alt="DANA" class="h-5 mr-2"> DANA
                    </button>
                    <button class="payment-method bg-gray-800 hover:bg-gray-700 py-2 px-3 rounded text-sm flex items-center justify-center">
                        <img src="assets/logopembayaran/ovo.png" alt="OVO" class="h-5 mr-2"> OVO
                    </button>
                    <button class="payment-method bg-gray-800 hover:bg-gray-700 py-2 px-3 rounded text-sm flex items-center justify-center">
                        <img src="assets/logopembayaran/qris.png" alt="QRIS" class="h-5 mr-2"> QRIS
                    </button>
                    <button class="payment-method bg-gray-800 hover:bg-gray-700 py-2 px-3 rounded text-sm flex items-center justify-center">
                        <img src="assets/logopembayaran/blu.png" alt="BLU" class="h-5 mr-2"> BLU
                    </button>
                </div>
            </div>
            <div class="flex space-x-3">
                <button id="cancel-purchase" class="bg-gray-700 hover:bg-gray-600 text-white py-2 px-4 rounded">Batal</button>
                <button id="confirm-purchase" class="bg-lime-400 hover:bg-lime-500 text-black font-bold py-2 px-4 rounded">Bayar Sekarang</button>
            </div>
        </div>
    `;
    
    // Tambahkan ke DOM
    document.body.appendChild(confirmationDialog);
    
    // Event listener untuk tombol
    document.getElementById('cancel-purchase').addEventListener('click', function() {
        confirmationDialog.remove();
    });
    
    // Aksi konfirmasi pembelian
    document.getElementById('confirm-purchase').addEventListener('click', function() {
        // Simulasi pengalihan ke halaman pembayaran
        confirmationDialog.innerHTML = `
            <div class="bg-gray-900 p-6 rounded-lg shadow-xl max-w-md w-full">
                <div class="text-center">
                    <i class="fas fa-spinner fa-spin text-lime-400 text-4xl mb-4"></i>
                    <h3 class="text-xl font-bold text-white mb-2">Memproses Pembayaran</h3>
                    <p class="text-gray-300">Mohon tunggu sebentar...</p>
                </div>
            </div>
        `;
        
        // Setelah beberapa detik, alihkan atau tampilkan pesan sukses
        setTimeout(() => {
            // Di implementasi nyata, ini akan mengarah ke halaman pembayaran resmi
            confirmationDialog.innerHTML = `
                <div class="bg-gray-900 p-6 rounded-lg shadow-xl max-w-md w-full">
                    <div class="text-center">
                        <i class="fas fa-check-circle text-lime-400 text-4xl mb-4"></i>
                        <h3 class="text-xl font-bold text-white mb-2">Pesanan Berhasil!</h3>
                        <p class="text-gray-300 mb-4">Detail pembayaran telah dikirim ke email Anda.</p>
                        <button id="close-confirmation" class="bg-lime-400 hover:bg-lime-500 text-black font-bold py-2 px-4 rounded">Tutup</button>
                    </div>
                </div>
            `;
            
            document.getElementById('close-confirmation').addEventListener('click', function() {
                confirmationDialog.remove();
                
                // Tampilkan notifikasi sukses
                const successNotification = document.createElement('div');
                successNotification.className = 'fixed bottom-5 right-5 bg-lime-400 text-black px-4 py-3 rounded-lg shadow-lg z-50';
                successNotification.innerHTML = `
                    <div class="flex items-center">
                        <i class="fas fa-check-circle mr-2"></i>
                        <span>Pembayaran berhasil! Detail akun akan dikirim segera.</span>
                    </div>
                `;
                
                document.body.appendChild(successNotification);
                
                // Hapus notifikasi setelah beberapa detik
                setTimeout(() => {
                    successNotification.remove();
                }, 5000);
            });
        }, 2000);
    });
    
    // Styling untuk metode pembayaran yang dipilih
    const paymentMethods = confirmationDialog.querySelectorAll('.payment-method');
    paymentMethods.forEach(method => {
        method.addEventListener('click', function() {
            // Hapus kelas aktif dari semua metode
            paymentMethods.forEach(btn => {
                btn.classList.remove('bg-lime-400', 'text-black');
                btn.classList.add('bg-gray-800', 'text-white');
            });
            
            // Tambahkan kelas aktif ke metode yang dipilih
            this.classList.remove('bg-gray-800', 'text-white');
            this.classList.add('bg-lime-400', 'text-black');
        });
    });
}

// Cek ketersediaan stok produk
function checkProductAvailability() {
    // Simulasi cek stok
    // Dalam implementasi nyata, ini akan mengambil data dari API/database
    
    // ID produk bisa didapatkan dari URL atau data-attribute
    const productId = getProductIdFromUrl() || '123'; // Default ID jika tidak ada
    
    // Simulasi data stok
    const stockData = {
        '123': { available: true, stock: 5 },
        '456': { available: true, stock: 2 },
        '789': { available: false, stock: 0 }
    };
    
    // Jika ada data stok untuk produk ini
    if (stockData[productId]) {
        const productData = stockData[productId];
        const buyNowButton = document.querySelector('button.bg-lime-400.text-black.font-bold');
        const cartButton = document.querySelector('button:has(i.fa-heart)');
        
        // Tampilkan status stok
        const productInfoContainer = document.querySelector('.col-span-2');
        if (productInfoContainer && !document.querySelector('.stock-status')) {
            const stockStatus = document.createElement('div');
            stockStatus.className = 'stock-status mb-3';
            
            if (productData.available && productData.stock > 0) {
                stockStatus.innerHTML = `
                    <span class="text-lime-400 text-sm flex items-center">
                        <i class="fas fa-check-circle mr-1"></i> Tersedia (${productData.stock} item)
                    </span>
                `;
                
                // Update max value pada input jumlah
                const quantityInput = document.querySelector('.quantity-input');
                if (quantityInput) {
                    quantityInput.max = productData.stock;
                    
                    // Tambahkan tooltip jika mencoba melebihi stok
                    quantityInput.addEventListener('change', function() {
                        if (parseInt(this.value) > productData.stock) {
                            showStockWarning(productData.stock);
                            this.value = productData.stock;
                        }
                    });
                }
            } else {
                stockStatus.innerHTML = `
                    <span class="text-red-500 text-sm flex items-center">
                        <i class="fas fa-times-circle mr-1"></i> Stok Habis
                    </span>
                `;
                
                // Nonaktifkan tombol beli jika stok habis
                if (buyNowButton) {
                    buyNowButton.disabled = true;
                    buyNowButton.classList.add('opacity-50', 'cursor-not-allowed');
                }
                
                if (cartButton) {
                    cartButton.disabled = true;
                    cartButton.classList.add('opacity-50', 'cursor-not-allowed');
                }
            }
            
            // Tambahkan status stok setelah harga
            const priceContainer = productInfoContainer.querySelector('.flex.items-center.justify-between');
            if (priceContainer) {
                priceContainer.parentNode.insertBefore(stockStatus, priceContainer.nextSibling);
            }
        }
    }
}

// Tampilkan peringatan stok terbatas
function showStockWarning(maxStock) {
    // Cek jika sudah ada peringatan
    if (document.querySelector('.stock-warning')) {
        return;
    }
    
    // Buat peringatan
    const warning = document.createElement('div');
    warning.className = 'stock-warning fixed top-5 right-5 bg-yellow-500 text-black px-4 py-3 rounded-lg shadow-lg z-50 transform translate-y-[-20px] opacity-0 transition-all duration-300';
    warning.innerHTML = `
        <div class="flex items-center">
            <i class="fas fa-exclamation-triangle mr-2"></i>
            <span>Stok terbatas, maksimal ${maxStock} item</span>
        </div>
    `;
    
    // Tambahkan ke DOM
    document.body.appendChild(warning);
    
    // Animasi muncul
    setTimeout(() => {
        warning.style.transform = 'translateY(0)';
        warning.style.opacity = '1';
    }, 10);
    
    // Hapus peringatan setelah beberapa detik
    setTimeout(() => {
        warning.style.transform = 'translateY(-20px)';
        warning.style.opacity = '0';
        
        setTimeout(() => {
            warning.remove();
        }, 300);
    }, 3000);
}

// Inisialisasi tombol produk terkait
function initRelatedProductButtons() {
    const productButtons = document.querySelectorAll('.grid-cols-2.md\\:grid-cols-3.lg\\:grid-cols-5 .bg-lime-400.text-black.text-xs');
    
    productButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            
            // Dapatkan data produk
            const productCard = this.closest('.bg-black.rounded-lg');
            const productTitle = productCard.querySelector('h3').textContent;
            const productDesc = productCard.querySelector('p.text-gray-400').textContent;
            const productPrice = productCard.querySelector('span.text-lime-400').textContent;
            const productImgSrc = productCard.querySelector('img').src;
            
            // Untuk demo, kita bisa mensimulasikan klik yang menyimpan ID produk dan merefresh halaman
            const productId = productTitle.replace(/\s+/g, '-').toLowerCase();
            
            // Simpan ID untuk dibuka dalam URL
            localStorage.setItem('lastViewedProductId', productId);
            localStorage.setItem('lastViewedProductTitle', productTitle);
            localStorage.setItem('lastViewedProductDesc', productDesc);
            localStorage.setItem('lastViewedProductPrice', productPrice);
            localStorage.setItem('lastViewedProductImg', productImgSrc);
            
            // Dalam implementasi nyata, ini akan menavigasi ke halaman produk dengan ID yang sesuai
            // Untuk demo, kita hanya refresh halaman
            window.location.search = `?id=${productId}`;
        });
    });
}

// Ambil ID produk dari URL
function getProductIdFromUrl() {
    // Format URL: /Buy.html?id=123
    const urlParams = new URLSearchParams(window.location.search);
    return urlParams.get('id');
}

// Saat halaman dimuat, jika ada data produk yang tersimpan, tampilkan
window.addEventListener('DOMContentLoaded', function() {
    const productId = getProductIdFromUrl();
    
    // Jika ada ID produk di URL dan ada data terakhir dilihat di localStorage
    if (productId && localStorage.getItem('lastViewedProductId') === productId) {
        // Dapatkan elemen-elemen yang perlu diupdate
        const productTitle = document.querySelector('h2.text-2xl');
        const productDesc = document.querySelector('.col-span-2 p.text-gray-400');
        const productPrice = document.querySelector('p.text-lime-400.text-2xl.font-bold');
        const productImg = document.querySelector('.col-span-1 img');
        
        // Update dengan data dari localStorage
        if (productTitle && localStorage.getItem('lastViewedProductTitle')) {
            productTitle.textContent = localStorage.getItem('lastViewedProductTitle');
        }
        
        if (productDesc && localStorage.getItem('lastViewedProductDesc')) {
            productDesc.textContent = localStorage.getItem('lastViewedProductDesc');
        }
        
        if (productPrice && localStorage.getItem('lastViewedProductPrice')) {
            productPrice.textContent = localStorage.getItem('lastViewedProductPrice');
        }
        
        if (productImg && localStorage.getItem('lastViewedProductImg')) {
            productImg.src = localStorage.getItem('lastViewedProductImg');
        }
    }
    
    // Update ikon keranjang belanja jika ada
    updateCartIcon();
});