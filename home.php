<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400&family=Podkova:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="main.js" defer type="module"></script>
    <title>Baking You Happy - Home</title>
    
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
                        <a href="home.php" class="navbar-brand">
                        </a>
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
        <div class="product-box">
            <div class="product-image">
                <img src="images/cake1.jpg" alt="Cake Product 1">
            </div>
            <div class="product-details">
                <h2 class="product-name">New York Cheesecake</h2>
                <div class="price-cart">
                    <p class="product-price">₱245.00</p>
                    <span class="cart-button">🛒</span>
                </div>
            </div>
        </div>

        <div class="product-box">
            <div class="product-image">
                <img src="images/pastry6.jpg" alt="Pastry Product 6">
            </div>
            <div class="product-details">
                <h2 class="product-name">Tomato & Mushroom Twist</h2>
                <div class="price-cart">
                    <p class="product-price">₱120.00</p>
                    <span class="cart-button">🛒</span>
                </div>
            </div>
        </div>

        <div class="product-box">
            <div class="product-image">
                <img src="images/dessert5.jpg" alt="Dessert Product 5">
            </div>
            <div class="product-details">
                <h2 class="product-name">Raspberry Meringue Tartlet</h2>
                <div class="price-cart">
                    <p class="product-price">₱200.00</p>
                    <span class="cart-button">🛒</span>
                </div>
            </div>
        </div>

        <div class="product-box">
            <div class="product-image">
                <img src="images/dessert4.jpg" alt="Dessert Product 4">
            </div>
            <div class="product-details">
                <h2 class="product-name">Chocolate Tart</h2>
                <div class="price-cart">
                    <p class="product-price">190.00</p>
                    <span class="cart-button">🛒</span>
                </div>
            </div>
        </div>

        <div class="product-box">
            <div class="product-image">
                <img src="images/cake5.jpg" alt="Cake Product 5">
            </div>
            <div class="product-details">
                <h2 class="product-name">Vanilla Bean Cake Slice</h2>
                <div class="price-cart">
                    <p class="product-price">₱230.00</p>
                    <span class="cart-button">🛒</span>
                </div>
            </div>
        </div>

        <div class="product-box">
            <div class="product-image">
                <img src="images/pastry3.jpg" alt="Pastry Product 3">
            </div>
            <div class="product-details">
                <h2 class="product-name">Breton Roll</h2>
                <div class="price-cart">
                    <p class="product-price">₱230.00</p>
                    <span class="cart-button">🛒</span>
                </div>
            </div>
        </div>

        <div class="product-box">
            <div class="product-image">
                <img src="images/cake2.jpg" alt="Cake Product 2">
            </div>
            <div class="product-details">
                <h2 class="product-name">Blueberry Cheesecake Slice</h2>
                <div class="price-cart">
                    <p class="product-price">₱260.00</p>
                    <span class="cart-button">🛒</span>
                </div>
            </div>
        </div>

        <div class="product-box">
            <div class="product-image">
                <img src="images/pastry1.jpg" alt="Pastry Product 1">
            </div>
            <div class="product-details">
                <h2 class="product-name">French Butter Croissant</h2>
                <div class="price-cart">
                    <p class="product-price">₱135.00</p>
                    <span class="cart-button">🛒</span>
                </div>
            </div>
        </div>

        <div class="product-box">
            <div class="product-image">
                <img src="images/dessert1.jpg" alt="Dessert Product 1">
            </div>
            <div class="product-details">
                <h2 class="product-name">Banoffee Pie</h2>
                <div class="price-cart">
                    <p class="product-price">₱180.00</p>
                    <span class="cart-button">🛒</span>
                </div>
            </div>
        </div>

        <div class="product-box">
            <div class="product-image">
                <img src="images/dessert3.jpg" alt="Dessert Product 3">
            </div>
            <div class="product-details">
                <h2 class="product-name">Strawberry Tart</h2>
                <div class="price-cart">
                    <p class="product-price">₱170.00</p>
                    <span class="cart-button">🛒</span>
                </div>
            </div>
        </div>

        <div class="product-box">
            <div class="product-image">
                <img src="images/dessert6.jpg" alt="Dessert Product 6">
            </div>
            <div class="product-details">
                <h2 class="product-name">Tiramisu</h2>
                <div class="price-cart">
                    <p class="product-price">₱160.00</p>
                    <span class="cart-button">🛒</span>
                </div>
            </div>
        </div>

        <div class="product-box">
            <div class="product-image">
                <img src="images/pastry4.jpg" alt="Pastry Product 4">
            </div>
            <div class="product-details">
                <h2 class="product-name">Cheese Danish</h2>
                <div class="price-cart">
                    <p class="product-price">₱100.00</p>
                    <span class="cart-button">🛒</span>
                </div>
            </div>
        </div>

        <div class="product-box">
            <div class="product-image">
                <img src="images/pastry7.jpg" alt="Pastry Product 7">
            </div>
            <div class="product-details">
                <h2 class="product-name">French Onion Twist</h2>
                <div class="price-cart">
                    <p class="product-price">₱120.00</p>
                    <span class="cart-button">🛒</span>
                </div>
            </div>
        </div>

        <div class="product-box">
            <div class="product-image">
                <img src="images/dessert2.jpg" alt="Dessert Product 2">
            </div>
            <div class="product-details">
                <h2 class="product-name">Custard Tart</h2>
                <div class="price-cart">
                    <p class="product-price">₱120.00</p>
                    <span class="cart-button">🛒</span>
                </div>
            </div>
        </div>

        <div class="product-box">
            <div class="product-image">
                <img src="images/pastry2.jpg" alt="Pastry Product 2">
            </div>
            <div class="product-details">
                <h2 class="product-name">Chocolate Croissant</h2>
                <div class="price-cart">
                    <p class="product-price">₱145.00</p>
                    <span class="cart-button">🛒</span>
                </div>
            </div>
        </div>

        <div class="product-box">
            <div class="product-image">
                <img src="images/cake6.jpg" alt="Cake Product 6">
            </div>
            <div class="product-details">
                <h2 class="product-name">Mango Passion Cake Slice</h2>
                <div class="price-cart">
                    <p class="product-price">₱250.00</p>
                    <span class="cart-button">🛒</span>
                </div>
            </div>
        </div>

        <div class="product-box">
            <div class="product-image">
                <img src="images/pastry5.jpg" alt="Pastry Product 5">
            </div>
            <div class="product-details">
                <h2 class="product-name">Dark Chocolate Twist</h2>
                <div class="price-cart">
                    <p class="product-price">₱130.00</p>
                    <span class="cart-button">🛒</span>
                </div>
            </div>
        </div>

        <div class="product-box">
            <div class="product-image">
                <img src="images/cake4.jpg" alt="Cake Product 4">
            </div>
            <div class="product-details">
                <h2 class="product-name">Red Velvet Cake Slice</h2>
                <div class="price-cart">
                    <p class="product-price">₱240.00</p>
                    <span class="cart-button">🛒</span>
                </div>
            </div>
        </div>

        <div class="product-box">
            <div class="product-image">
                <img src="images/pastry8.jpg" alt="Pastry Product 8">
            </div>
            <div class="product-details">
                <h2 class="product-name">Hazeulnut Vanilla Crown</h2>
                <div class="price-cart">
                    <p class="product-price">₱150.00</p>
                    <span class="cart-button">🛒</span>
                </div>
            </div>
        </div>

        <div class="product-box">
            <div class="product-image">
                <img src="images/cake3.jpg" alt="Cake Product 3">
            </div>
            <div class="product-details">
                <h2 class="product-name">Classic Chocolate Cake Slice</h2>
                <div class="price-cart">
                    <p class="product-price">₱230.00</p>
                    <span class="cart-button">🛒</span>
                </div>
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
</body>
</html>
