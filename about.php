<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400&family=Podkova:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/about.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Baking You Happy - About Us</title>
    
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
        <section class="about-us">
                <h2>About Us</h2>
                <p>We are a group of dedicated students, each of us coming from different academic backgrounds and experiences. United by our passion for technology and a shared love for delicious pastries, we’ve created <strong>Baking You Happy</strong> as part of our project in mobile and web development course. Our goal is to deliver a seamless e-commerce experience, making it easy for everyone to browse, order, and enjoy freshly baked treats.</p>
                <p>As students, we understand the value of convenience and quality, and we wanted to create a platform that embodies these values. Through this project, we’ve combined our skills to design a user-friendly platform that enables customers to discover and order pastries with ease.</p>
                <p><strong>Baking You Happy</strong> is our way of sharing a bit of happiness (and sweetness!) with you, and we hope you enjoy using it as much as we enjoyed creating it.</p>
                </section>
                <section class="team">

        <div class="team-member">
            <img src="images/web1.jpg" alt="Team Member 1" class="team-image">
            <div class="team-info">
                <p class="team-name">Theolo Seanon Cinco</p>
                <p class="team-role">UI/UX Designer</p>
                <p class="team-role">Team Leader</p>
            </div>
        </div>
        <div class="team-member">
            <img src="images/mob2.jpg" alt="Team Member 2" class="team-image">
            <div class="team-info">
                <p class="team-name">Rafael Cabilan</p>
                <p class="team-role">Mobile Backend Developer</p>
            </div>
        </div>
        <div class="team-member">
            <img src="images/web1.jpg" alt="Team Member 3" class="team-image">
            <div class="team-info">
                <p class="team-name">Christine Rodriguez</p>
                <p class="team-role">Mobile Frontend Developer</p>
            </div>
        </div>
        <div class="team-member">
            <img src="images/web1.jpg" alt="Team Member 4" class="team-image">
            <div class="team-info">
                <p class="team-name">Jazleen Razote</p>
                <p class="team-role">Web Full-stack Developer</p>
                <p class="team-role">Web Leader</p>
            </div>
        </div>
        <div class="team-member">
            <img src="images/web1.jpg" alt="Team Member 5" class="team-image">
            <div class="team-info">
                <p class="team-name">Miguel Contreras</p>
                <p class="team-role">Web Backend Developer</p>
            </div>
        </div>
        <div class="team-member">
            <img src="images/web1.jpg" alt="Team Member 6" class="team-image">
            <div class="team-info">
                <p class="team-name">Alvin Cabiliza</p>
                <p class="team-role">Web Backend Developer</p>
            </div>
        </div>
    </section>
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
