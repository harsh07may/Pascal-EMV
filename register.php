<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "pascal");

// Check connection
if($conn === false){
  die("ERROR: Could not connect. "
    . mysqli_connect_error());
}

// Taking all 5 values from the form data(input)
if (isset($_POST['Submit'])) {
   $fname = $_POST['fname'];
  $password = $_POST['password'];


  // Performing insert query execution
  // here our table name is college
  $sql = "INSERT INTO users(fname,password) VALUES ('$fname','$password')";
  mysqli_query($conn,$sql);

  //redirecting
  
  header('location: index.php');
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="finance.css" />

    <title>Register</title>
  </head>

  <body>
    <p class="center">Register</p>
    <br />
    <br />
    <div class="container-1">
      <div class="cont">
        <form id="my-form" action="register.php" method="post">
          <!-- <h2>Purchase</h2> -->
          <div class="pform">

            <label for="">Full Name</label>
            <input type="text" id="name" name="fname" required />

            <label for="">Password</label>
            <input type="password" id="password" name="password" required />
          </div>

          <br /><br />
          <button type="submit" name="Submit" class="btn">Register</button>
        </form>
      </div>
      <img
        class="image"
        src="pics/magnus_ex_header.png"
        alt="A man on a bike"
      />
    </div>
  </body>
</html>
