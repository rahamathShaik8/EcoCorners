<?php
session_start();
?>
<?php if(isset($_SESSION['username'])): ?>
<h3>Welcome <?php echo $_SESSION['username']; ?></h3>
<?php endif; ?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>ecoCorners</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta
      name="description"
      content="plants Encyclopedia,placement guide and online selling"
    />
    <link rel="stylesheet" href="style.css" />
    <link rel="icon" href="images/elogo.jpeg" />
    <script src="style.js" defer></script>
    <!-- with defer page loads faster-->
  </head>

  <body>
    <!-- HEADER -->
    <header>
      <div class="logo">
        <img src="images/EcoCornersLogo.jpeg" alt="ecoCorners logo" />
      </div>

      <nav>
        <a href="about.html">About</a>
        <a href="plant.html">Plants</a>
        <a href="#">Categories</a>
        <a href="#">Cart</a>
        <a href="login.html">Login</a>
      </nav>
    </header>

    <!-- HERO SECTION -->
    <section class="hero">
      <h1>EcoCorners</h1>
      <p class="main-text">Know where your plant belongs before you buy it</p>
      <p class="sub-text">
        Make informed plant choices for healthier and sustainable living spaces.
      </p>
      <a href="#" class="btn">Explore Plants</a>
      <hr />
      <a href="google_oauth.php">
        <button>Login with Google</button>
      </a>
      <br><br>
      <a href="github-callback.php">
    <button>Login with GitHub</button>
</a>


    </section>

    <!-- TRUST SECTION -->
    <section class="trust">
      <h2>Built for Thoughtful Plant Owners</h2>
      <p>
        ecoCorners helps you understand plants before bringing them into your
        home. We focus on correct placement, care, and suitability to reduce
        plant loss and promote mindful living.
      </p>
    </section>

    <!-- FEATURES SECTION (UNCHANGED STRUCTURE) -->
    <section class="features">
      <h2>What ecoCorners Offers</h2>

      <div class="feature-box">
        <div class="feature">
          <img src="images/feature1.jpg" alt="Plant information" />
          <h3>Plant Encyclopedia</h3>
          <p>
            Clear, reliable information about plants, their benefits, and care.
          </p>
        </div>

        <div class="feature">
          <img src="images/feature2.jpg" alt="Plant placement" />
          <h3>Placement Guidance</h3>
          <p>Understand where each plant fits best inside your home.</p>
        </div>

        <div class="feature">
          <img src="images/feature3.jpg" alt="Buy plants" />
          <h3>Buy Plants Online</h3>
          <p>Connect with sellers and buy plants from different locations.</p>
        </div>
      </div>
    </section>

    <!-- CALL TO ACTION -->
    <section class="cta">
      <h2>Start Exploring Plants the Right Way</h2>
      <a href="#" class="btn">Browse Plant Guide</a>
    </section>
    <!-- FOOTER -->
    <footer>
      <p>© 2025 ecoCorners | Growing greener homes</p>
    </footer>
    <script type="module">
  // Import the functions you need from the SDKs you need
  import { initializeApp } from "https://www.gstatic.com/firebasejs/12.9.0/firebase-app.js";
  import { getAnalytics } from "https://www.gstatic.com/firebasejs/12.9.0/firebase-analytics.js";
  // TODO: Add SDKs for Firebase products that you want to use
  // https://firebase.google.com/docs/web/setup#available-libraries

  // Your web app's Firebase configuration
  // For Firebase JS SDK v7.20.0 and later, measurementId is optional
  const firebaseConfig = {
    apiKey: "AIzaSyA51eAgtLQRevubBZMNR0YKIbu3zIq-b-Q",
    authDomain: "ecocorners-daada.firebaseapp.com",
    projectId: "ecocorners-daada",
    storageBucket: "ecocorners-daada.firebasestorage.app",
    messagingSenderId: "365034123265",
    appId: "1:365034123265:web:6bc8429dc9cb1a70009000",
    measurementId: "G-75K0272B4P"
  };

  // Initialize Firebase
  const app = initializeApp(firebaseConfig);
  const analytics = getAnalytics(app);
</script>
  </body>
</html>
