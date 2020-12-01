<?php
  session_start();
  require("connect.php");
  $userprofile = $_SESSION['sr'];
  if($userprofile == TRUE)
  {

  }
  else{
    header('Location:signin.html');
  }

  $location = $_SESSION['location'];

  $select = "Select * FROM orders WHERE location='$location'";   
  $result1 = mysqli_query($conn, $select);


  $sql = "SELECT * FROM users WHERE sr='$userprofile'";
  $data  = mysqli_query($conn, $sql);
  $result = mysqli_fetch_assoc($data);

?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">

        <title>Recycler : Home</title>

        <!-- Bootstrap CSS -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> 
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

        <!-- Bootstrap core CSS -->
        <link href="bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="bootstrap-social.css"> 

        <!-- Custom styles for this template -->
        <link href="css/home.css" rel="stylesheet">
        <link href="css/view.css" rel="stylesheet">
        <link href='css/nav.css' rel='stylesheet' type='text/css'>


        <style>
            .container {
            border: 2px solid #ccc;
            background-color: #fff;
            color:#000;
            border-radius: 5px;
            padding: 16px;
            margin: 16px auto;
            font-size: 20px;
            text-align:left;
            }

            .container:hover{
                background-color: #ccc;
            }

            .container::after {
            content: "";
            clear: both;
            display: table;
            }

            @media (max-width: 500px) {
            .container {
                text-align: center;
            }
            }
        </style>
    </head>
    <body class="text-center">
        <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
            <!--NAVIGATION BAR-->

                <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #4CAF50;">
                <a class="navbar-brand" href="#">Junkout</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
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
            <main>
            <h2 style="text-align:center">Customer Details</h2>
            <?php
                while($row = mysqli_fetch_assoc($result1)){?>
                    <div class="container">
                    <p>Name: <?php echo $row["name"]; ?></p>
                    <p>Number: <?php echo $row["number"]; ?></p>
                    <p>Approx. weight: <?php echo $row["kgs"]; ?></p>
                    <p>Address: <?php echo $row["addr"]; ?></p>
                    </div>
                <?php } ?>
            </main>
        
        <!--js files-->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    </body>
</html>

