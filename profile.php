<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400&family=Podkova:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/profile.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="main.js" defer type="module"></script>
    <script src="update.js" defer type="module"></script>    
    <title>Baking You Happy - Profile</title>
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
            <div class="profile-container">
                <!-- Profile photo and info -->
                <div class="profile-photo-box">
                    <img id="userPhoto" src="https://via.placeholder.com/100" alt="Profile Photo" class="profile-photo">
                    <h2 id="userName">User Name</h2>
                </div>
                <div class="profile-email-box">
                    <p id="userEmail">user@example.com</p>
                </div>
            </div>
            <div class="history-container">
                <h2>History:</h2>
                <div class="history-item">
                    <img src="images/cake1.jpg" alt="Product" class="history-product-img">
                    <div class="history-product-info">
                        <p class="history-product-name">Product Name</p>
                        <p class="history-product-price">₱120.00</p>
                    </div>
                    <span class="history-product-quantity">2</span> 
                </div>
            </div>
    
            <div class="sign-out-container">
                <a href="login.php">
                    <button class="sign-out-button">Sign Out</button>
                </a>
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
</body>
</html>
