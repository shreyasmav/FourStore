<?php  
include('header.php');
$connect = mysqli_connect("localhost", "root", "", "registration");
$username = $_SESSION['username'];
$query = "SELECT * FROM users WHERE username='$username'";
$result = mysqli_query($connect, $query);
$row = mysqli_fetch_array($result);
$id = $row['id'];
$email = $row['email'];
?>
<!DOCTYPE html>  
<html>  
    <head>  
        <title>My Account</title>
        <style>
            body{
                background: lightblue url("Images/homepage/home2.jpg") no-repeat fixed center; 
            }
            .acc{
                padding:50px;
               background: lightblue url("Images/homepage/home2.jpg") no-repeat fixed center; 
                border-radius:15px;
                width:250px;
                text-align:center;
                top:25px;
                margin:auto;
            } 
            #d{
                text-align:left;
            }  
        </style>
    </head>  
    <body >
        <div class='acc'>
            <div class='he'><h3 style="font-size:20px;"> Account Details - </h3><br></div>
            <div id='b' style="font-size:20px;">
            <?php

                echo "User ID - $id<br>";
                echo "Username - $username<br>";
                echo "Email - $email<br>";
            ?>
            </div>
        </div>
    </body>
  <?php 
include('footer.php');
 ?>
</html>
        