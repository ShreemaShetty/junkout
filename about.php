<?php
  session_start();
  include("connect.php");
  $userprofile = $_SESSION['sr'];
  if($userprofile == TRUE)
  {

  }
  else{
    header('Location:signin.html');
  }

  $sql = "SELECT * FROM users WHERE sr='$userprofile'";
  $data  = mysqli_query($conn, $sql);
  $result = mysqli_fetch_assoc($data);
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!--bootstrap-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
    integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <!--editable css-->
  <link href='css/about.css' rel='stylesheet' type='text/css'>
  <link href='css/nav.css' rel='stylesheet' type='text/css'>
  
  <title>JunkOut : About</title>
</head>

<body>

  <!--NAVIGATION BAR-->

  <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #4CAF50;">
    <a class="navbar-brand" href="#">Junkout</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="requestpickup.php">Request Pickup</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.php">Contact Us</a>
        </li>
        <li class="nav-item dropdown active">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            Learn More <span class="sr-only">(current)</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item active" href="about.php">About Us</a>
            <a class="dropdown-item" href="ratecard.php">Rate Card</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </li>
      </ul>
      <form class="form-inline my-2 my-lg-0">
        <li class="nav-item dropdown " style="list-style:none;">
        <a class="nav-link " href="#" aria-haspopup="true" aria-expanded="false" style="border-color:#FFFFFF; color: #FFFFFF;"> 
          <?php
            echo "Welcome ".$result['fname'];
          ?>
          <span class="sr-only">(current)</span>
        </a>

        </li>
        <a class="nav-link" href="logout.php" style="border-color:#FFFFFF; color: #FFFFFF;">Logout</a>
        </form>
    </div>
  </nav>

  <!--About Us-->
  <section class="body-content-top">
    <div class="content">
      <h1>About Us</h1>
      <p class="mb-0"></p>
      <p class="body-info">JunkOut represents our vision of a cleaner and greener environment.
        JunkOut as the name suggests helps to get your junk out of the house and into the hands of people who could make
        it useful thus allowing you to make some effortless and
        valuable money. JunkOut is a website which makes buying and selling of waste for the consumer easy and hassle
        free.
        It connects customers with the recycler in one click.
      </p>
      <p class="body-info">We ensure that consumers as well as recyclers benefit from this initiative.
        The vendors follow the rate card provided on the website thus leading to no fraud.
        The rate card is designed with the help of market price of scrap and vendors approval.
      </p>

      <hr>

      <!--MAP-->
      <div id="" class="about-container">
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3772.6693193422366!2d73.1254814142114!3d18.99020605960007!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7e866de88667f%3A0xc1c5d5badc610f5f!2sPillai%20College%20of%20Engineering%2C%20New%20Panvel!5e0!3m2!1sen!2sin!4v1601565816033!5m2!1sen!2sin"
          width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="true" aria-hidden="false"
          tabindex="0"></iframe>
      </div>
      <hr>
    </section>
    
    <section class="body-content-bottom">
      <hr>
      <div class="videoTitle">
        <p>A video that explains about our project</p>
      </div>

      <div class="video">
        <video id="stock">
          <source src="Videos/y2mate.com - S Stands For.. (PewDiePie YLYL Episode 3435 Intro)_1080p.mp4"
            type="video/mp4">
          Your browser does not support the video tag.
        </video>
      </div>
      <div class="videoBtns">
        <button onclick="playPause()">Play/Pause</button>
        <button onclick="fullScreen()">Fullscreen</button>
        <button onclick="muteAudio()">Mute/Unmute</button>
      </div>
    </div>
  </section>
  <!--js files-->
  <script src='js/about.js' type='text/javascript'></script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
    integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"
    integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s"
    crossorigin="anonymous"></script>
</body>

</html>