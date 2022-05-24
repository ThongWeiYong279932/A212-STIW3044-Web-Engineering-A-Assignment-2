<?php

    session_start();
    if (!isset($_SESSION['sessionid'])){
        echo "<script>alert ('Session not available. Please login');s </script>";
        echo "<script>window.location.replace('login.php')</script>";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="../javaScripts/menu.js"></script>
    <title>MyTutor User Land Page</title>
</head>

<body>
    <div class="w3-sidebar w3-bar-block" style="display:none" id="mySidebar">
        <button onclick="w3_close()" class="w3-bar-item w3-button w3-large">Close &times;</button>
        <div class="w3-card w3-container w3-center" style="height:200px;width:200px"></div>
        <hr>
        <a href="#" class="w3-bar-item w3-button">User Profile</a>
        <a href="#" class="w3-bar-item w3-button">Settings</a>
        <a href="#" class="w3-bar-item w3-button">Helps</a>
        <a href="login.php" class="w3-bar-item w3-button">Log Out</a>
    </div>

    <div class="w3-blue">
        <button class="w3-blue w3-button w3-xlarge" onclick="w3_open()">&#9776</button>
        <div class="w3-container">
            <h1>MyTutor</h1>
        </div>
    </div>

    <div class="w3-bar w3-blue">
        <a href="bookTutor.php" class="w3-bar-item w3-button w3-right">Book Tutor</a>
    </div>

    <footer class="w3-footer w3-center w3-blue w3-bottom"><p>MyTutor</p></footer>

</body>
</html>