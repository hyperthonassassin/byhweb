import {initializeApp} from "https://www.gstatic.com/firebasejs/9.16.0/firebase-app.js"
import {getAuth, GoogleAuthProvider, onAuthStateChanged} from "https://www.gstatic.com/firebasejs/9.16.0/firebase-auth.js"

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

const app = initializeApp(firebaseConfig);
const auth = getAuth();


window.onload = function() {
    const user = auth.currentUser ;

    onAuthStateChanged(auth, (user) => {
        if (user) {
            updateProfile(user);
        } //else {
        //     console.log("No user is signed in.");
        // }
    });

    function updateProfile(user) {
        const userPhoto = user.photoURL || "https://via.placeholder.com/100"; // Fallback image
        const userName = user.displayName || "User Name";
        const userEmail = user.email || "user@example.com";
    
        // Ensure the elements exist before updating
        const userNameElement = document.getElementById("userName");
        const userEmailElement = document.getElementById("userEmail");
        const userPhotoElement = document.getElementById("userPhoto");
    
        if (userNameElement && userEmailElement && userPhotoElement) {
            userNameElement.innerText = userName;
            userEmailElement.innerText = userEmail;
            userPhotoElement.src = userPhoto;
        } else {
            console.error("Profile elements not found in the DOM.");
        }
    }
    
};
