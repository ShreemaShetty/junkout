<?php
session_start();
 require "connect.php";
 $success = FALSE;
 if (isset($_POST['loginbtn']))
 {
    $username = $_POST['username'];
    $password = $_POST['pass'];
   // $cpassword=md5($password);
    $sql = "SELECT * FROM users WHERE email='$username' && pass= '$password'";
    $results = mysqli_query($conn, $sql);
    $rowcount = mysqli_num_rows($results);
    $sr = mysqli_fetch_assoc($results);
    $unum = $sr['sr'];
    $number = $sr['mobile'];
    $location = $sr['location'];
    $ir = $sr['isRecycler'];
    if($rowcount == TRUE){
        // echo "Successful Login";
        $success = TRUE;
    }
    else{
        // echo "Invalid credentials";
        echo '<script> alert("Invalid Credentials") </script>';
    }
    if($success = TRUE){
        $_SESSION['sr'] = $unum;
        $_SESSION['location'] = $location;
        $_SESSION['number'] = $number;
        if($ir == "yes"){
            header('Location:recyclerui.php');
        }
        else{
           header('Location:index.php');
           // echo $ir;
        }
        
        
    }
}
?>