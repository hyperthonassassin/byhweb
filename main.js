import {initializeApp} from "https://www.gstatic.com/firebasejs/9.16.0/firebase-app.js"
import {getAuth, GoogleAuthProvider, signInWithPopup} from "https://www.gstatic.com/firebasejs/9.16.0/firebase-auth.js"

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
auth.languageCode = 'en';
const provider = new GoogleAuthProvider();

const googleLogin = document.getElementById("google-signIn");
googleLogin.addEventListener("click", function() {
    signInWithPopup(auth, provider)
  .then((result) => {
    const credential = GoogleAuthProvider.credentialFromResult(result);
    const user = result.user;
    window.location.href = "home.php";

  }).catch((error) => {
    const errorCode = error.code;
    const errorMessage = error.message;

  });
})