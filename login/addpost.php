<?php

//connecting to the database
$db = mysqli_connect("localhost", "root", "", "login");

$msg="";//new empty variable

//if  upload button is pressed
if(isset($_POST['upload'])){
    //get all the data from the form
    $yourname = $_POST['writename'];
    $yourimage = $_FILES["putimage"]["name"];
    $yourdescription = $_POST['description'];
    $tempname = $_FILES["putimage"]["tmp_name"];

    $target = basename($yourimage, "images/");

    
    $sql = "INSERT INTO posts (name , description , image) VALUES ('$yourname', '$yourdescription', '$yourimage')";
    mysqli_query($db, $sql);//stores the submitted data into the database table images

    //moving the image into the folder
    if(move_uploaded_file($tempname, $target)){
      echo  $msg = "image uploaded successfully:";
    }
    else{
      echo  $msg = "Task Failed Successfully";
    }

    //$result = mysqli_query($db, "SELECT * FROM posts");
}



?>






<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BEING AMBIVERT : ADD POST</title>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/name.css">
  
  <link rel="stylesheet" href="css/animation.css">
  <link rel="stylesheet" href="css/responsive.css">
  <link rel="stylesheet" href="style2.css">
  <link href="./style3.css" rel="stylesheet" />   
  
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap"
    rel="stylesheet">
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <!-- <a href="https://icons8.com/icon/pnGS5B9Ec73a/football"></a> -->
</head>

<body>
  <!-- header -->
  <section id="header">
    <div class="header">
      <nav>
        
        <div class="openMenu"><i class="fa fa-bars"></i></div>
        <ul class="mainMenu">
            <li><a href="#">View/Edit your Profile</a></li>
            <li><a href="#">View your posts</a></li>
            
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
          <li><a class="active" href="#style">Add Post</a></li>
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
        <h1>A WAY</h1>
        <h1>TO SHARE YOUR <span></span></h1>
        <h1>HAPPINESS <span></span></h1>
        <!-- <a href="" class="btn">Portfolio</a> -->
      </div>
    </div>

  </section>

<section class="new">
    
      <div>
       
      
        <br>
        <br>
      <form action=""  enctype="multipart/form-data" method="post">
        
        <div class="form-row">
          <div class="form-group col-md-15">
            <label for="inputname" class="yourname"  >Name : </label>
            <br>
            <br>
            <input
              type="text"
              class="form-control"
              name="writename"
              id="inputname"
              placeholder="Write your full name here:"
              required
            />
          </div>
          <div class="form-group col-md-6">
            <label for="inputimage" class="yourname">Image :</label>
            <br>
            <input
              type="file"
              class="form-control"
              id="inputimage"
              name="putimage"
              
            />
          </div>
          <div class="form-group col-md-15 col-">
          
            <label for="inputdescription" class="yourname">Description:</label>
            <br>
            <br>
            <textarea name="description" 
            required class="form-control"
              id="inputdescription"
              rows="4"
              placeholder="Add your description here:"
              
            ></textarea>
          </div>
          <br>
          <br>
          <input type="submit" name="upload" value = "UPLOAD" class="button ">
          <br>
          <a class="styling1" href="welcome.php">back</a>
          <br>
        
          <span><a class="styling" href="viewpost.php">👉Click here to view your POSTS👈</a></span>
          <br>
          <br>
      </form>
    </div>

    
</section>
  <section id="Feedback">
    
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
              <br><br>
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
                <br>
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
