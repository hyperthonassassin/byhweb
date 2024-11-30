<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400&family=Podkova:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/login.css">
    <script src="https://accounts.google.com/gsi/client" async defer></script>
    <title>Baking You Happy</title>
</head>
<body>
    <div class="image-container">
        <div class="gradient-overlay">
            <img src="images/bg.jpg" alt="Background" class="left-image">
        </div>
        <div class="title-container">
            <img src="images/logo.jpg" alt="Donut Logo" class="logo"> 
            <h1 class="title">Baking You Happy</h1> 
        </div>
        <p class="description">Pastries That'll <br> Make You Smile</p> 
    </div>
    <div class="text-container">
        <h2 class="greeting">Hello, Klasmeyt!</h2> 
        <p class="info">Welcome to Baking You Happy! Explore our delicious selection of pastries, cakes, and desserts. Enjoy a seamless shopping experience with real-time order tracking and secure payments.</p>
        <button id="google-signIn" class="sign-in-button">Sign In with Google</button> 
    </div>

    <script>
        window.onload = function() {
            //Initialize the Google Sign In
            google.accounts.id.initialize({
            client_id: "104949767330-qt6tkhvbqmq4c990hht3c0flilv3b5pk.apps.googleusercontent.com", //Google Client ID
            callback: handleCredentialResponse //Callback function on sign in
            });

            //"Sign In with Google" button
            google.accounts.id.renderButton(
            document.getElementById("google-signIn"), 
            { theme: "outline", size: "x-large", shape:"pill", locale:"en"}
            );
        };

        //Handle the response after successful sign in
        function handleCredentialResponse(response) {
            window.location.href = "home.php"; //Redirect to home            
        };
    </script>

</body>
</html>
