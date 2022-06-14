<?php

// Starting the session, to use and
// store data in session variable
session_start();

// If the session variable is empty, this
// means the user is yet to login
// User will be sent to 'login.php' page
// to allow the user to login
if (!isset($_SESSION['username'])) {
  $_SESSION['msg'] = "You have to log in first";
  header('location: login.php');
}

// Logout button will destroy the session, and
// will unset the session variables
// User will be headed to 'login.php'
// after logging out
if (isset($_GET['logout'])) {
  session_destroy();
  unset($_SESSION['username']);
  header("location: login.php");
}
$result;
$conn = mysqli_connect('localhost', 'root', '', 'regis');
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
    <title>Pascal</title>
  </head>
  <style>
    .btn {
      float: left;
      color: #242222;
      text-align: center;
      padding: 14px 40px;
      text-decoration: none;
      font-size: 19px;
      background-color: white;
      border: none;
    }
    .btn:hover {
      background-color: #ddd;
      color: black;
    }
    .lg-btn{
      float: left;
  color: #242222;
  text-align: center;
  padding: 14px 40px;
  text-decoration: none;
  font-size: 19px;
  font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    #list-items {
      display: none;
      position: absolute;
      top: 68px;
      left: 180px;
      font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
    }
    #list-items p {
      display: block;
      width: 115px;
      font-size: 18px;
      background-color: white;
      color: black;
      text-decoration: none;
      padding: 20px;
      margin: 0;
    }
    #list-items p:hover {
      background-color: #ddd;
      color: black;
    }
  </style>
  
  <body onclick="hideList()">
    <nav>
      <div class="topnav">
        <a class="navbar-brand p-0 logo_nav" href="index.php" onmouseover="hideList()">
          <img src="logo.svg" alt="Pascal Logo" height="32px" width="80px" />
        </a>

        <button onmouseover="showList()" class="btn">Products</button>
        <!-- dropdown list items will show when we click the drop button -->

        <div id="list-items">
          <p onclick="location.href = 'prod_1.html';">Magnus EX</p>
          <p onclick="location.href = 'prod_2.html';">Magnus</p>
          <p onclick="location.href = 'prod_3.html';">Zeal EX</p>
          <p onclick="location.href = 'prod_4.html';">Reo Plus</p>
        </div>

        <a href="finance.php" onmouseover="hideList()">Purchase</a>
        <a href="about_us.html" onmouseover="hideList()">About</a>
        <a style="padding-top:5px;margin-left:40%" href="index.php?logout='1'" onmouseover="hideList()"><button class="btn" type="button" >Log out</button></a>
      </div>
    </nav>
    <br /><br /><br /><br /><br /><br />
    <video
      autoplay
      muted
      loop
      id="banner-video"
      class="d-none d-md-block"
      aria-label="Drone shots of the Ampere factory and the Experience Center situated in the premises. "
    >
      <source src="Desktop.mp4" type="video/mp4" />
    </video>
    <h1 class="h_1" id="products">Our Products</h1>
    <div class="container_main">
      <a href="prod_1.html"
        ><div class="card_2">
          <img
            src="bikes/product_card_magnus_ex.png"
            alt="Avatar"
            style="width: 100%"
          />
          <div class="container_2">
            <h4><b>Magnus EX</b></h4>
          </div>
        </div></a
      >
      <a href="prod_2.html"
        ><div class="card_2">
          <img
            src="bikes/product_card_magnus_pro.png"
            alt="Avatar"
            style="width: 100%"
          />
          <div class="container_2">
            <h4><b>Magnus</b></h4>
          </div>
        </div></a
      >
      <a href="prod_3.html"
        ><div class="card_2">
          <img
            src="bikes/product_card_zeal_ex.png"
            alt="Avatar"
            style="width: 100%"
          />
          <div class="container_2">
            <h4><b>Zeal EX</b></h4>
          </div>
        </div></a
      >
      <a href="prod_4.html"
        ><div class="card_2">
          <img
            src="bikes/product_card_reo_plus.png"
            alt="Avatar"
            style="width: 100%"
          />
          <div class="container_2">
            <h4><b>Reo Plus</b></h4>
          </div>
        </div></a
      >
    </div>
    <footer>
      <div class="footer-content">
        <h3>Pascal</h3>
        <p>
          Go Electric, Go Pascal. Electric scooters that give great performance
          at very low running cost. Bring home an electric scooter and enjoy
          every ride
        </p>
      </div>
      <div class="footer-bottom">
        <p>copyright &copy; <a href="#"> Pascal_By_Newton</a></p>
        <div class="footer-menu">
          <ul class="f-menu">
            <li><a href="">Home</a></li>
            <li><a href="">About</a></li>
            <li><a href="">Contact</a></li>
            <li><a href="">Blog</a></li>
          </ul>
        </div>
      </div>
    </footer>
    <script>
        function showList() {
          var click = document.getElementById("list-items");
          click.style.display = "block";
        }
        function hideList() {
          var click = document.getElementById("list-items");
          click.style.display = "none";
        }
      </script>
  </body>
</html>
