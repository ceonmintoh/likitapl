<?php

include("connection.php");


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Likita</title>
    <style>
      .content {
        padding: 20px;
        width: 100%;
        height: 100%;
        background-color: rgb(96, 165, 255);
        opacity: 65%;
        color: white;
        text-align: center;
        border-radius: 20px;
      }
      .discription {
        display: flex;
        padding: 40px;
        text-align: justify;
        align-items: center;
        justify-content: center;
        gap: 20px;
      }
      p {
        width: 500px;
        font-size: larger;
      }
      img {
        filter: drop-shadow(-5px -5px 12px rgba(0, 217, 255, 0.3))
          drop-shadow(10px 10px 10px rgb(1, 33, 102))
          drop-shadow(20px 20px 20px rgba(0, 48, 136, 0.2));
      }
      h1,h2 {
        animation: fadeIn 1.5s ease-in-out;
      }
      @keyframes fadeIn {
        from {
          opacity: 0;
        }

        to {
          opacity: 10;
        }
      }


      .hrtage {
        margin: 20px;
        border-top: 4px solid white;
        border-radius: 5px;
        text-align: center;
        line-height: 100px;
        position: relative;
        animation-duration: 2s;
        animation-name: hr;
        animation-iteration-count: 1;
        animation-timing-function: ease-in;
        cursor: pointer;
      }

      @keyframes hr {
        from {
          width: 0%;
        }

        to {
          width: 97%;
        }
      }
      video{
        width: 700px;
        height: 400px;
        border: 4px solid white;
        border-radius: 20px;
        filter: drop-shadow(10px 10px 12px rgba(2, 112, 255, 0.3))
          drop-shadow(10px 10px 10px rgb(0, 81, 255))
          drop-shadow(20px 20px 20px rgba(0, 48, 136, 0.2));
      }
      
      .videos{
        margin-bottom: 250px;
      }
    </style>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
      integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="css/styles.css" />
    <link rel="icon" href="img/icon.png" />
  </head>
  <body
    style="
      background-color: lightblue;
      background-image: url('bg-image.png');
      background-blend-mode: darken;
      background-repeat: no-repeat;
      background-size: cover;
    "
  >
    <header>
      <nav class="main-nav">
        <a href="#"><img src="img/logo.png" class="logo" /></a>
        <ul class="navlinks">
          <li><a href="#">Home</a></li>
          <li><a href="about-us.php">About Us</a></li>
          <li><a href="contact-us.php">Contact Us</a></li>
          <a href="login.php"
            ><button style="--c: #001a8d">Sign in</button></a
          >
        </ul>
      </nav>
    </header>

    <section class="content-container">
      <div class="content">
        <h1 style="font-size: xx-large;">Welcome to Likita Platform</h1>
        <div class="discription">
          <img src="img/a_group_of_people_at_the_hospital_reception_in_africa_the_receptionist_calling_the_doctor_and_an_accident_patient_with_a_fever(2).jpeg" alt="img" width="400px" height="300px" />
          <p>
            Welcome to Likita, your trusted platform for all your
            healthcare needs. Our home page serves as the gateway to a world of
            medical expertise, providing You with intuitive navigation and
            essential features tailored to their healthcare requirements.
            This web-based portal is designed to connect you with health professionals,
            hospitals, and doctors with the people of Gembu and surrounding areas,
            offering remote healthcare services.to bridge the healthcare gap by providing 
            timely medical consultations, diagnoses, and prescriptions for patients in rural areas with limited access to in-person care.
          </p>
        </div>
        <br />
        <hr class="hrtage"/>
        <br />
        <div class="row">
          <div class="col-lg-4 text-black text-center mb-4">
            <img src="img/a_group_of_people_at_the_hospital_reception_in_africa(1).jpeg" class="bd-placeholder-img rounded-circle" width="140" height="140" alt="Placeholder">
            <h2 class="fw-normal text-bold text-green">Remote Consultations</h2>
            <p>Health professionals can offer consultations remotely,reducing the need for patients to travel long distances.</p>
            <p><a class="btn btn-secondary" href="./login.php">Try</a></p>
          </div><!-- /.col-lg-4 -->
          <div class="col-lg-4 text-black text-center mb-4">
            <img src="img/a_group_of_people_at_the_hospital_reception_in_africa(3).jpeg" class="bd-placeholder-img rounded-circle" width="140" height="140" alt="Placeholder">
            <h2 class="fw-normal">Appointment Scheduling</h2>
            <p>Patients can book appointments with doctors or specialists, helping manage time and resources effectively.</p>
            <p><a class="btn btn-secondary" href="./login.php">View details &raquo;</a></p>
          </div><!-- /.col-lg-4 -->
          <div class="col-lg-4 text-black text-center mb-4">
            <img src="img/a_group_of_people_at_the_hospital_reception_in_africa_the_receptionist_calling_the_doctor_and_an_accident_patient_with_a_fever(1).jpeg" class="bd-placeholder-img rounded-circle" width="140" height="140" alt="Placeholder">
            <h2 class="fw-normal">Community Health Support</h2>
            <p>And lastly this, The platform aims to improve overall healthcare accessibility and awareness in the Gembu region.</p>
            <p><a class="btn btn-secondary" href="./login.php">View details &raquo;</a></p>
          </div><!-- /.col-lg-4 -->
        </div><!-- /.row -->
      </div>
    </section>
    
    <div id="myCarousel" class="carousel slide mb-6" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="img/fever1.jpeg" alt="" width="100%" height="50%">
          <div class="container">
            <div class="carousel-caption text-start">
              <h1>First Aid</h1>
              <p class="opacity-75">Doctors can Assist People perform Remote First Aid during Emergencies</p>
              <p><a class="btn btn-lg btn-primary" href="./signup.php">Sign up today</a></p>
            </div>
          </div>
        </div>
        <div class="carousel-item">
        <img src="img/accidents1.jpeg" alt="" width="100%" height="50%">
          <div class="container">
            <div class="carousel-caption">
              <h1>Remote Prescription</h1>
              <p>Health Workers can Provide Diagnosis and Prescription</p>
              <p><a class="btn btn-lg btn-primary" href="#">Learn more</a></p>
            </div>
          </div>
        </div>
        <div class="carousel-item">
        <img src="img/reception.jpeg" alt="" width="100%" height="50%">
          <div class="container">
            <div class="carousel-caption text-end">
              <h1>Community Health Support</h1>
              <p>The platform aims to improve overall healthcare accessibility and awareness in the Gembu region.</p>
              
          </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
  </div>
  <hr class="hrtage"/>
  <hr class="hrtage"/>
  <hr class="hrtage"/>
  <hr class="hrtage"/>
  <hr class="hrtage"/>
  <hr class="hrtage"/>
  <hr class="hrtage"/>
  <hr class="hrtage"/>

    <footer class="footer">
      <div class="waves">
        <div class="wave" id="wave1"></div>
        <div class="wave" id="wave2"></div>
        <div class="wave" id="wave3"></div>
        <div class="wave" id="wave4"></div>
      </div>
      <ul class="social-icon-s">
        <li class="social-icon__item">
          <a class="social-icon__link" href="https://facebook.com/elvekasng">
            <ion-icon name="logo-facebook"></ion-icon>
          </a>
        </li>
        <li class="social-icon__item">
          <a class="social-icon__link" href="https://twitter.com/elvekasng">
            <ion-icon name="logo-twitter"></ion-icon>
          </a>
        </li>
        <li class="social-icon__item">
          <a class="social-icon__link" href="https://linkedin.com/in/elvekasng">
            <ion-icon name="logo-linkedin"></ion-icon>
          </a>
        </li>
        <li class="social-icon__item">
          <a class="social-icon__link" href="https://instagram.com/elvekasng">
            <ion-icon name="logo-instagram"></ion-icon>
          </a>
        </li>
      </ul>
      <p style="text-align: center;">&copy;2024 Likita | All Rights Reserved</p>
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
