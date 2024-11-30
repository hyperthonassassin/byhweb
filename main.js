import { initializeApp } from "https://www.gstatic.com/firebasejs/9.16.0/firebase-app.js";
import { getAuth, GoogleAuthProvider, signInWithPopup, onAuthStateChanged } from "https://www.gstatic.com/firebasejs/9.16.0/firebase-auth.js";

// Firebase Configuration
const firebaseConfig = { 
  apiKey: "AIzaSyDMzZ5DLtiK6hEM5tpU1xN-d1GBRay6dAA",
  authDomain: "baking-you-happy.firebaseapp.com",
  databaseURL: "https://baking-you-happy-default-rtdb.asia-southeast1.firebasedatabase.app",
  projectId: "baking-you-happy",
  storageBucket: "baking-you-happy.firebasestorage.app",
  messagingSenderId: "95504138317",
  appId: "1:95504138317:web:21f172f15a20c21d3e1c04",
  measurementId: "G-LZK3PJRM7H"
};

// Initialize Firebase
const app = initializeApp(firebaseConfig);
const auth = getAuth();
auth.languageCode = 'en';
const provider = new GoogleAuthProvider();

// Wait for the DOM to load before executing script
document.addEventListener("DOMContentLoaded", function() {
  // Elements for Profile
  const googleLoginButton = document.getElementById("google-signIn");

  // Ensure the element exists before attaching the event listener
  googleLoginButton.addEventListener("click", function() {
      signInWithPopup(auth, provider)
          .then((result) => {
              const user = result.user;

              // Send user data to backend to save
              const userData = {
                  firebase_uid: user.uid,
                  email: user.email,
                  name: user.displayName,
                  photo_url: user.photoURL 
              };

              fetch("saveUser.php", {
                  method: "POST",
                  headers: {
                      "Content-Type": "application/json"
                  },
                  body: JSON.stringify(userData)
              })
              .then(response => response.json())
              .then(data => {
                  if (data.success) {
                      console.log("User saved successfully!");
                      // Redirect to home.php after successful login
                      window.location.href = "home.php";
                  } else {
                      console.error("Error saving user:", data.error);
                      alert("Failed to save user. Please try again.");
                  }
              })
              .catch(error => {
                  console.error("Error communicating with the server:", error);
                  alert("An error occurred. Please try again.");
              });
          })
          .catch((error) => {
              console.error("Google login error:", error.message, "Code:", error.code);
              alert("Login failed. Please try again.");
          });
  });

  // Profile Update 
  onAuthStateChanged(auth, (user) => {
      if (user && window.location.pathname === "/profile.php") {  // Check if it's profile.php
          updateProfile(user);
      } 
  });

  function updateProfile(user) {
      const userPhoto = user.photoURL;
      const userName = user.displayName;
      const userEmail = user.email;

      nameElement.innerText = userName;
      emailElement.innerText = userEmail;
      photoElement.src = userPhoto;
  }
});

// Add to cart functionality
document.addEventListener('DOMContentLoaded', () => {
    // Add-to-cart functionality
    document.querySelectorAll('.cart-button').forEach(button => {
        button.addEventListener('click', (event) => {
            const productBox = event.target.closest('.product-box');
            const productId = productBox.dataset.id; // Retrieve product ID from data attribute
            
            // Retrieve Firebase UID for the current logged-in user
            const user = auth.currentUser; // Access currentUser from the auth object
            if (!user) {
                alert('You must be logged in to add items to the cart.');
                return;
            }
            const userUid = user.uid;

            // Send data to the backend
            fetch('addToCart.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ product_id: productId, user_uid: userUid })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert(data.message);
                } else {
                    alert(`Error: ${data.message}`);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred while adding the product to the cart.');
            });
        });
    });
});

// Function to update cart icon dynamically
function updateCartIcon() {
    // Fetch the updated cart items from the backend
    fetch('cart.php')
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                const cartCount = Object.keys(data.cart_items).length;
                document.querySelector('.cart-icon').textContent = `🛒 (${cartCount})`; // Update cart count
            }
        });
}