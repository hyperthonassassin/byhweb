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
        } else {
            console.log("No user is signed in.");
        }
    });

    function updateProfile(user){
        const userPhoto = user.photoURL;
        const userName = user.displayName;
        const userEmail = user.email;

        document.getElementById("userName").innerText = user.displayName;
        document.getElementById("userEmail").innerText = user.email;
        document.querySelector("#userPhoto").src = user.photoURL;
    }
};
