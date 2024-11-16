<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400&family=Podkova:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/cart.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Baking You Happy - Cart</title>
</head>
<body>
    <div class="wrapper">
        <header class="main-header">
            <div class="header-text">
                <h1>Pastries That'll <br> Make You Smile</h1>
            </div>
            <nav class="navbar">
                <div class="container">
                    <div class="navbar-header">
                        <a href="home.php" class="navbar-brand"></a>
                    </div>
                    <div class="navbar-links">
                        <ul>
                            <li><a href="home.php">HOME</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropbtn">CATEGORY <span class="caret">▼</span></a>
                                <div class="dropdown-content">
                                    <a href="pastries.php">Pastries</a>
                                    <a href="cakes.php">Cakes</a>
                                    <a href="desserts.php">Desserts</a>
                                </div>
                            </li>
                            <li><a href="about.php">ABOUT US</a></li>
                            <li>
                                <form method="POST" action="search.php" class="search-form">
                                    <input type="text" name="keyword" placeholder="Search" required>
                                    <a href="cart.php">
                                    <i class="fas fa-shopping-cart cart-icon"></i>
                                </a>
                                <a href="profile.php">
                                    <i class="fas fa-user profile-icon"></i>
                                </a>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        <div class="content">
        <div class="cart-container">
    <h2>Cart:</h2>
    
    <div class="select-all-container">
    <input type="checkbox" id="select-all" class="select-all-checkbox">
    <label for="select-all">Select All</label>
</div>
    <div class="cart-item">
        <!-- Checkout Checkbox -->
        <input type="checkbox" class="cart-checkbox" name="select-item" value="1">
        
        <!-- Product Image -->
        <img src="product-image.jpg" alt="Product" class="cart-product-img">
        
        <!-- Product Information -->
        <div class="cart-product-info">
            <p class="cart-product-name">Product Name</p>
            <p class="cart-product-price">₱120.00</p>
        </div>

        <!-- Quantity Input -->
         <div class="cart-product-quantity">
            <button class="quantity-button minus">−</button>
            <span class="quantity-number">1</span>
            <button class="quantity-button plus">+</button>
        </div>

        <!-- Remove Button -->
        <button class="remove-button">Remove</button>
    </div>

    <!-- Cart Total and Checkout Button -->
    <div class="total-container">
        <h3>Total: ₱240.00</h3>
        <a href="checkout.php">
        <button class="checkout-button">Proceed to Checkout</button>
    </a>
    </div>
</div>

        </div>
        <footer class="footer">
            <div class="footer-content">
                <div class="footer-text">
                    <p>Adamson University</p>
                    <p>BS ComSci Students</p>
                </div>
                <div class="footer-icons">
                    <a href="mailto:acomss@adamson.edu.ph" target="_blank"><i class="fas fa-envelope"></i></a>
                    <a href="https://www.facebook.com/ACOMSSofficial" target="_blank"><i class="fab fa-facebook-f"></i></a>
                </div>
            </div>
        </footer>
    </div>
    <script>

document.addEventListener('DOMContentLoaded', () => {
    const selectAllCheckbox = document.getElementById('select-all');
    const itemCheckboxes = document.querySelectorAll('.cart-checkbox[name="select-item"]');
    const selectAllContainer = document.querySelector('.select-all-container');

    // Function to update "Select All" visibility based on number of items
    function updateSelectAllVisibility() {
        const cartItems = document.querySelectorAll('.cart-item');
        if (cartItems.length <= 1) {
            selectAllContainer.style.display = 'none'; // Hide if 1 or 0 items
        } else {
            selectAllContainer.style.display = 'block'; // Show if 2 or more items
        }
    }

    // Call to set visibility
    updateSelectAllVisibility();

    // Toggle all checkboxes when "Select All" is clicked
    selectAllCheckbox.addEventListener('change', function () {
        itemCheckboxes.forEach(checkbox => {
            checkbox.checked = selectAllCheckbox.checked;
        });
    });

    // Update "Select All" state when individual checkboxes are toggled
    itemCheckboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function () {
            selectAllCheckbox.checked = Array.from(itemCheckboxes).every(item => item.checked);
        });
    });

    // Handle item removal
    const removeButtons = document.querySelectorAll('.remove-button');
    removeButtons.forEach(button => {
        button.addEventListener('click', function () {
            const cartItem = this.closest('.cart-item');
            cartItem.remove();
            updateSelectAllVisibility(); // Update the "Select All" visibility after item removal
            updateCartTotal();
        });
    });

    // Function to update the total after removing an item
    function updateCartTotal() {
        const cartItems = document.querySelectorAll('.cart-item');
        let total = 0;

        cartItems.forEach(item => {
            const priceElement = item.querySelector('.cart-product-price');
            const price = parseFloat(priceElement.textContent.replace('₱', '').trim());
            total += price;
        });

        // Update total on the page
        document.querySelector('.total-container h3').textContent = `Total: ₱${total.toFixed(2)}`;
    }
});
</script>

</body>
</html>
