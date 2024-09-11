<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>About us</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="css/styles.css" />
    <link rel="stylesheet" href="css/about-us.css">
    <link rel="icon" href="img/icon.png">
    <style>

      .image-container{
        height: 200px;
        margin: 10px;
        padding: 20px;
        
      }
      video{
        width: 700px;
        height: 350px;
        border: 4px solid white;
        border-radius: 20px;
        filter: drop-shadow(10px 10px 12px rgba(2, 112, 255, 0.3))
          drop-shadow(10px 10px 10px rgb(0, 81, 255))
          drop-shadow(20px 20px 20px rgba(0, 48, 136, 0.2));
        display: block;
        margin: auto;
      }
      .videos{
        text-align: center;
        color: white;
      }
    </style>
</head>
<body style="background-color: rgb(96, 165, 255);">
    <header>
        <nav class="main-nav">
            <a href="#"><img src="img/logo.png" class="logo" /></a>
            <ul class="navlinks">
                <li><a href="index.php">Home</a></li>
                <li><a href="about-us.php">About Us</a></li>
                <li><a href="contact-us.php">Contact Us</a></li>
                <a href="login.php"><button style="--c: #001a8d;">Sign in</button></a>
            </ul>
        </nav>
    </header>
    <div class="responsive-container-block bigContainer">
        <div class="responsive-container-block Container">
          <p class="text-blk heading">
            About Us
          </p>
          <div class="about">
            <div class="image-container">
              <img src="img/about-us.png" alt="hospital" class="image-about">
              <p class="text-blk subHeading">
              Welcome to our Likita platform! We prioritize accessibility and efficiency, connecting patients with healthcare providers seamlessly. Our values of transparency, reliability, and quality ensure a seamless experience for all users. Whether you're a patient seeking care or a hospital aiming to expand your services, we're here to assist you every step of the way.
              </p>
            </div>
          <br><br><br><hr class="hrtage">
          <div class="videos">
            <h3>if you know more about-us then you can see below video</h3>
          <video src="video/video.mp4" controls></video>
        </div>
          <br><hr class="hrtage">
        </div>
          <div class="social-media">
            <h3>Connect with us :</h3>
            <div class="social-icons">
              <a href="#">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#">
                <i class="fab fa-instagram"></i>
              </a>
              <a href="#">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div>
          </div>
      </div>
      <footer class="footer">
        <div class="waves">
          <div class="wave" id="wave1"></div>
          <div class="wave" id="wave2"></div>
          <div class="wave" id="wave3"></div>
          <div class="wave" id="wave4"></div>
        </div>
        <ul class="social-icon-s">
          <li class="social-icon__item">
            <a class="social-icon__link" href="#">
              <ion-icon name="logo-facebook"></ion-icon>
            </a>
          </li>
          <li class="social-icon__item">
            <a class="social-icon__link" href="#">
              <ion-icon name="logo-twitter"></ion-icon>
            </a>
          </li>
          <li class="social-icon__item">
            <a class="social-icon__link" href="#">
              <ion-icon name="logo-linkedin"></ion-icon>
            </a>
          </li>
          <li class="social-icon__item">
            <a class="social-icon__link" href="#">
              <ion-icon name="logo-instagram"></ion-icon>
            </a>
          </li>
        </ul>
        <p>&copy;2024 Likita | All Rights Reserved</p>
      </footer>
      <script
        type="module"
        src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"
      ></script>
      <script
        nomodule
        src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"
      ></script>
    
</body>

</html>