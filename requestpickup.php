<?php
  session_start();
  include("connect.php");
  $number = $_SESSION['number'];
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
  $fname = $result['fname'];

  if ($_SERVER['REQUEST_METHOD'] == "POST"){
    $location = $_POST['location'];
    $kgs = $_POST['kgs'];
    $addr = $_POST['addr'];
    $sql = "INSERT INTO orders (name, number, location, kgs, addr, datetime) VALUES ('$fname', '$number', '$location', '$kgs', '$addr', current_timestamp())";
    $data  = mysqli_query($conn, $sql);
  }
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/requestpickup.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Request Pickup</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #4CAF50;">
        <a class="navbar-brand" href="#">Junkout</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link " href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="#">Request Pickup</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.php">Contact Us</a>
                </li>
                <li class="nav-item dropdown ">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Learn More <span class="sr-only">(current)</span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item " href="about.php">About Us</a>
                        <a class="dropdown-item " href="ratecard.php">Rate Card</a>
                        <div class="dropdown-divider "></div>
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
    <h1>Select location</h1>
    <div class="details">
        <form action="" method="POST">
            <div class="location">
                <select name="location" class="form-control form-control-sm">
                    <option>Vashi</option>
                    <option>Nerul</option>
                    <option>Belapur</option>
                    <option>Panvel</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="exampleFormControlInput1" >Approx. Weight</label>
                <input type="text" class="form-control" name="kgs" id="exampleFormControlInput1" placeholder="in Kgs">
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Detailed Address</label>
                <textarea class="form-control" name="addr" id="exampleFormControlTextarea1" rows="3"
                    placeholder="Address"></textarea>
            </div>
            <div class="btn" style="display: block;">
                <input type="submit" class="button" name="requestpickup" value="Recycle Now" />
            </div>
        </form>
    </div>

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