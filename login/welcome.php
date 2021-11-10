<?php

//session_start();//create a new session
if(!isset($_SESSION)){
  session_start();
}
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true)//if our session is not set as logged in or if it is set but the value is not equal to true
{
    header("location: login.php");//redirect to login page
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BEING AMBIVERT</title>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/animation.css">
  <link rel="stylesheet" href="css/responsive.css">
  <link rel="stylesheet" href="style2.css">
  
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap"
    rel="stylesheet">
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <a href="https://icons8.com/icon/pnGS5B9Ec73a/football"></a>
</head>

<body>
  <!-- header -->
  <section id="header">
    <div class="header">
      <nav>
        
        <div class="openMenu"><i class="fa fa-bars"></i></div>
        <ul class="mainMenu">
            <li><a href="viewprofile.php">View your Profile</a></li>
            <li><a href="Profile_update.php">Update your Profile</a></li>
            
            <li><a href="#">View your posts</a></li>
            <li><a href="logout.php">Logout</a></li>
            
            <div class="closeMenu"><i class="fa fa-times"></i></div>
            <!-- <span class="icons">
                <i class="fab fa-facebook"></i>
                <i class="fab fa-instagram"></i>
                <i class="fab fa-twitter"></i>
                <i class="fab fa-github"></i>
            </span> -->
        </ul>

        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
          <i class="fas fa-bars"></i>
        </label>
        
        <ul>
          <li><a class="active" href="#style">ADD Post</a></li>
          <li><a href="#about">About</a></li>
          <li><a href="#contact">Contact</a></li>
          <li><a href="#Feedback">Feedback</a></li>
        </ul>
      </nav>

      <script src="main.js"></script>
    </div>
      <script>
        const header = document.querySelector('nav');

        document.addEventListener('scroll', () => {
          var scroll_position = window.scrollY;
          if (scroll_position > 250) {
            header.style.backgroundColor = '#29323c';

            header.style.borderBottom = '5px solid crimson';
          } else {
            header.style.backgroundColor = 'transparent';
            header.style.borderBottom = '5px solid white';


          }
        });




      </script>


  </section>

  <!-- header end -->


  <section id="style">


    <div class="ved cont">
      <div>
        <h1>DON'T</h1>
        <h1>KEEP YOURSELF <span></span></h1>
        <h1>L.I.M.I.T.E.D <span></span></h1>
        <!-- <a href="" class="btn">Portfolio</a> -->
      </div>
    </div>

  </section>
  <!-- about -->
  <section id="about">
    <div class="about cont">
      <div class="👈">
        <div class="about-img">
          <img src="img\what-is-ambivert-1024x512.png" alt="">
        </div>
      </div>
      <div class="👉">
        <h1 class="section-title">
        <span>AMBIVERT ? </span>
        </h1>
        
        <h2>An ambivert is someone who exhibits qualities of both introversion and extroversion, and can flip into either depending on their mood, context, and goals. 
        </h3>
        
      </div>
    </div>
  </section>
  <!-- about end -->

 
  <section id="contact">
    <div class="contact cont">
      <div>
        <h1 class="section-title">Contact <span>Info</span></h1>
      </div>
      <div class="contact-items">
        <div class="contact-item">
          <div class="icon"><img src="https://img.icons8.com/bubbles/100/000000/phone.png" /></div>
          <div class="contact-info">
            <h1>Phone</h1>
            <h2>=> 9667044835</h2>
            <h2>=> 8860861797</h2>
            <h2>=> 8565809964</h2>
            <h2>=> 9559732821</h2>
          </div>
        </div>
        <div class="contact-item">
          <div class="icon"><img src="https://img.icons8.com/bubbles/100/000000/new-post.png" /></div>
          <div class="contact-info">
            <h1>Email</h1>
            <h2>beingambivert@gmail.com</h2>

          </div>
        </div>
        <div class="contact-item">
          <div class="icon"><img src="https://img.icons8.com/bubbles/100/000000/map-marker.png" /></div>
          <div class="contact-info">
            <h1>Address</h1>
            <h2>AKGEC,Adhyatmik Nagar,Ghaziabad

            </h2>
          </div>
        </div>
      </div>
  </section>


  <!-- contact end -->
  <!-- footer -->
  <section id="Feedback">
    <div class="content1">

    </div>
    <footer>
      <div class="main-content">
        <div class="left box">
          <h2>About</h2>
          <div class="content">
            <p>This website is designed to help you interact with other like minded people of society</p>
            <div class="social">
              <a href=""><span>
                  <ion-icon name="logo-facebook"></ion-icon>
                </span> </a>
              <a href="#"><span>
                  <ion-icon name="logo-twitter"></ion-icon>
                </span></a>
              <a href=""><span>
                  <ion-icon name="logo-youtube"></ion-icon>
                </span></a>
              <a href=""><span>
                  <ion-icon name="logo-instagram"></ion-icon>
                </span></a>
            </div>
          </div>
        </div>

        <div class="center box">
          <h2>Address</h2>
          <div class="content">
            <div class="place">
              <span>
                <ion-icon name="map-outline"></ion-icon>
              </span>
              <span class="text">AKGEC, Adhyatmik Nagar, Ghaziabad</span>
            </div>
            <div class="phone">
              <span>
                <ion-icon name="call-outline"></ion-icon>
              </span>
              <span class="text">9667044835</span>
            </div>
            <div class="email">
              <span>
                <ion-icon name="mail-outline"></ion-icon>
              </span>
              <span class="text">beingambivert@gmail.com</span>
            </div>
          </div>
        </div>

        <div class="right box">
          <h2>Feedback</h2>
          <div class="content">
            <form action="#">
              <div class="email">
                <div class="text">Contact No : *</div>
                <input type="number" required>
              </div>
              <div class="msg">
                <div class="text">Name *</div>
                <textarea rows="2" cols="25" required></textarea>
              </div>
           
                <!-- <button type="submit"><strong>Click Here</strong></button> -->
                <a class="meaning" href="beingambivert@gmail.com">Click Here</a>
            </form>
          </div>
        </div>


      </div>
      <div class="bottom">
        <center>
          <p class="credit">Created By <span>APVV</span</a> | </p>
          <p class="far fa-copyright"> 2021 All rights reserved.
          <p>

        </center>
      </div>


    </footer>

  </section>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  <!-- footer end -->
</body>

</html>