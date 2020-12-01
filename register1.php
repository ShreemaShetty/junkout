<?php
 require "connect.php";
 if ($_SERVER['REQUEST_METHOD'] == "POST"){
    $fname = $_POST['fname'];
    $lname= $_POST['lname'];
    $email = $_POST['email'];
    $mobile = $_POST['number'];
    $password = $_POST['password'];
    $sql = "INSERT INTO `users` (`fname`, `lname`, `email`, `mobile`, `pass`, `timestamp`) VALUES ('$fname', '$lname', '$email', '$mobile', '$password', current_timestamp());";
    if($conn->query($sql)){
        // echo "Successful Entry";
        header('Location:signin.html');
    }
    else{
        echo $conn->error;
    }
    $conn->close();
 }
?>

<!DOCTYPE HTML>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="utf-8">
  <title>JunkOut: Register</title>  
  <link href='css/signin.css' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src = 'js/validate.js' type='text/javascript'></script>

</head>
<body>
  <div class="content" >
    <div class="login-page">
      <div class="form-user">
      <img class="logo" src="../junkout (1)/img/New Logo black.png">

        <!--user registration form-->
        <form id="reg" action="register1.php" class="register-form" autocomplete="on" method="POST" >
          <div class="full-name">
            <input type="text" name="fname" placeholder="First Name" required/>
            <input type="text" name="lname" placeholder="Last Name" required/>
          </div>
          <input type="email" name="email" placeholder="E-mail Address" required/>
          <input type="tel" name="number" pattern="[0-9]{10}" placeholder="Mobile Number" required/>
          <input type="password" name="password"  placeholder="Password" minlength="6" maxlength="15" autocomplete="off" required/>
          <input type="password" name="repassword"  placeholder="Re-enter Password" autocomplete="off" required/>
          <input type="submit" class="button" name="registerbtn" value="Create"/>
          <p class="message">Already registered? <a href="signin.html">Sign In</a></p>
          <p class="back"><a href="index.html">Maybe Later</a></p>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
