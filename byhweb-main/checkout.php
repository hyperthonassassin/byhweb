<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400&family=Podkova:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/checkout.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Baking You Happy - Checkout</title>
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
    <!-- Back to Cart -->
    <div class="back-button-container">
        <a href="cart.php" class="back-button">← Back to Cart</a>
    </div>

    <!-- Checkout Form -->
    <div class="form-container">
        <h2>Checkout Information</h2>
        <form action="process_checkout.php" method="POST">
            <div class="input-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" placeholder="Enter your full name" required>
            </div>
            <div class="input-group">
                <label for="address">Address</label>
                <input type="text" id="address" name="address" placeholder="Enter your address" required>
            </div>
            <div class="input-group">
                <label for="contact">Contact Number</label>
                <input type="text" id="contact" name="contact" placeholder="Enter your contact number" required>
            </div>
        </form>
    </div>

    <!-- Cart Items -->
    <div class="cart-container">
        <h2>Your Cart</h2>
        <div class="cart-items">
            <div class="cart-item">
                <img src="images/cake1.jpg" alt="Product" class="cart-item-img">
                <div class="cart-item-info">
                    <p class="cart-item-name">Product 1</p>
                    <p class="cart-item-price">₱120.00</p>
                </div>
                <span class="cart-item-quantity">2</span>
            </div>
            <div class="cart-item">
                <img src="images/cake2.jpg" alt="Product" class="cart-item-img">
                <div class="cart-item-info">
                    <p class="cart-item-name">Product 2</p>
                    <p class="cart-item-price">₱200.00</p>
                </div>
                <span class="cart-item-quantity">1</span>
            </div>
        </div>
    </div>

    <!-- Payment Method and Total Section -->
    <div class="payment-container">
        <div class="payment-method">
            <h2>Payment Method</h2>
            <div class="payment-options">
                <input type="radio" id="paypal" name="payment" value="paypal">
                <label for="paypal">PayPal</label>
                <br>
                <input type="radio" id="google-pay" name="payment" value="google-pay">
                <label for="google-pay">Google Pay</label>
                <br>
                <input type="radio" id="gcash" name="payment" value="gcash">
                <label for="gcash">GCash</label>
            </div>
        </div>
        <div class="totals">
            <h2>Order Summary</h2>
            <div class="summary-item">
                <span>Subtotal:</span>
                <span>₱320.00</span>
            </div>
            <div class="summary-item">
                <span>Shipping Fee:</span>
                <span>₱50.00</span>
            </div>
            <div class="summary-item total">
                <span>Total:</span>
                <span>₱370.00</span>
            </div>
            <button class="checkout-button" type="submit">Check Out</button>
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
    
    <!-- Success Modal -->
     <div id="successModal" class="modal">
        <div class="modal-content">
        <div class="modal-header">
            <i class="fas fa-check-circle success-icon"></i>
            <h2>Purchase Successful!</h2>
        </div>
        <p>Thank you for purchasing!</p>
        <a href="home.php" class="home-button">Home</a>
    </div>
</div>

<script>
    var modal = document.getElementById("successModal");

    var checkoutButton = document.querySelector(".checkout-button");

    checkoutButton.addEventListener("click", function(event) {
        event.preventDefault(); 

        modal.style.display = "flex";
    });

    document.querySelector(".home-button").addEventListener("click", function() {
        window.location.href = "home.php"; 
    });
</script>

</body>

</html>
