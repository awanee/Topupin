// Initialize variables to store selections
let selectedNominal = null;
let selectedPaymentMethod = null;

// Add event listeners to nominal cards
document.querySelectorAll('.nominal-card').forEach(card => {
    card.addEventListener('click', function() {
        // Remove active class from all cards
        document.querySelectorAll('.nominal-card').forEach(c => {
            c.classList.remove('ring-2', 'ring-yellow-400');
        });
        
        // Add active class to selected card
        this.classList.add('ring-2', 'ring-yellow-400');
        
        // Get the price and amount from data attributes and elements
        const price = this.getAttribute('data-price');
        const amount = this.querySelector('.p-2.text-center').innerText.split('\n')[0].trim();
        
        selectedNominal = {
            price: price,
            amount: amount
        };
        
        // Update the order summary
        updateOrderSummary();
    });
});

// Add event listeners to payment methods
document.querySelectorAll('.payment-method').forEach(method => {
    method.addEventListener('click', function() {
        // Remove active class from all payment methods
        document.querySelectorAll('.payment-method').forEach(m => {
            m.classList.remove('ring-2', 'ring-yellow-400');
        });
        
        // Add active class to selected payment method
        this.classList.add('ring-2', 'ring-yellow-400');
        
        // Get the payment method from data attribute
        selectedPaymentMethod = this.getAttribute('data-method');
        
        // Update the payment display
        updatePaymentDisplay();
    });
});

// Function to update order summary
function updateOrderSummary() {
    if (selectedNominal) {
        // Format the price for display (adding 'Rp' prefix)
        const priceDisplay = `Rp${selectedNominal.price}`;
        
        // Update the price displays
        document.getElementById('price-display').innerText = priceDisplay;
        document.getElementById('total-price-display').innerText = priceDisplay;
        
        // Update the diamond amount display
        document.getElementById('amount-display').innerText = selectedNominal.amount;
        
        // Update the header of the "Membeli Item" section to include the diamond amount
        const buyingItemElement = document.querySelector('.bg-gray-800.rounded.border.border-lime-300 .flex.justify-between:first-child span:first-child');
        if (buyingItemElement) {
            buyingItemElement.innerText = `Membeli Item: ${selectedNominal.amount}`;
        }
        
        // Update the item details content for "Lihat rincian" section
        const itemDetailLink = document.querySelector('.bg-gray-800.rounded.border.border-lime-300 .flex.justify-between:first-child a');
        if (itemDetailLink) {
            // Store the item details in a data attribute for display later
            itemDetailLink.setAttribute('data-item-details', `Valorant - ${selectedNominal.amount}`);
            
            // Optional: Add click handler to show details
            if (!itemDetailLink.hasAttribute('data-has-handler')) {
                itemDetailLink.setAttribute('data-has-handler', 'true');
                itemDetailLink.addEventListener('click', function(e) {
                    e.preventDefault();
                    alert(`Detail pembelian:\n${this.getAttribute('data-item-details')}`);
                });
            }
        }
    } else {
        document.getElementById('price-display').innerText = 'Rp0';
        document.getElementById('total-price-display').innerText = 'Rp0';
        document.getElementById('amount-display').innerText = '0 Diamonds';
        
        // Reset text if nothing is selected
        const buyingItemElement = document.querySelector('.bg-gray-800.rounded.border.border-lime-300 .flex.justify-between:first-child span:first-child');
        if (buyingItemElement) {
            buyingItemElement.innerText = 'Membeli Item';
        }
    }
}

// Function to update payment display
function updatePaymentDisplay() {
    const paymentDisplay = document.getElementById('payment-method-display');
    if (paymentDisplay && selectedPaymentMethod) {
        paymentDisplay.innerText = selectedPaymentMethod;
    } else if (paymentDisplay) {
        paymentDisplay.innerText = 'Pilih metode pembayaran';
    }
}