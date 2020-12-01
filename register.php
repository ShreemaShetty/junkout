<?php
require ("connect.php");
$success=null; 
$error=null;

$fname=(isset($_POST['fname']) ? $_POST['fname'] : null );
$lname=(isset($_POST['lname']) ? $_POST['lname'] : null );
$email=(isset($_POST['email']) ? $_POST['email'] : null );
$number=(isset($_POST['number']) ? $_POST['number'] : null );
$password=(isset($_POST['password']) ? $_POST['password'] : null );
$repassword=(isset($_POST['repassword']) ? $_POST['repassword'] : null );


if(isset($_POST['registerbtn'])){
 
  if(!empty($fname && $lname && $email && $number && $password && $repassword)){

      $compare = "SELECT * FROM users";
      $result = mysqli_query($conn, $compare);
      if (mysqli_num_rows($result) > 0) {
          
          while($row = mysqli_fetch_assoc($result)) {
              $stored_email=$row["email"];
              if($stored_email === $email){
                  die ("User with email already exists");
                  // echo '<script> alert("User with email already Exists") </script>';   
              } 
              $stored_number=$row["mobile"];
              if($stored_number === $number){
                  die ("User with number already exists");
                 // echo '<script> alert("User with number already exists") </script>';
                  
              }               
          }                          
      }
          if (filter_var($email, FILTER_VALIDATE_EMAIL)) { 
              if($password === $repassword){
                  $password=md5($password);
                  $sql="INSERT INTO `reviews`.`users` (`fname`, `lname`, `email`, `mobile`, `pass`, `timestamp`) VALUES ('$fname', '$lname', '$email', '$number', '$password', current_timestamp());";
                  /*$sql .= "INSERT INTO marks (student_id) VALUES ('$id')";*/
                  
                  if (mysqli_multi_query($conn, $sql)) {
                      do {
                          
                          if ($result = mysqli_store_result($conn)) {
                              while ($row = mysqli_fetch_row($result)) {
                                  
                              }
                              mysqli_free_result($result);
                          }
                          
                          if (mysqli_more_results($conn)) {
                              echo "<script> alert('New user added');
                                window.location='signin.php';
                              </script>";
                              header('Location:signin.html');
                          }
                      } while (mysqli_next_result($conn));
                  } 
                  else {
                      echo "Error: " . $sql . ":-" . mysqli_error($conn);
                  }
                  mysqli_close($conn);
                  
              }
              else
              { $error="Passwords don't match";
              echo '<script> alert("Passwords dont match") </script>';
              }
          }
          else
          { $error="Please enter a valid email";
          echo '<script> alert("Please enter a valid email") </script>';  
          }         
  }
  else  $error="Input Values";       
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
        <form id="reg" action="register.php" class="register-form" autocomplete="on" method="POST" >
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
          <p class="back"><a href="index.php">Maybe Later</a></p>
        </form>
      </div>
    </div>
  </div>
</body>
</html>

