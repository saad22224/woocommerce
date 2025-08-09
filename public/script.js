// Sample product data
const products = [
    {
        id: 1,
        title: "هاتف ذكي فائق الجودة",
        price: 1299,
        oldPrice: 1499,
        image: "https://images.pexels.com/photos/788946/pexels-photo-788946.jpeg?auto=compress&cs=tinysrgb&w=400",
        description: "هاتف ذكي بتقنيات متطورة وكاميرا عالية الدقة",
        category: "electronics"
    },
    {
        id: 2,
        title: "ساعة يد أنيقة",
        price: 599,
        oldPrice: 799,
        image: "https://images.pexels.com/photos/190819/pexels-photo-190819.jpeg?auto=compress&cs=tinysrgb&w=400",
        description: "ساعة يد كلاسيكية بتصميم عصري",
        category: "fashion"
    },
    {
        id: 3,
        title: "لابتوب عالي الأداء",
        price: 2999,
        oldPrice: 3499,
        image: "https://images.pexels.com/photos/205421/pexels-photo-205421.jpeg?auto=compress&cs=tinysrgb&w=400",
        description: "لابتوب مثالي للعمل والألعاب",
        category: "electronics"
    },
    {
        id: 4,
        title: "حقيبة يد فاخرة",
        price: 899,
        oldPrice: 1199,
        image: "https://images.pexels.com/photos/1152077/pexels-photo-1152077.jpeg?auto=compress&cs=tinysrgb&w=400",
        description: "حقيبة يد جلدية فاخرة للمناسبات الخاصة",
        category: "fashion"
    },
    {
        id: 5,
        title: "كتاب التطوير الذاتي",
        price: 89,
        oldPrice: 129,
        image: "https://images.pexels.com/photos/1029141/pexels-photo-1029141.jpeg?auto=compress&cs=tinysrgb&w=400",
        description: "دليل شامل للنجاح والتطوير الشخصي",
        category: "books"
    },
    {
        id: 6,
        title: "مصباح ديكور عصري",
        price: 299,
        oldPrice: 399,
        image: "https://images.pexels.com/photos/1112598/pexels-photo-1112598.jpeg?auto=compress&cs=tinysrgb&w=400",
        description: "مصباح LED بتصميم عصري للمنزل",
        category: "home"
    },
    {
        id: 7,
        title: "سماعات لاسلكية",
        price: 399,
        oldPrice: 549,
        image: "https://images.pexels.com/photos/3394650/pexels-photo-3394650.jpeg?auto=compress&cs=tinysrgb&w=400",
        description: "سماعات بلوتوث عالية الجودة",
        category: "electronics"
    },
    {
        id: 8,
        title: "كرسي مكتب مريح",
        price: 1299,
        oldPrice: 1599,
        image: "https://images.pexels.com/photos/1145434/pexels-photo-1145434.jpeg?auto=compress&cs=tinysrgb&w=400",
        description: "كرسي مكتب ergonomic للراحة القصوى",
        category: "home"
    }
];

// Shopping cart
let cart = JSON.parse(localStorage.getItem('cart')) || [];

// DOM elements
const cartBtn = document.getElementById('cart-btn');
const cartSidebar = document.getElementById('cart-sidebar');
const cartOverlay = document.getElementById('cart-overlay');
const closeCart = document.getElementById('close-cart');
const cartItems = document.getElementById('cart-items');
const cartCount = document.getElementById('cart-count');
const cartTotal = document.getElementById('cart-total');
const hamburger = document.getElementById('hamburger');
const navMenu = document.getElementById('nav-menu');

// Initialize
document.addEventListener('DOMContentLoaded', function() {
    updateCartUI();
    
    // Load products based on current page
    if (document.getElementById('products-grid')) {
        loadFeaturedProducts();
    }
    
    if (document.getElementById('all-products-grid')) {
        loadAllProducts();
    }
    
    if (document.getElementById('related-products')) {
        loadRelatedProducts();
    }
    
    // Initialize product detail page
    if (window.location.pathname.includes('product-detail.html')) {
        initProductDetail();
    }
    
    // Initialize checkout page
    if (window.location.pathname.includes('checkout.html')) {
        initCheckout();
    }
    
    // Initialize contact page
    if (window.location.pathname.includes('contact.html')) {
        initContact();
    }
});

// Cart functionality
function toggleCart() {
    cartSidebar.classList.toggle('active');
    cartOverlay.classList.toggle('active');
    document.body.style.overflow = cartSidebar.classList.contains('active') ? 'hidden' : 'auto';
}

function addToCart(productId, quantity = 1) {
    const product = products.find(p => p.id === productId);
    if (!product) return;
    
    const existingItem = cart.find(item => item.id === productId);
    
    if (existingItem) {
        existingItem.quantity += quantity;
    } else {
        cart.push({
            ...product,
            quantity: quantity
        });
    }
    
    localStorage.setItem('cart', JSON.stringify(cart));
    updateCartUI();
    showNotification('تم إضافة المنتج للسلة بنجاح!');
}

function removeFromCart(productId) {
    cart = cart.filter(item => item.id !== productId);
    localStorage.setItem('cart', JSON.stringify(cart));
    updateCartUI();
}

function updateCartUI() {
    if (!cartCount || !cartTotal || !cartItems) return;
    
    // Update cart count
    const totalItems = cart.reduce((sum, item) => sum + item.quantity, 0);
    cartCount.textContent = totalItems;
    
    // Update cart total
    const total = cart.reduce((sum, item) => sum + (item.price * item.quantity), 0);
    cartTotal.textContent = total.toFixed(0);
    
    // Update cart items
    if (cart.length === 0) {
        cartItems.innerHTML = '<p class="empty-cart">السلة فارغة</p>';
    } else {
        cartItems.innerHTML = cart.map(item => `
            <div class="cart-item">
                <img src="${item.image}" alt="${item.title}">
                <div class="cart-item-info">
                    <div class="cart-item-title">${item.title}</div>
                    <div class="cart-item-price">${item.price} ر.س × ${item.quantity}</div>
                </div>
                <button class="remove-item" onclick="removeFromCart(${item.id})">×</button>
            </div>
        `).join('');
    }
}

// Product loading functions
function loadFeaturedProducts() {
    const productsGrid = document.getElementById('products-grid');
    if (!productsGrid) return;
    
    const featuredProducts = products.slice(0, 6);
    productsGrid.innerHTML = featuredProducts.map(product => createProductCard(product)).join('');
}

function loadAllProducts() {
    const productsGrid = document.getElementById('all-products-grid');
    if (!productsGrid) return;
    
    productsGrid.innerHTML = products.map(product => createProductCard(product)).join('');
}

function loadRelatedProducts() {
    const relatedGrid = document.getElementById('related-products');
    if (!relatedGrid) return;
    
    const relatedProducts = products.slice(0, 4);
    relatedGrid.innerHTML = relatedProducts.map(product => createProductCard(product)).join('');
}

// function createProductCard(product) {
//     return `
//         <div class="product-card">
//             <div class="product-image">
//                 <img src="${product.image}" alt="${product.title}">
//                 <button class="add-to-cart" onclick="addToCart(${product.id})">إضافة للسلة</button>
//             </div>
//             <div class="product-info">
//                 <h3 class="product-title">
//                     <a href="product-detail.html?id=${product.id}" style="text-decoration: none; color: inherit;">
//                         ${product.title}
//                     </a>
//                 </h3>
//                 <div class="product-price">
//                     ${product.price} ر.س
//                     ${product.oldPrice ? `<span style="text-decoration: line-through; color: #999; margin-right: 10px;">${product.oldPrice} ر.س</span>` : ''}
//                 </div>
//                 <p class="product-description">${product.description}</p>
//             </div>
//         </div>
//     `;
// }

// Product detail page
function initProductDetail() {
    const urlParams = new URLSearchParams(window.location.search);
    const productId = parseInt(urlParams.get('id')) || 1;
    const product = products.find(p => p.id === productId);
    
    if (product) {
        updateProductDetail(product);
    }
    
    // Quantity controls
    const decreaseBtn = document.getElementById('decrease-qty');
    const increaseBtn = document.getElementById('increase-qty');
    const quantitySpan = document.getElementById('quantity');
    const addToCartBtn = document.getElementById('add-to-cart-detail');
    
    if (decreaseBtn && increaseBtn && quantitySpan) {
        decreaseBtn.addEventListener('click', () => {
            const currentQty = parseInt(quantitySpan.textContent);
            if (currentQty > 1) {
                quantitySpan.textContent = currentQty - 1;
            }
        });
        
        increaseBtn.addEventListener('click', () => {
            const currentQty = parseInt(quantitySpan.textContent);
            quantitySpan.textContent = currentQty + 1;
        });
    }
    
    if (addToCartBtn) {
        addToCartBtn.addEventListener('click', () => {
            const quantity = parseInt(quantitySpan.textContent);
            addToCart(productId, quantity);
        });
    }
    
    // Image thumbnails
    const thumbnails = document.querySelectorAll('.thumbnail');
    const mainImage = document.getElementById('main-product-image');
    
    thumbnails.forEach(thumb => {
        thumb.addEventListener('click', () => {
            thumbnails.forEach(t => t.classList.remove('active'));
            thumb.classList.add('active');
            if (mainImage) {
                mainImage.src = thumb.src.replace('w=200', 'w=800');
            }
        });
    });
    
    // Color options
    const colorOptions = document.querySelectorAll('.color-option');
    colorOptions.forEach(option => {
        option.addEventListener('click', () => {
            colorOptions.forEach(o => o.classList.remove('active'));
            option.classList.add('active');
        });
    });
}

function updateProductDetail(product) {
    const title = document.getElementById('product-title');
    const price = document.getElementById('product-price');
    const description = document.getElementById('product-description');
    
    if (title) title.textContent = product.title;
    if (price) price.textContent = `${product.price} ر.س`;
    if (description) {
        description.innerHTML = `
            <h3>وصف المنتج</h3>
            <p>${product.description}</p>
        `;
    }
}

// Checkout page
function initCheckout() {
    loadCheckoutItems();
    
    // Payment method selection
    const paymentMethods = document.querySelectorAll('input[name="payment"]');
    const cardDetails = document.getElementById('card-details');
    
    paymentMethods.forEach(method => {
        method.addEventListener('change', () => {
            if (cardDetails) {
                cardDetails.classList.toggle('active', method.value === 'card');
            }
        });
    });
    
    // Place order
    const placeOrderBtn = document.getElementById('place-order');
    if (placeOrderBtn) {
        placeOrderBtn.addEventListener('click', placeOrder);
    }
    
    // Promo code
    const applyPromoBtn = document.getElementById('apply-promo');
    if (applyPromoBtn) {
        applyPromoBtn.addEventListener('click', applyPromoCode);
    }
}

function loadCheckoutItems() {
    const summaryItems = document.getElementById('summary-items');
    const subtotal = document.getElementById('subtotal');
    const tax = document.getElementById('tax');
    const finalTotal = document.getElementById('final-total');
    
    if (!summaryItems) return;
    
    if (cart.length === 0) {
        summaryItems.innerHTML = '<p>لا توجد منتجات في السلة</p>';
        return;
    }
    
    summaryItems.innerHTML = cart.map(item => `
        <div class="summary-item">
            <img src="${item.image}" alt="${item.title}">
            <div>
                <h4>${item.title}</h4>
                <p>الكمية: ${item.quantity}</p>
                <p class="price">${item.price * item.quantity} ر.س</p>
            </div>
        </div>
    `).join('');
    
    const subtotalAmount = cart.reduce((sum, item) => sum + (item.price * item.quantity), 0);
    const taxAmount = subtotalAmount * 0.15;
    const total = subtotalAmount + taxAmount;
    
    if (subtotal) subtotal.textContent = `${subtotalAmount} ر.س`;
    if (tax) tax.textContent = `${taxAmount.toFixed(0)} ر.س`;
    if (finalTotal) finalTotal.textContent = `${total.toFixed(0)} ر.س`;
}

function placeOrder() {
    // Validate form
    const form = document.getElementById('checkout-form');
    if (!form.checkValidity()) {
        form.reportValidity();
        return;
    }
    
    // Simulate order processing
    showNotification('جاري معالجة طلبك...', 'info');
    
    setTimeout(() => {
        cart = [];
        localStorage.removeItem('cart');
        updateCartUI();
        showNotification('تم تأكيد طلبك بنجاح! سيتم التواصل معك قريباً.', 'success');
        
        // Redirect to home page
        setTimeout(() => {
            window.location.href = 'index.html';
        }, 2000);
    }, 2000);
}

function applyPromoCode() {
    const promoInput = document.getElementById('promo-input');
    const promoCode = promoInput.value.trim().toLowerCase();
    
    const validCodes = {
        'save10': 0.10,
        'welcome': 0.15,
        'vip': 0.20
    };
    
    if (validCodes[promoCode]) {
        showNotification(`تم تطبيق كود الخصم! خصم ${validCodes[promoCode] * 100}%`, 'success');
        // Apply discount logic here
    } else {
        showNotification('كود الخصم غير صحيح', 'error');
    }
}

// Contact page
function initContact() {
    // FAQ functionality
    const faqQuestions = document.querySelectorAll('.faq-question');
    faqQuestions.forEach(question => {
        question.addEventListener('click', () => {
            const answer = question.nextElementSibling;
            const toggle = question.querySelector('.faq-toggle');
            
            answer.classList.toggle('active');
            toggle.textContent = answer.classList.contains('active') ? '-' : '+';
        });
    });
    
    // Contact form
    const contactForm = document.getElementById('contact-form');
    if (contactForm) {
        contactForm.addEventListener('submit', handleContactForm);
    }
}

function handleContactForm(e) {
    e.preventDefault();
    
    const formData = new FormData(e.target);
    const data = Object.fromEntries(formData);
    
    // Simulate form submission
    showNotification('جاري إرسال رسالتك...', 'info');
    
    setTimeout(() => {
        showNotification('تم إرسال رسالتك بنجاح! سنتواصل معك قريباً.', 'success');
        e.target.reset();
    }, 2000);
}

// Event listeners
if (cartBtn) cartBtn.addEventListener('click', toggleCart);
if (closeCart) closeCart.addEventListener('click', toggleCart);
if (cartOverlay) cartOverlay.addEventListener('click', toggleCart);

if (hamburger && navMenu) {
    hamburger.addEventListener('click', () => {
        navMenu.classList.toggle('active');
    });
}

// Filters functionality
const filtersToggle = document.getElementById('filters-toggle');
const filtersSidebar = document.querySelector('.filters-sidebar');

if (filtersToggle && filtersSidebar) {
    filtersToggle.addEventListener('click', () => {
        filtersSidebar.classList.toggle('active');
    });
}

// Utility functions
function showNotification(message, type = 'success') {
    // Create notification element
    const notification = document.createElement('div');
    notification.className = `notification ${type}`;
    notification.style.cssText = `
        position: fixed;
        top: 20px;
        right: 20px;
        background: ${type === 'success' ? '#10b981' : type === 'error' ? '#ef4444' : '#3b82f6'};
        color: white;
        padding: 1rem 1.5rem;
        border-radius: 8px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        z-index: 9999;
        transform: translateX(400px);
        transition: transform 0.3s ease;
        max-width: 300px;
    `;
    notification.textContent = message;
    
    document.body.appendChild(notification);
    
    // Show notification
    setTimeout(() => {
        notification.style.transform = 'translateX(0)';
    }, 100);
    
    // Hide notification
    setTimeout(() => {
        notification.style.transform = 'translateX(400px)';
        setTimeout(() => {
            document.body.removeChild(notification);
        }, 300);
    }, 3000);
}

// Product filtering (for products page)
function filterProducts(category = '', priceRange = '', sortBy = '') {
    let filteredProducts = [...products];
    
    // Filter by category
    if (category) {
        filteredProducts = filteredProducts.filter(product => product.category === category);
    }
    
    // Filter by price range
    if (priceRange) {
        const [min, max] = priceRange.split('-').map(Number);
        filteredProducts = filteredProducts.filter(product => {
            if (priceRange === '1000+') {
                return product.price >= 1000;
            }
            return product.price >= min && product.price <= max;
        });
    }
    
    // Sort products
    switch (sortBy) {
        case 'price-low':
            filteredProducts.sort((a, b) => a.price - b.price);
            break;
        case 'price-high':
            filteredProducts.sort((a, b) => b.price - a.price);
            break;
        case 'popular':
            // Simulate popularity by randomizing
            filteredProducts.sort(() => Math.random() - 0.5);
            break;
        default:
            // newest - keep original order
            break;
    }
    
    return filteredProducts;
}

// Apply filters when page loads
if (document.getElementById('all-products-grid')) {
    const categoryCheckboxes = document.querySelectorAll('input[type="checkbox"]');
    const priceFilter = document.getElementById('price-filter');
    const sortFilter = document.getElementById('sort-filter');
    const clearFiltersBtn = document.querySelector('.clear-filters');
    
    // Add event listeners for filters
    categoryCheckboxes.forEach(checkbox => {
        checkbox.addEventListener('change', applyFilters);
    });
    
    if (priceFilter) priceFilter.addEventListener('change', applyFilters);
    if (sortFilter) sortFilter.addEventListener('change', applyFilters);
    if (clearFiltersBtn) clearFiltersBtn.addEventListener('click', clearFilters);
}

function applyFilters() {
    const selectedCategories = Array.from(document.querySelectorAll('input[type="checkbox"]:checked')).map(cb => cb.value);
    const priceRange = document.getElementById('price-filter')?.value || '';
    const sortBy = document.getElementById('sort-filter')?.value || '';
    
    let filteredProducts = [...products];
    
    // Apply category filter
    if (selectedCategories.length > 0) {
        filteredProducts = filteredProducts.filter(product => selectedCategories.includes(product.category));
    }
    
    // Apply other filters
    filteredProducts = filterProducts('', priceRange, sortBy).filter(product => 
        selectedCategories.length === 0 || selectedCategories.includes(product.category)
    );
    
    // Update products grid
    const productsGrid = document.getElementById('all-products-grid');
    const productsCount = document.getElementById('products-count');
    
    if (productsGrid) {
        productsGrid.innerHTML = filteredProducts.map(product => createProductCard(product)).join('');
    }
    
    if (productsCount) {
        productsCount.textContent = filteredProducts.length;
    }
}

function clearFilters() {
    // Clear all checkboxes
    document.querySelectorAll('input[type="checkbox"]').forEach(cb => cb.checked = false);
    
    // Reset select elements
    const priceFilter = document.getElementById('price-filter');
    const sortFilter = document.getElementById('sort-filter');
    
    if (priceFilter) priceFilter.value = '';
    if (sortFilter) sortFilter.value = 'newest';
    
    // Reload all products
    loadAllProducts();
    
    const productsCount = document.getElementById('products-count');
    if (productsCount) {
        productsCount.textContent = products.length;
    }
}

// Handle URL parameters for category filtering
if (window.location.search.includes('category=')) {
    const urlParams = new URLSearchParams(window.location.search);
    const category = urlParams.get('category');
    
    // Check the appropriate category checkbox
    const categoryCheckbox = document.querySelector(`input[value="${category}"]`);
    if (categoryCheckbox) {
        categoryCheckbox.checked = true;
        applyFilters();
    }
}