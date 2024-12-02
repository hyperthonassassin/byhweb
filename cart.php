<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user']) || !isset($_SESSION['user']['firebase_uid'])) {
    header('Location: login.php');
    exit();
}

// Include database configuration
require 'config.php';

// Initialize total
$total = 0;

// Fetch cart items for the logged-in user using firebase_uid
$firebaseUid = $_SESSION['user']['firebase_uid']; // Access the firebase_uid instead of id
$sql = "SELECT c.product_id, c.quantity, p.name, p.price, p.image_url 
        FROM cart c 
        JOIN products p ON c.product_id = p.id 
        WHERE c.firebase_uid = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $firebaseUid);
$stmt->execute();
$result = $stmt->get_result();
$cartItems = $result->fetch_all(MYSQLI_ASSOC);

// Calculate the total for the cart
foreach ($cartItems as $item) {
    $total += $item['price'] * $item['quantity'];
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400&family=Podkova:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/cart.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="main.js" defer type="module"></script>
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
                <input type="checkbox" id="select-all"> Select All
            </div>


            <?php if (!empty($cartItems)): ?>
                <?php foreach ($cartItems as $item): ?>
                    <div class="cart-item" data-product-id="<?php echo htmlspecialchars($item['product_id']); ?>">
                        <!-- Checkout Checkbox -->
                        <input type="checkbox" class="cart-checkbox" name="select-item" value="<?php echo htmlspecialchars($item['name']); ?>">

                        <!-- Product Image -->
                        <img src="<?php echo htmlspecialchars($item['image_url']); ?>" alt="<?php echo htmlspecialchars($item['name']); ?>" class="cart-product-img">

                        <!-- Product Information -->
                        <div class="cart-product-info">
                            <p class="cart-product-name"><?php echo htmlspecialchars($item['name']); ?></p>
                            <p class="cart-product-price">₱<?php echo number_format($item['price'], 2); ?></p>
                        </div>

                        <!-- Quantity Input -->
                        <div class="cart-product-quantity">
                            <button class="quantity-button minus">−</button>
                            <span class="quantity-number"><?php echo $item['quantity']; ?></span>
                            <button class="quantity-button plus">+</button>
                        </div>

                        <!-- Remove Button -->
                        <button class="remove-button">Remove</button>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Your cart is empty.</p>
            <?php endif; ?>

            <!-- Cart Total and Checkout Button -->
            <div class="total-container">
                <h3>Total: ₱<?php echo number_format($total, 2); ?></h3>
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
    const selectAllContainer = document.querySelector('.select-all-container');
    const selectAllCheckbox = document.getElementById('select-all');
    const itemCheckboxes = document.querySelectorAll('.cart-checkbox[name="select-item"]');
    
    // Check if 'select-all-container' exists before proceeding
    if (selectAllContainer) {
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
        if (selectAllCheckbox) {
            selectAllCheckbox.addEventListener('change', function () {
                itemCheckboxes.forEach(checkbox => {
                    checkbox.checked = selectAllCheckbox.checked;
                });
            });
        }
    }

    // Ensure that item checkboxes exist before attaching event listeners
    if (itemCheckboxes.length > 0) {
        // Update "Select All" state when individual checkboxes are toggled
        itemCheckboxes.forEach(checkbox => {
            checkbox.addEventListener('change', function () {
                if (selectAllCheckbox) {
                    selectAllCheckbox.checked = Array.from(itemCheckboxes).every(item => item.checked);
                }
            });
        });
    }

    // Handle item removal
    const removeButtons = document.querySelectorAll('.remove-button');
    removeButtons.forEach(button => {
        button.addEventListener('click', function() {
            const cartItem = this.closest('.cart-item');
            const productId = cartItem.getAttribute('data-product-id'); // Get the product ID from the data attribute

            if (!productId) {
                console.error('Product ID is missing');
                return;
            }

            console.log('Product ID to remove:', productId); // Debugging log

            // Make the AJAX request to remove the item
            fetch('updateCart.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    action: 'remove',  // Action for remove
                    product_id: productId
                })
            })
            .then(response => response.json())
            .then(data => {
                console.log('Server Response:', data);  // Log server response

                if (data.success) {
                    cartItem.remove();  // Remove the item from the DOM
                    updateCartTotal();   // Update the total after removal
                } else {
                    console.error('Error removing item:', data.message); // Log error message
                }
            })
            .catch(error => {
                console.error('Error:', error);  // Log any errors
            });
        });
    });


    // Handle quantity changes (increase/decrease)
    const quantityButtons = document.querySelectorAll('.quantity-button');
    quantityButtons.forEach(button => {
        button.addEventListener('click', function () {
            const cartItem = this.closest('.cart-item');
            const quantityElement = cartItem.querySelector('.quantity-number');
            const quantity = parseInt(quantityElement.textContent, 10);
            const productId = cartItem.dataset.productId; // Get product ID from data-product-id

            if (!productId) {
                console.error('Product ID is missing.');
                return;
            }

            let newQuantity = quantity;
            if (this.classList.contains('plus')) {
                newQuantity++;
            } else if (this.classList.contains('minus') && quantity > 1) {
                newQuantity--;
            }

            // Update the quantity on the page
            quantityElement.textContent = newQuantity;

            console.log('Updating quantity for Product ID:', productId, 'New Quantity:', newQuantity);

            // Call backend to update the quantity in the cart
            fetch('updateCart.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    action: 'update',  // Action for update
                    product_id: productId,
                    quantity: newQuantity
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    console.log('Quantity updated successfully');
                    updateCartTotal(); // Update total when quantity changes
                } else {
                    console.log('Error updating quantity:', data.message);
                    alert('Error updating the quantity.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred while updating the quantity.');
            });
        });
    });


    // Function to update the total after any change
    function updateCartTotal() {
        let total = 0;
        const cartItems = document.querySelectorAll('.cart-item');

        cartItems.forEach(item => {
            const priceElement = item.querySelector('.cart-product-price');
            const price = parseFloat(priceElement.textContent.replace('₱', '').trim());
            const quantityElement = item.querySelector('.quantity-number');
            const quantity = parseInt(quantityElement.textContent, 10);

            total += price * quantity;
        });

        // Update the total on the page
        document.querySelector('.total-container h3').textContent = `Total: ₱${total.toFixed(2)}`;
    }
});

</script>

</body>
</html>
